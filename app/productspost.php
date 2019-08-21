<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productspost extends Model
{
    protected $table      = 'productspost';
    protected $primaryKey = 'id';
	public    $timestamps = false;
	protected $fillable = ['img'];
}
