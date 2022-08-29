<?php

namespace Archive\Mvc\Database;

require_once __DIR__ . '/../../vendor/autoload.php';

use PDO;
use Archive\Mvc\Model\EngineCar;
use Archive\Mvc\Interface\CarMapper;

class EngineCarMapper implements CarMapper
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = self::connection();
    }

    public function insert(EngineCar $engine_car): void
    {
        $rows = self::mapFromObject($engine_car);
        $statement = $this->pdo->prepare("INSERT INTO `engine_car` (`manufacturer`, `model`, `engine`, `price`, `tax`, `discount`, `serial`) VALUES ((?), (?), (?), (?), (?), (?), (?))");
        $statement->bindValue(1, $rows['manufacturer'], PDO::PARAM_STR);
        $statement->bindValue(2, $rows['model'], PDO::PARAM_STR);
        $statement->bindValue(3, $rows['engine'], PDO::PARAM_STR);
        $statement->bindValue(4, $rows['price']);
        $statement->bindValue(5, $rows['tax']);
        $statement->bindValue(6, $rows['discount'], PDO::PARAM_INT);
        $statement->bindValue(7, $rows['serial'], PDO::PARAM_STR);
        $statement->execute();
    }

    public function find(string $serial): EngineCar
    {
        $statement = $this->pdo->prepare("SELECT * FROM `engine_car` WHERE `serial`=(?)");
        $statement->bindValue(1, $serial, PDO::PARAM_STR);
        $statement->execute();
        $rows = $statement->fetch(PDO::FETCH_ASSOC);
        return self::mapFromRows($rows);
    }

    public function findAll(): array
    {
        $statement = $this->pdo->prepare("SELECT * FROM `engine_car`");
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        $cars = array();
        foreach ($rows as $row) {
            unset($row['id']);
            array_push($cars, $row);
        }
        return $cars;
    }

    public function update(string $model, string $serial): void
    {
        $statement = $this->pdo->prepare("UPDATE `engine_car` SET `model`=(?) WHERE `serial`=(?)");
        $statement->bindValue(1, $model, PDO::PARAM_STR);
        $statement->bindValue(2, $serial, PDO::PARAM_STR);
        $statement->execute();
    }

    public function delete(string $serial): void
    {
        $statement = $this->pdo->prepare("DELETE FROM `engine_car` WHERE `serial`=(?)");
        $statement->bindValue(1, $serial, PDO::PARAM_STR);
        $statement->execute();
    }

    private function connection(): PDO
    {
        $connection = new Connection;
        return $connection->open();
    }

    private function mapFromObject(EngineCar $engine_car): array
    {
        $rows = array();
        $rows['manufacturer'] = $engine_car->manufacturer;
        $rows['model'] = $engine_car->model;
        $rows['engine'] = $engine_car->engine;
        $rows['price'] = $engine_car->price;
        $rows['tax'] = $engine_car->tax;
        $rows['discount'] = $engine_car->discount;
        $rows['serial'] = $engine_car->serial;
        return $rows;
    }

    private function mapFromRows(array $rows): EngineCar
    {
        return new EngineCar(
            $rows['manufacturer'],
            $rows['model'],
            $rows['price'],
            $rows['tax'],
            $rows['discount'],
            $rows['serial'],
            $rows['engine']
        );
    }
}
