<?php
namespace App\Functions;

use App\ProductModel;

class ProductFunction
{
    static function importProduct($orderId, $orden)
    {
        $products = ItemFunction::items($orderId);

        $store = self::storeProduct($products, $orden);

        return $store;
    }

    static function storeProduct($products, $orden)
    {
        foreach ($products as $product) {
            $model = new ProductModel();
            $model->nombre = $product['name'];
            $model->uniqueId = $product['uniqueId'];
            $model->productId = $product['productId'];
            $model->refId = $product['refId'];
            $model->precio = $product['price'];
            $model->precio_lista = $product['listPrice'];
            $model->save();
            $orden->productos()->attach($model->id);
        }
    }
}