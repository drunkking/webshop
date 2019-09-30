<?php

namespace App\Repositories\Interfaces;


interface OrderRepositoryInterface {
   
    public function all();

    public function allWithUsers();

    public function saveTheOrder();

    public function customerOrders($customer_id);

    public function customerOrderDetails($customer_id);

    public function delete($order_id);
}