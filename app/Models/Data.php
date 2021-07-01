<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $table = "datas";
    protected $fillable = ["date_in", "day_in", "time_in", "date_out", "day_out", "time_out", "total_hours", "activity", "site_name", "remark", "intensive", "user_id"];
    public $timestamps = false;

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}