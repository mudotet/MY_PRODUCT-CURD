<?php
require_once("connectSql.php");

class Product{
    public $id;
    public $name;
    public $price;
    public $description;

    function __construct($name, $price, $description){
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
    }

    public static function addProduct($name, $price, $description){
        $pdo = new PDO("mysql:host=" . ConnectProductSql::getHost() . 
            ";port=" . ConnectProductSql::getPort() . ";dbname=" . ConnectProductSql::getDbName() . ";charset=utf8", ConnectProductSql::getUserName(), ConnectProductSql::getPassWord());
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO `product`(`ProductName`, `Price`, `Description`) VALUES ('$name','$price','$description')";
        $stmt = $pdo->prepare($sql);
        $result = $stmt -> execute();
        if($result){
            header('Refresh: 1; url=index.php');
        }else{
            echo "<span style='color: #333;'>Failed to add product!</span>";
        }
    }

    public static function DeleteProduct($id){
        $pdo = new PDO("mysql:host=" . ConnectProductSql::getHost() . 
            ";port=" . ConnectProductSql::getPort() . ";dbname=" . ConnectProductSql::getDbName() . ";charset=utf8", ConnectProductSql::getUserName(), ConnectProductSql::getPassWord());
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM `product` WHERE `Id` = '$id';";
        $stmt = $pdo->prepare($sql);
        $result = $stmt -> execute();
        if($result){
            header('Refresh: 1; url=deleteProduct.php');
        }else{
            echo "<span style='color: #333;'>Failed to delete product!</span>";
        }
    }

    public static function UpdateProduct($id, $name, $price, $description){
        $pdo = new PDO("mysql:host=" . ConnectProductSql::getHost() . 
            ";port=" . ConnectProductSql::getPort() . ";dbname=" . ConnectProductSql::getDbName() . ";charset=utf8", ConnectProductSql::getUserName(), ConnectProductSql::getPassWord());
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE `product` SET `Id`='$id',`ProductName`='$name',`Price`='$price',`Description`='$$description' WHERE `ProductName`='$name'";
        $stmt = $pdo->prepare($sql);
        $result = $stmt -> execute();
        if($result){
            header('Refresh: 1; url=index.php');
        }else{
            echo "<span style='color: #333;'>Failed to update product!</span>";
        }
    }

    public static function findProduct($name){
        $pdo = new PDO("mysql:host=" . ConnectProductSql::getHost() . 
            ";port=" . ConnectProductSql::getPort() . ";dbname=" . ConnectProductSql::getDbName() . ";charset=utf8", ConnectProductSql::getUserName(), ConnectProductSql::getPassWord());
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM `product` WHERE `ProductName` LIKE '%$name%';";
        $stmt = $pdo->prepare($sql);
        $stmt -> execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function showAllProduct(){
        $pdo = new PDO("mysql:host=" . ConnectProductSql::getHost() . 
            ";port=" . ConnectProductSql::getPort() . ";dbname=" . ConnectProductSql::getDbName() . ";charset=utf8", ConnectProductSql::getUserName(), ConnectProductSql::getPassWord());
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM `product`";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function showProduct($id){
        $pdo = new PDO("mysql:host=" . ConnectProductSql::getHost() . 
            ";port=" . ConnectProductSql::getPort() . ";dbname=" . ConnectProductSql::getDbName() . ";charset=utf8", ConnectProductSql::getUserName(), ConnectProductSql::getPassWord());
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM `product` WHERE `Id` = '$id';";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>