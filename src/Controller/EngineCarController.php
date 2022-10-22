<?php

namespace Mvc\Controller;

use Mvc\Model\EngineCar;
use Mvc\Database\EngineCarMapper;

class EngineCarController
{
    public function index()
    {
        return include(__DIR__ . '/../View/EngineCarView.php');
    }

    public function order(array $post): void
    {
        $serial = null;
        $order = new EngineCar(
            $post['manufacturer'],
            $post['model'],
            $post['price'],
            $post['tax'],
            $post['discount'],
            $serial,
            $post['engine']
            );
        $order->save();
    }

    public function showOrders(): array
    {
        $mapper = new EngineCarMapper;
        return $mapper->findAll();
    }

    public function renameModel(string $name, string $serial): void
    {
        $mapper = new EngineCarMapper;
        $mapper->update($name, $serial);
    }

    public function cancelOrder(string $serial): void
    {
        $mapper = new EngineCarMapper;
        $mapper->delete($serial);
    }
}