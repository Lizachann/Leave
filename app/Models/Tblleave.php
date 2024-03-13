<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tblleave extends Model
{
    use HasFactory;

    protected $fillable = [
        'leave_type',
        'request_days',
        'leaveDays_left',
        'from_date',
        'to_date',
        'work_covered',
        'hod_remark',
        'hod_date',
        'admin_remark',
        'admin_date',
        'emp_id',
    ];

    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('Y-m-d');
    }

}
