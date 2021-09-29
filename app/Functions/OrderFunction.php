<?php
namespace App\Functions;

use App\OrderModel;

class OrderFunction 
{
    static function importOrder($order, $client)
    {
        $montoTotal = VtexFunction::orderById($order['orderId']);

        $model = new OrderModel();
        $model->orderId = $order['orderId'];
        $model->nombre = $client['firstName'];
        $model->apellido = $client['lastName'];
        $model->cantidad = $order['totalItems'];
        $model->monto_total = $montoTotal['totals'][0]['value'];
        $model->importe_total = $order['totalValue'];
        $model->clientId = ClientFunction::client($client);
        $model->save();

        return $model;
    }
}