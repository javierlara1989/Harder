<?php
namespace App;

use Illuminate\Database\Eloquent\Model;


class BuildingStatus extends Model
{
    protected $table = 'building_status';
    protected $fillable = [
        'description',
    ];
}

