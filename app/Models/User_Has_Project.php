<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Has_Project extends Model
{
    use HasFactory;
    protected $table = 'user_has_project';
    protected $guarded = [];
}
