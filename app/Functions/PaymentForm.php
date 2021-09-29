<?php
namespace App\Functions;

class PaymentForm
{
    static function paymentForm($orderId)
    {
        $response = VtexFunction::orderById($orderId);
        return $response['paymentData']['transactions'][0]['payments'];
    }
}