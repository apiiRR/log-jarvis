<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Has_Project extends Model
{
    use HasFactory;
    protected $table = 'project_user';
    protected $guarded = [];
}
