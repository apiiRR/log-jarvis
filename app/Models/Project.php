<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = "projects";
    protected $fillable = ["nama"];
    public $timestamps = false;

    
    public function user()
    {
        return $this->belongsToMany('App\Models\User');
    }

    public function data() {
        return $this->hasMany('App\Models\Data');
    }
}
