<?php
require_once("ProductCURD.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MY INDEX APP</title>
    <link rel="stylesheet" href="../css/index.css">
</head>
<body>
    <div>
        <form action="findProduct.php" method="GET">
            <h1>Products</h1>
            <input type="text" name="productName" placeholder="Finding Product" id="productName">
            <button type="submit">Search</button>
        </form>
    </div>
    <div>
        <table>
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Function</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $product = Product::showAllProduct();
                    foreach($product as $p){
                        echo "<tr>";
                        echo "<td>".htmlspecialchars($p['Id'])."</td>";
                        echo "<td>".htmlspecialchars($p["ProductName"])."</td>";
                        echo "<td>".htmlspecialchars($p["Price"])."</td>";
                        echo "<td>".htmlspecialchars($p["Description"])."</td>";
                        echo "<td>".
                        "<a class='button_a' href='updateProduct.php?id=".htmlspecialchars($p['Id'])."'>Update</a>  
                        <a class='button_a' href='deleteProduct.php?id=".htmlspecialchars($p['Id'])."'>Delete</a>"
                        ."</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
        <a href='addProduct.php'>Add New Product</a>
        <a href='home.php'>Return Home Page</a>
    </div>
</body>
</html>