<?php
namespace App;

use Illuminate\Database\Eloquent\Model;


class Client extends Model
{
    protected $fillable = [
        'name',
        'social_security_number',
        'phone_number',
        'email',
        'client_type_id',
    ];

    public static $creation_rules = [
        'name'                   => ["required", "min:1", "max:80", "regex:/^[0-9a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/"],
        'social_security_number' => ['required', 'min:9', 'max:10', 'regex:/^([0-9]{7,8})-([0-9]|K)$/'],
        'phone_number'           => 'required|min:6|max:12',
        'email'                  => 'required|email|unique:clients,email',
        'client_type_id'         => 'required|exists:client_types,id',
    ];

    public static $edition_rules = [
        'client_id'              => 'required|exists:clients,id',
        'name'                   => ["required", "min:1", "max:80", "regex:/^[0-9a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/"],
        'phone_number'           => 'required|min:6|max:12',
        'client_type_id'         => 'required|exists:client_types,id',
    ];

    public function type() {
        return $this->belongsTo('App\ClientType');
    }

    public function scopeActives($query) {
        return $query->where('activated', true);
    }
}

