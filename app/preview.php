<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class preview extends Model
{
    protected $table      = 'preview';
    protected $primaryKey = 'id';
	public    $timestamps = false;
}
