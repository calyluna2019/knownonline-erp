<?php
namespace App\Functions;

use App\ClientModel;

class ClientFunction
{
    static function importClient($orderId)
    {
        $response = VtexFunction::orderById($orderId);
        return $response['clientProfileData'];
    }

    static function client($client)
    {
        $model = new ClientModel();
        $model->nombre = $client['firstName'];
        $model->apellido = $client['lastName'];
        $model->email = $client['email'];
        $model->tipo_documento = $client['documentType'];
        $model->documento = $client['document'];
        $model->telefono = $client['phone'];
        $model->save();

        return $model->id;
    }
}