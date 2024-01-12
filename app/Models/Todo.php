<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    // protected = แก้ไขข้อมูลได้เฉพาะฟิลด์เหล่านี้
    protected $fillable = ['id','title', 'description','isDone'];
}
