<?php

class api
{
    private static $instance;
    /** @var \PDO */
    private $pdo;

    private function __construct() {}

    private function __clone() {}

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function connect() {
        if (!$this->pdo) {
            try {
                $this->pdo = new PDO("mysql:host=127.0.0.1;port=8889;dbname=loft_db", "loft_db", "loft_db");
                return $this->pdo;
            } catch (PDOException $e) {
                echo "Connection error " . $e->getMessage();
                exit;
            }
        }
    }

    private function fetchOne(string $query, array $params = []) {
        $this->connect();
        $query = $this->pdo->prepare($query);
        $ret = $query->execute($params);
        if (!$ret) {
            if ($query->errorCode()) {
                trigger_error(json_encode($query->errorInfo()));
            }
            return false;
        }

        $result = $query->fetchAll($this->pdo::FETCH_ASSOC);
        return reset($result);
    }

    private function exec(string $query, array $params = []) {
        $this->connect();
        $query = $this->pdo->prepare($query);
        $ret = $query->execute($params);
        if (!$ret) {
            if ($query->errorCode()) {
                trigger_error(json_encode($query->errorInfo()));
            }
            return false;
        }

        return $query->rowCount();
    }



    private function getOrdersCount($email) {
        return $this->fetchOne("SELECT count(*) as counter FROM orders WHERE user_id = :email", ["email" => $email]);
    }

    private function setUser($email, $name, $phone) {
        $user = $this->fetchOne("SELECT * FROM users WHERE email = :email", ["email" => $email]);
        if ($user) {
            $this->exec("UPDATE users SET `name` = :name, phone = :phone WHERE email = :email", ["name"=>$name, "phone"=>$phone, "email" => $email]);
        } else {
            $this->exec("INSERT INTO users (email, `name`, phone) VALUES (:email, :name, :phone)", ["name"=>$name, "phone"=>$phone, "email" => $email]);
        }
    }

    public function placeOrder($email, $name, $phone, $address, $comment) {
        $this->setUser($email, $name, $phone);
        $this->exec("INSERT INTO orders (address, comment, user_id, date) VALUES (:address, :comment, :user_id, :date)", ["address"=>$address, "comment"=>$comment, "user_id" => $email, "date"=>date('Y-m-d')]);
        $order_id = $this->pdo->lastInsertId();
        $orders_count = $this->getOrdersCount($email);
        return ["order_id" => $order_id, "orders_counter" => $orders_count["counter"]];
    }
}
