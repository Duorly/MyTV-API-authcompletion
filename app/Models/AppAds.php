<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppAds extends Model
{
    protected $table = 'app_ads';

    protected $fillable = ['ads_name', 'ads_info'];


	public $timestamps = false;


}
