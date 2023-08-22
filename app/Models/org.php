<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class org extends Model
{
    use HasFactory;

    // 連線到資料庫的orgs資料表
    protected $fillable = [
        'title',
        'org_no',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
