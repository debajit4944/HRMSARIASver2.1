<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'phno',
        'gender',
        'addr',
        'pincode',
        'state',
        'addrdistrict',
        'dob',
        'idtype',
        'idno',
        'ifsccode',
        'bankaccno',
        'project_id',
        'doj',
        'designation_id',
        'category_id',
        'organisation_id',
        'district_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
