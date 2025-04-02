<?php
    require_once("ProductCURD.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE PRODUCT</title>
    <link rel="stylesheet" href="../css/update.css">
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
        <h1>Update Product</h1>
        <?php
        if(!isset($_GET['id']) || empty($_GET['id'])){
            echo 'No have ID!';
        }else{
            $id = $_GET['id'];
            $product = Product::showProduct($id);
            foreach($product as $p){
                echo '<div>';   
                echo '<label for="id">Product ID: </label>';
                echo '<input type="text" id="id" name="id" value="' . htmlspecialchars($p['Id']) . '">';
                echo '</div>';
                echo '<div>';
                echo '<label for="name">Product Name: </label>';
                echo '<input type="text" id="name" name="name" value="' . htmlspecialchars($p['ProductName']) . '">';
                echo '</div>';
                echo '<div>';
                echo '<label for="price">Price: </label>';
                echo '<input type="text" id="price" name="price" value="' . htmlspecialchars($p['Price']) . '">';
                echo '</div>';
                echo '<div>';
                echo '<label for="description">Description: </label>';
                echo '<textarea id="description" name="description">' . htmlspecialchars($p['Description']) . '</textarea>';
                echo '</div>';
            }

        }
        ?>
        <input type="submit" value="Update" name="updateProduct">
        <a href="index.php">Return to Index</a>
    </form>
</body>
</html>
<?php
    if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['price']) && isset($_POST['description'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        Product::UpdateProduct($id, $name, $price, $description);
    }

?>