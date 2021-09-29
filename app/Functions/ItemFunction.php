<?php
namespace App\Functions;

class ItemFunction
{
   static function items($orderId)
   {
        $response = VtexFunction::orderById($orderId);
        return $response['items'];
   } 
}