<?php
namespace App;

use Illuminate\Database\Eloquent\Model;


class Contact extends Model
{
    protected $hidden = ['id'];

    protected $fillable = [
        'building_id',
        'name',
        'email',
        'phone',
    ];

    public function scopeFromBuilding($query, $id) {
        return $query->where('building_id', $id);
    }
}
