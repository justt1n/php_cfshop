<?php

namespace MVC\Models;

use PDO;
use MVC\Core\PDOFactory;

class Order
{
	private $pdo;
	private $order_id;
	private $customer_id;
	private $status;
	private $address;
	private $items;


	public function __construct()
	{
		$this->pdo = PDOFactory::create();
	}

	function getOrderById($order_id)
	{

		$stm = $this->pdo->prepare("SELECT * FROM orders WHERE order_id = :order_id");
		$stm->execute([
			'order_id' => $order_id
		]);
		$order = new Order();
		while ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
			$order->fillFromDB($row);
		}
		return $order;
	}

	public function getId()
	{
		return $this->order_id;
	}

	public function setId($id): self
	{
		$this->order_id = $id;
		return $this;
	}

	public function getUser_id()
	{
		return $this->customer_id;
	}

	public function setUser_id($user_id): self
	{
		$this->customer_id = $user_id;
		return $this;
	}

	public function setItems($items)
	{
		$this->items = $items;
		return $this;
	}

	public function setItemsById($id)
	{
		$this->items = [];
		$orderItems = new Order_Items();
		$this->items = $orderItems->getByOrderID($id);
		return $this->items;
	}

	public function fetchItems()
	{
		$this->items = [];
		$orderItems = new Order_Items();
		$this->items = $orderItems->getByOrderID($this->order_id);
		return $this->items;
	}

	public function getOrderInfor()
	{
		return [
			'order_id' => $this->order_id,
			'customer_id' => $this->customer_id,
			'status' => $this->status,
			'address' => $this->address
		];
	}

	public function fill($order)
	{
		[
			'customer_id' => $this->customer_id,
			'address' => $this->address
		] = $order;

		return $this;
	}

	public function fillFromDB($order)
	{
		[
			'order_id' => $this->order_id,
			'customer_id' => $this->customer_id,
			'status' => $this->status,
			'address' => $this->address
		] = $order;

		return $this;
	}

	public function save()
	{
		$statement = $this->pdo->prepare("INSERT INTO orders(customer_id, address) VALUES(:customer_id, :address)");
		$statement->execute([
			'customer_id' => $this->customer_id,
			'address' => $this->address
		]);
		$this->order_id = $this->pdo->lastInsertId();
		return $this;
	}

	public function getByCustomerID($customer_id)
	{
		$orders = [];
		$stm = $this->pdo->prepare("SELECT * FROM orders WHERE customer_id = :customer_id");
		$stm->execute([
			'customer_id' => $customer_id
		]);
		while ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
			$order = new Order();
			$order->fillFromDB($row);
			$orders[] = $order;
		}
		return $orders;
	}

	public function getAllOrder()
	{
		$orders = [];
		$stm = $this->pdo->prepare("SELECT * FROM orders");
		$stm->execute();
		while ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
			$order = new Order();
			$order->fillFromDB($row);
			$orders[] = $order;
		}
		return $orders;
	}

	public function getTotal()
	{
		$total = 0;

		foreach ($this->items as $item) {
			$product = (new \MVC\Models\Product());
			$product = $product->getProductById($item->getOrderItemsInfor()['product_id']);
			$total += $product->getProductInfor()['price'];
		}

		return $total;
	}

	public function getItems()
	{
		return $this->items;
	}

	public function getStatusString()
	{
		switch ($this->status) {
			case 0:
				return 'Đang chờ';
			case 1:
				return 'Đang giao';
			case 2:
				return 'Đã giao';
			case 3:
				return 'Đã huỷ';
		}
	}

	/**
	 * @return mixed
	 */
	public function getCustomer_id()
	{
		return $this->customer_id;
	}

	public function getStatus()
	{
		return $this->status;
	}

	public function getCustomerName()
	{
		$sql = "SELECT users.fullname 
        FROM users 
        INNER JOIN orders 
        ON users.id = orders.customer_id 
        WHERE users.id = :customer_id";

		$stmt = $this->pdo->prepare($sql);
		$stmt->bindParam(':customer_id', $this->customer_id);
		$stmt->execute();

		if ($stmt->rowCount() > 0) {
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$customer_name = $row["fullname"];
			return $customer_name;
		}
	}

	function changeStatus($order_id, $status) 
    {
        if($status < 3) {
			$status = $status + 1;
		} else {
			$status = 0;
		}
		$sql = "UPDATE orders SET status = :status WHERE order_id = :order_id";
		$stmt = $this->pdo->prepare($sql);
		$stmt->bindParam(':status', $status);
		$stmt->bindParam(':order_id', $order_id);
		$stmt->execute();
		header('Location: ' . '/admin/ShowF/Order');
    }

	/**
	 * @param mixed $customer_id 
	 * @return self
	 */
	public function setCustomer_id($customer_id): self
	{
		$this->customer_id = $customer_id;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getOrder_id()
	{
		return $this->order_id;
	}

	/**
	 * @param mixed $order_id 
	 * @return self
	 */
	public function setOrder_id($order_id): self
	{
		$this->order_id = $order_id;
		return $this;
	}
}
