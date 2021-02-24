<?php

use App\Models\Technician;
use App\Models\Workload;
use App\Models\DentalCase;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

function checkSection($section)
{
    if($section=="P/P" || $section=="F/F" || $section=="K/K" || $section=="I/I" || $section=="M/M" ||
        $section=="S/S" || $section=="R/R" || $section=="L/L")
    {
            return 2;
    }
    else if($section=="-")
    {
        return 0;
    }
    else{
        return 1;
    }


}

function countworkload($case_action, $dental_section, $remark)
     {

        if($case_action == "Full" || $case_action == "Partial" || $case_action == "Chrome")
        {
             if($case_action == "Chrome" && $remark == "MMR")
             {
                 if($dental_section == "K/" || $dental_section == "/K")
                 {
                     return 1;
                 }
                 else
                 {
                     return 2;
                 }
             }

             else if($case_action == "Chrome" && $remark == "Framework")
             {
                 if($dental_section == "K/" || $dental_section == "/K")
                 {
                     return 3;
                 }
                 else
                 {
                     return 4;
                 }
             }

             if($remark == "Special Tray" || $remark == "MMR")
             {
                if($dental_section == "F/F" || $dental_section == "P/P" || $dental_section == "K/K"){
                    return 4;
                }
                else
                {
                    return 2;
                }
             }

             if($remark == "Setting")
             {
                if($dental_section == "F/F" || $dental_section == "P/P" || $dental_section == "K/K"){
                    return 4;
                }
                else
                {
                    return 3;
                }
             }

             if($remark == "Process")
             {
                if($dental_section == "F/F" || $dental_section == "P/P" || $dental_section == "K/K"){
                    return 2;
                }
                else
                {
                    return 1;
                }
             }

         }

        elseif($case_action == "Splint" || $case_action == "Repair" || $case_action == "Reline/Rebase" || $case_action == "Splint" || $case_action == "Study Model")
        {
            if($dental_section == "S/S" || $dental_section == "R/R" || $dental_section == "L/L" || $dental_section == "M/M")
            {
                return 4;
            }
            else
            {
                return 2;
            }
        }
        else if($case_action == "Immediate")
        {
            if($dental_section == "I/I")
            {
                return 8;
            }
            else
            {
                return 5;
            }
        }
        else
        {
            return 0;
        }

    }


//TODO: ASSIGN CASE TO TECHNICIAN

function assignTechnician($case_id, $case_workload)
{
    $average = averageArray(count(Technician::all()));

    $technician_matrix = technicianMatrix();

    return searchTechnician($technician_matrix, $average['avg_year'], $average['avg_month'], $average['avg_week'], 0, $case_workload);

}

function averageArray($count)
{
    $avg_year = Workload::whereYear('updated_at', Carbon::now()->year)->sum('workload');
    $avg_month = Workload::whereMonth('updated_at', Carbon::now()->month)->sum('workload');
    $avg_week = Workload::whereBetween('updated_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('workload');

    return array("avg_year"=>$avg_year/$count, "avg_month"=>$avg_month/$count, "avg_week"=>$avg_week/$count);
}

function technicianMatrix()
{
    $date = Carbon::now();

    $technician_list = Technician::select('technician_id')->get();

    $sql = "SELECT `technicians`.`technician_id`, \n"
    . "SUM(CASE WHEN YEAR(`workloads`.`updated_at`) = YEAR(CURDATE()) THEN `workload` ELSE 0 END) AS `workload_year`, \n"
    . "SUM(CASE WHEN MONTH(`workloads`.`updated_at`) = MONTH(CURDATE()) THEN `workload` ELSE 0 END) AS `workload_month`,\n"
    . "SUM(CASE WHEN WEEK(`workloads`.`updated_at`) = WEEK(CURDATE()) THEN `workload` ELSE 0 END) AS `workload_week`,\n"
    . "COUNT(CASE WHEN DATE(`workloads`.`updated_at`) = CURDATE() THEN 1 ELSE NULL END) AS `case_count`\n"
    . "FROM `workloads`\n"
    . "RIGHT JOIN `technicians`\n"
    . "ON `technicians`.`technician_id` = `workloads`.`technician_id`\n"
    . "GROUP BY `technician_id`\n"
    . "ORDER BY `workload_year` ASC, `workload_month` ASC, `workload_week` ASC";

    $workload = DB::select($sql);

    return $workload;
}


function searchTechnician($technician, $avg_year, $avg_month, $avg_week, $index, $case_workload)
    {
        $case_limit = 16;

        if($technician[$index]->case_count == 0)
        {
            if(($technician[$index]->workload_week + $case_workload) < $case_limit)
            {
                return $technician[$index]->technician_id;
            }
            return searchTechnician($technician, $avg_year, $avg_month, $avg_week, $index+1, $case_workload);
        }
        else if($technician[$index]->case_count == 1)
        {
            for($i = $index+1; $i < count($technician); $i++)
            {
                if($i != count($technician))
                {
                    if($technician[$i]->case_count==0 && ($technician[$i]->workload_week+$case_workload) < $case_limit)
                    {

                        return $technician[$i]->technician_id;
                    }
                }
            }
            return $technician[$index]->technician_id;
        }
        return searchTechnician($technician, $avg_year, $avg_month, $avg_week, $index+1, $case_workload);
    }

?>
