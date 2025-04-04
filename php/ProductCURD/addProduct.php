<?php
    require_once("ProductCURD.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD PRODUCT PAGE</title>
    <link rel="stylesheet" href="../css/add.css">
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "POST">
        <h1>Adding Product</h1>
        <div>
            <label for="name">Product Name:</label>
            <input type="text" name="name" id="name" required>
        </div>
        <div>
            <label for="price">Price:</label>
            <input type="number" name="price" id="price" required>
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea name="description" id="description" required></textarea>
        </div>
        <div>
            <input type="submit" value="Add Product" name="addProduct">
            <a href="index.php">Return to index</a>
        </div>
    </form>
</body>
</html>

<?php
    if(isset($_POST['name']) && isset($_POST['price']) && isset($_POST['description'])){
        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        Product::addProduct($name, $price, $description);
    }

?>