<?php

namespace Archive\Mvc\Controller;

require_once __DIR__ . '/../../vendor/autoload.php';

use Archive\Mvc\Model\EngineCar;
use Archive\Mvc\Database\EngineCarMapper;

class EngineCarController
{
    public function request(string $uri)
    {
        if ($uri === '/') {
            return include('../src/View/EngineCarView.php');
        }
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
