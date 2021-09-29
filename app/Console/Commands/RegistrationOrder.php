<?php

namespace App\Console\Commands;

use App\Functions\ClientFunction;
use App\Functions\OrderFunction;
use App\Functions\PaymentFunction;
use App\Functions\ProductFunction;
use App\Functions\VtexFunction;
use Illuminate\Console\Command;

class RegistrationOrder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'importacion:orden';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'importacion de orden desde VTEX';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $data = [
            "f_creationDate" => "creationDate:[2021-01-01T02:00:00.000Z TO 2021-09-29T01:59:59.999Z]",
            "per_page" => 30,
        ];

        $orders = VtexFunction::orders($data);

        if($orders['list']){
            foreach ($orders['list'] as $order) {
                if($order['status'] != "canceled"){
                    $client = ClientFunction::importClient($order['orderId']);
                    $orden = OrderFunction::importOrder($order, $client);
                    ProductFunction::importProduct($order['orderId'], $orden);
                    PaymentFunction::importPayment($order['orderId'], $orden);
                    $this->info("Orden: ".$order['orderId']." - IMPORTADO");
                }
            }
        }
    }
}
