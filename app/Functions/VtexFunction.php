<?php
namespace App\Functions;

use GuzzleHttp\Client;

class VtexFunction
{
    static function http()
    {
        $client = new Client([
            'verify' => false,
        ]);
        return $client;
    }

    static function orders($data)
    {
        $response = self::HTTP()->get("https://knownonline.vtexcommercestable.com.br/api/oms/pvt/orders",[
            'query' => $data,
            'headers' => [
                'X-VTEX-API-AppKey' => 'vtexappkey-knownonline-IPWBFW',
                'X-VTEX-API-AppToken' => 'CVBSREIACFNEEBYQWRZZEGPEJJMYKTFKZUBGQDIAZICUEGRPXZZYKLWVFWJHSKQJZCFJASASIZAVEUACSWAKTGAOYGATUBIPSTVCBHPFZHPLKBRKWGOVJFPSBQLTRGXH',
            ],
        ]);
        return json_decode($response->getBody(),true);
    }

    static function orderById($id)
    {
        $response = self::HTTP()->get("https://knownonline.vtexcommercestable.com.br/api/oms/pvt/orders/".$id,[
            'headers' => [
                'X-VTEX-API-AppKey' => 'vtexappkey-knownonline-IPWBFW',
                'X-VTEX-API-AppToken' => 'CVBSREIACFNEEBYQWRZZEGPEJJMYKTFKZUBGQDIAZICUEGRPXZZYKLWVFWJHSKQJZCFJASASIZAVEUACSWAKTGAOYGATUBIPSTVCBHPFZHPLKBRKWGOVJFPSBQLTRGXH',
            ],
        ]);
        return json_decode($response->getBody(),true);
    }
}
