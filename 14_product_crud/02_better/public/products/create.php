  <?php

  /* @var $pdo \ PDO */

  require_once "../../database.php";
  require_once "../../functions.php";
  // echo '<pre>';
  /// var_dump($_POST);
  //echo '</pre>';
  // exit;


  //echo '<pre>';
  //var_dump($_FILES);
  //echo '</pre>';



  //echo $_SERVER['REQUEST_METHOD'] . '<br>';

  $errors = [];
  $title = '';
  $price = '';
  $description = '';
  $product = [
    'image' => ''
  ];

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    if (empty($errors)) {

      require_once "../../validate_product.php";


      $statement = $pdo->prepare("INSERT INTO products (title, image, description,price,create_date)
  VALUES (:title, :image, :description, :price, :date)");

      $statement->bindValue(':title', $title);
      $statement->bindValue(':image', $imagepath);
      $statement->bindValue(':description', $description);
      $statement->bindValue(':price', $price);
      $statement->bindValue(':date', date('Y-m-d H:i:s'));
      $statement->execute();
      header('Location:index.php'); //redirects to index.php
    }
  }


  ?>


  <?php include_once "../../views/partials/header.php"; ?>
  <P>
    <a href="index.php" class="btn btn-secondary">Go back to products</a>
  </P>

  <h1>Create new product</h1>
  <?php include_once "../../views/products/form.php"; ?>

  </body>

  </html>