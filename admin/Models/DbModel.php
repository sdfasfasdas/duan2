<?php
class DbModel
{
    
    private $dburl  = DB_URL;
    private $dbuser = DB_USER;
    private $dbpass = DB_PASS;
    private $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO("".$this->dburl."", $this->dbuser, $this->dbpass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new Exception("Connection failed: " . $e->getMessage());
        }
    }

    public function getAll($sql)
    {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    public function execute($sql)
    {
        try {
            $sql_args = array_slice(func_get_args(), 1);
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($sql_args);
        } catch (PDOException $e) {
            // Xử lý ngoại lệ nếu có
            throw $e;
        }
    }

    public function query($sql)
    {
        $sql_args = array_slice(func_get_args(), 1);
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($sql_args);
        return $stmt->fetchAll();
    }

    public function queryOne($sql)
    {
        $sql_args = array_slice(func_get_args(), 1);
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($sql_args);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function queryValue($sql, $params = [])
    {
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($params); // Thêm tham số vào execute

            $result = $stmt->fetchColumn(); // Sử dụng fetchColumn để lấy giá trị cột đầu tiên

            return $result;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    public function getMaxIdBill()
    {
        $sql = "SELECT MAX(id) AS max_idbill FROM bill";
        $result = $this->queryOne($sql);
        return $result['max_idbill'];
    }

    public function executeId($sql)
    {
        $sql_args = array_slice(func_get_args(), 1);
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($sql_args);
        return $this->conn->lastInsertId();
    }

    public function getVoucherValueByMaVoucher($maVoucher)
    {
        $sql = "SELECT giatri FROM voucher WHERE voucher = ?";
        return $this->queryOne($sql, $maVoucher);
    }
}