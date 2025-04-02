<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RESULT FINDING</title>
    <link rel="stylesheet" href="../css/find.css">
</head>
<body>
    <div class="container">
        <div>
            <?php
                require_once('ProductCURD.php');
                if(!isset($_GET['productName']) || empty($_GET['productName'])){
                    echo "<span style='color: #333;'>No have Product Name!</span>";
                }else{
                    $name = $_GET['productName'];
                    $product = Product::findProduct($name);
                    if($product){
                        echo "<table>";
                        echo "<thead>";
                        echo "<tr>";
                        echo "<th>Product ID</th>";
                        echo "<th>Product Name</th>";
                        echo "<th>Price</th>";
                        echo "<th>Description</th>";
                        echo "<th>Function</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        foreach($product as $p){
                            echo "<tr>";
                            echo "<td>".htmlspecialchars($p['Id'])."</td>";
                            echo "<td>".htmlspecialchars($p["ProductName"])."</td>";
                            echo "<td>".htmlspecialchars($p["Price"])."</td>";
                            echo "<td>".htmlspecialchars($p["Description"])."</td>";
                            echo "<td class = 'button_update_delete'>"."<a href='updateProduct.php?id=".htmlspecialchars($p['Id'])."'>Update</a>  
                                    <a href='deleteProduct.php?id=".htmlspecialchars($p['Id'])."'>Delete</a>"."</td>";
                            echo "</tr>";
                        }
                        echo "</tbody>";
                        echo "</table>";
                    }else{
                        echo "<span style='color: #333;'>No have Product!'</span>";
                    }
                }
            ?>
        </div>
        <div>
            <a href='index.php'>Return to Index</a>
        </div>
    </div>
</body>
</html>