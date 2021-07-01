<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Control extends Model
{
    protected $table = "control";
    protected $fillable = ["kondisi"];
    public $timestamps = false;
}
