<?php
namespace App\Http\Controllers\Api\Transformers;

use League\Fractal\TransformerAbstract;
use App\Contact;
use stdClass;


class BuildingTransformer extends TransformerAbstract
{
    public function transform($data) {
        foreach ($data as $key => $building) {
            $data{$key} = $this->transformer($building);
        }
        return $data;
    }

    private function transformer ($building) {
        return [
            'name'          => (string) $building->name,
            'activated'     => (bool) $building->activated,
            'location'      => $this->getLocation($building),
            'type'          => $building->type()->first(),
            'client_id'     => ($building->client_id)? $building->client()->first(): null,
            'status_id'     => ($building->status_id)? $building->status()->first(): null,
            'contacts'      => $this->getContacts($building),
        ];
    }

    private function getLocation($building) {
        $location = new stdClass();
        $location->commune = $building->commune()->first()->name;
        $location->province = $building->province()->first()->name;
        $location->region = $building->region()->first()->name;
        $location->street = $building->street;
        $location->number = $building->number;
        $location->latitude = $building->latitude;
        $location->longitude = $building->longitude;
        return $location;
    }

    private function getContacts($building) {
        $contacts = Contact::FromBuilding($building->id)->get();
        return $contacts;
    }
}
