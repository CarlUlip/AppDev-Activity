<?php
$dsn = "mysql:host=localhost;dbname=product_management";
$username = "root";
$password = "";
$dbname = "RealMe";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $sql = "INSERT INTO products (name, description, price, quantity) VALUES (:name, :description, :price, :quantity)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['name' => $name, 'description' => $description, 'price' => $price, 'quantity' => $quantity]);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RealMe</title>
</head>

<body>
    <div class="container">
        <h1>Product List</h1>
        <a class="btn btn-primary" href="/product_management/create.php" role="button">New Product</a>
        <br><br>

        <form action="/pruduct_management/submit.php" method="POST">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" id="description" name="description" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" id="price" name="price" class="form-control" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success" href="/product_management/create.php">Save</button>

        </form>

        <table class="table mt-3">
            <thead>
                <td>
                    <a class='btn btn-primary btn-sm' href='/product management/edit.php?id={$row[' id']}'>Edit</a>
                    <a class='btn btn-danger btn-sm' href='/pruduct management/delete.php?id={$row[' id']}'>Delete</a>
                </td>


</body>

</html>