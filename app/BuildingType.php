<?php
namespace App;

use Illuminate\Database\Eloquent\Model;


class BuildingType extends Model
{
    //protected $hidden = ['id'];
    protected $fillable = [
        'description',
    ];
}

