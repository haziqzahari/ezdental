<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technician extends Model
{
    use HasFactory;

    protected $table = 'technicians';

    protected $primaryKey = 'id';

    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'technician_id',
        'technician_name',
        'technician_email',
        'technician_phone',
        'password',
    ];

    public function workload()
    {
        return $this->hasMany('App\Models\Workload');
    }
}
