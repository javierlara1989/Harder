<?php
namespace App;

use Illuminate\Database\Eloquent\Model;


class Building extends Model
{
    protected $fillable = [
        'name',
        'activated',
        'region_id',
        'province_id',
        'commune_id',
        'street',
        'number',
        'latitude',
        'longitude',
        'type_id',
        'client_id',
        'status_id',
    ];

    public static $creation_rules = [
        'name'            => ["required", "min:1", "max:80", "regex:/^[0-9a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/"],
        'region_id'       => 'required|exists:regions,id',
        'province_id'     => 'required|exists:provinces,id',
        'commune_id'      => 'required|exists:communes,id',
        'street'          => 'required',
        'number'          => 'required',
        'latitude'        => 'required',
        'longitude'       => 'required',
        'type_id'         => 'required|exists:building_types,id',
        'client_id'       => 'exists:clients,id',
        'contact_name.*'  => ["min:1", "max:80", "regex:/^[0-9a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/"],
        'contact_phone.*' => ["min:1", "max:15", "regex:/^[0-9+-]+$/"],
        'contact_mail.*'  => 'min:5|max:50|email',
    ];

    public static $edition_rules = [
        'building_id'     => 'required|exists:buildings,id',
        'name'            => ["required", "min:1", "max:80", "regex:/^[0-9a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/"],
        'region_id'       => 'required|exists:regions,id',
        'province_id'     => 'required|exists:provinces,id',
        'commune_id'      => 'required|exists:communes,id',
        'street'          => 'required',
        'number'          => 'required',
        'latitude'        => 'required',
        'longitude'       => 'required',
        'type_id'         => 'required|exists:building_types,id',
        'client_id'       => 'exists:clients,id',
        'contact_name.*'  => ["min:1", "max:80", "regex:/^[0-9a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/"],
        'contact_phone.*' => ["min:1", "max:15", "regex:/^[0-9+-]+$/"],
        'contact_mail.*'  => 'min:5|max:50|email',
    ];

    public static $delete_rules = [
        'building_id'   => 'required|exists:buildings,id',
    ];

    public function type() {
        return $this->belongsTo('App\BuildingType');
    }

    public function client() {
        return $this->belongsTo('App\Client');
    }

    public function commune() {
        return $this->belongsTo('App\Commune');
    }

    public function province() {
        return $this->belongsTo('App\Province');
    }

    public function region() {
        return $this->belongsTo('App\Region');
    }

    public function status() {
        return $this->belongsTo('App\BuildingStatus', 'status_id');
    }
}

