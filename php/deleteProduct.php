<?php
    require_once("ProductCURD.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DELETE PRODUCT</title>
    <link rel="stylesheet" href="../css/delete.css">
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <div>
            <h1>Please select Product to delete</h1>
        </div>
        <div>
        <table>
                <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Checkbox</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(!isset($_GET['id']) || empty($_GET['id'])){
                            echo 'No have ID!';
                        }else{
                            $id = $_GET['id'];
                            $product = Product::showProduct($id);
                            foreach ($product as $p) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($p['Id']) . "</td>";
                                echo "<td>" . htmlspecialchars($p["ProductName"]) . "</td>";
                                echo "<td>" . htmlspecialchars($p["Price"]) . "</td>";
                                echo "<td>" . htmlspecialchars($p["Description"]) . "</td>";
                                echo "<td><input type='radio' name='id' value='" . htmlspecialchars($p['Id']) . "'></td>";
                                echo "</tr>";
                            }
                        }
                    ?>
                </tbody>
            </table>
            <input type="submit" value="Delete" name="deleteProduct">
            <a href="index.php">Return to Index</a>
        </div>
    </form>
</body>
</html>
<?php
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['deleteProduct'])) {
        if (!isset($_POST['id']) || empty($_POST['id'])) {
            echo 'Please select a product to delete!';
        } else {
            $id = $_POST['id'];
            Product::DeleteProduct($id);
        }
    }
?>