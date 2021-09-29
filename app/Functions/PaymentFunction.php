<?php
namespace App\Functions;

use App\PaymentModel;

class PaymentFunction
{
    static function importPayment($orderId, $orden)
    {
        $payments = PaymentForm::paymentForm($orderId);

        $store = self::storePayment($payments, $orden);

        return $store;
    }

    static function storePayment($payments, $orden)
    {
        foreach ($payments as $payment) {
            $model = new PaymentModel();
            $model->id_payment = $payment['id'];
            $model->nombre_sistema_pago = $payment['paymentSystemName'];
            $model->monto = $payment['value'];
            $model->save();
            $orden->pagos()->attach($model->id);
        }
    }
}