<?php

namespace MVC\Models;

use \MVC\Core\PDOFactory;
use PDO;

class Order_Items
{
    private $pdo;
    private $id;
    private $order_id;
    private $product_id;
    private $quantity;

    public function __construct()
    {
        $this->pdo = PDOFactory::create();
    }

    public function getOrderItemsInfor()
    {
        return [
            'id' => $this->id,
            'order_id' => $this->order_id,
            'product_id' => $this->product_id,
            'quantity' => $this->quantity
        ];
    }

    public function fill($data)
    {
        [
            'order_id' => $this->order_id,
            'product_id' => $this->product_id,
            'quantity' => $this->quantity
        ] = $data;

        return $this;
    }

    public function fillFromDB($order_items)
    {
        [
            'id' => $this->id,
            'order_id' => $this->order_id,
            'product_id' => $this->product_id,
            'quantity' => $this->quantity
        ] = $order_items;

        return $this;
    }

    public function save()
    {
        $statement = $this->pdo->prepare("INSERT INTO order_items(order_id, product_id, quantity) VALUES(:order_id, :product_id, :quantity)");
        $statement->execute([
            'order_id' => $this->order_id,
            'product_id' => $this->product_id,
            'quantity' => $this->quantity
        ]);
        return $this;
    }

    public function getByOrderID($order_id)
    {
        $items = [];
        $stm = $this->pdo->prepare("SELECT * FROM order_items WHERE order_id = :order_id");
        $stm->execute([
            'order_id' => $order_id
        ]);
        while ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
            $item = new Order_Items();
            $item->fillFromDB($row);
            $items[] = $item;
        }
        return $items;
    }

    public function getAllOrder()
    {
        $items = [];
        $stm = $this->pdo->prepare("SELECT * FROM order_items");
        $stm->execute();
        while ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
            $item = new Order_Items();
            $item->fillFromDB($row);
            $items[] = $item;
        }
        return $items;
    }

	/**
	 * @return mixed
	 */
	public function getProduct_id() {
		return $this->product_id;
	}
	
	/**
	 * @param mixed $product_id 
	 * @return self
	 */
	public function setProduct_id($product_id): self {
		$this->product_id = $product_id;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getQuantity() {
		return $this->quantity;
	}
	
	/**
	 * @param mixed $quantity 
	 * @return self
	 */
	public function setQuantity($quantity): self {
		$this->quantity = $quantity;
		return $this;
	}
}