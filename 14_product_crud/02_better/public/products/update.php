<?php

/* @var $pdo \ PDO */
require_once "../../database.php";
require_once "../../functions.php";




$id = $_GET['id'] ?? null;

if (!$id) {
  header('Location: index.php');
  exit;
}

//echo $_SERVER['REQUEST_METHOD'] . '<br>';

$statement = $pdo->prepare('SELECT * FROM products WHERE id = :id');
$statement->bindValue(':id', $id);
$statement->execute();
$product = $statement->fetch(PDO::FETCH_ASSOC);

//echo '<pre>';
//var_dump($product);
//echo '</pre>';
//exit;

$errors = [];
$title = $product['title'];
$price = $product['price'];
$description = $product['description'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


  if (empty($errors)) {

    require_once "../../validate_product.php";


    $statement = $pdo->prepare("UPDATE  products SET title=:title, image=:image, description=:description,price=:price
     WHERE id=:id");


    $statement->bindValue(':title', $title);
    $statement->bindValue(':image', $imagepath);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':id', $id);
    $statement->execute();
    header('Location:index.php'); //redirects to index.php
  }
}



?>

<?php include_once "../../views/partials/header.php"; ?>


<P>
  <a href="index.php" class="btn btn-secondary">Go back to products</a>
</P>
<h1>Update product <b><?php echo $product['title'] ?></b></h1>

<?php include_once "../../views/products/form.php"; ?>

</body>

</html>