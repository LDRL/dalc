<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Idiomas extends Model
{
    protected $table='idioma';
    protected $primaryKey='ididioma';

    public $timestamps=false;

    protected $fillable=[
    	'nombreid',
    ];
}
