<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shifts extends Model
{
    use HasFactory;

    protected $table = 'shifts';

    protected $fillable = [
        'user_id','identification','patient_name','code','service','note','room','area','window','status',
    ];

}
