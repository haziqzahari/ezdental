<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DentalCase extends Model
{
    use HasFactory;

    protected $table = 'dental_cases';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'id',
        'case_id',
        'case_type',
        'case_1',
        'case1_section',
        'remark_1',
        'case_2',
        'case2_section',
        'remark_2',
        'verification_status',
        'case_status',
        'dentist_id',
        'dentist_name',
        'technician_id',
        'technician_name',
        'student_id',
        'student_name',
        'patient_name',
        'workload',
    ];

    public function student()
    {
        return $this->belongsTo('App\Models\Student', 'student_id', 'student_name');
    }

    public function technician()
    {
        return $this->belongsTo('App\Models\Technician', 'technician_id', 'technician_name');
    }


    public function workload()
    {
        return $this->hasMany('App\Models\Workload');
    }
}
