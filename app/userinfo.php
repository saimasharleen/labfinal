<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userinfo extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'id';
	public    $timestamps = false;
	protected $fillable = ['img'];
}
