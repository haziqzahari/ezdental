<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clerk extends Model
{
    use HasFactory;

    protected $table = 'clerks';

    protected $primaryKey = 'id';

    public $timestamps = true;
}
