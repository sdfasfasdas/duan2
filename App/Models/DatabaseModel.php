<?php
namespace App\Models;

use PDO;

class DatabaseModel
{

    private $dburl = DB_URL;
    private $dbuser = DB_USER;
    private $dbpass = DB_PASS;
    private $stmt;
    private $conn;

    function __construct()
    {
        try {
            $this->conn = new PDO($this->dburl, $this->dbuser, $this->dbpass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "thanh cong";
        } catch (PDOException $e) {
            //echo "that bai" . 
            $e->getMessage();
        }
    }

    function get_all($sql)
    {
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->execute();
        $this->stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $this->stmt->fetchAll();
    }
    function pdo_execute($sql, ...$params)
    {
        try {
            $this->stmt = $this->conn->prepare($sql);
            $this->stmt->execute($params);
            $this->stmt->setFetchMode(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw $e;
        }
    }
    function pdo_query_value($sql, ...$params)
    {
        try {
            $this->stmt = $this->conn->prepare($sql);
            $this->stmt->execute($params);
            return $this->stmt->fetchColumn();
        } catch (PDOException $e) {
            throw $e;
        }
    }
    function get_one($sql)
    {
        $sql_args = array_slice(func_get_args(), 1);
        try {
            $this->stmt = $this->conn->prepare($sql);
            $this->stmt->execute($sql_args);
            $this->stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $this->stmt->fetch();
        } catch (PDOException $e) {
            throw $e;
        }
    }

    function pdo_execute_id($sql, ...$params)
    {
        try {
            $this->stmt = $this->conn->prepare($sql);
            $this->stmt->execute($params);
            return $this->conn->lastInsertId();
        } catch (PDOException $e) {
            throw $e;
        }
    }
}



function pdo_query($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = connectdb();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $rows = $stmt->fetchAll();
        return $rows;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
