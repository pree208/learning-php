  <?php

  $pdo =  new PDO('mysql:host=localhost;port=3306;dbname=products_crud', 'root', 'pree208');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // echo '<pre>';
  /// var_dump($_POST);
  //echo '</pre>';
  // exit;

  //echo $_SERVER['REQUEST_METHOD'] . '<br>';

  $errors = [];

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title = $_POST['title']; //TEST
    $description = $_POST['description'];
    $price = $_POST['price'];
    $date = date('Y-m-d H:i:s');


    if (!$title) { //if title is  empty string
      $errors[] = 'Product title is required';
    }

    if (!$price) { //if price is  empty string
      $errors[] = 'Price title is required';
    }




    $statement = $pdo->prepare("INSERT INTO products (title, image, description,price,create_date)
  VALUES (:title, :image, :description, :price, :date)");

    $statement->bindValue(':title', $title);
    $statement->bindValue(':image', '');
    $statement->bindValue(':description', $description);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':date', $date);
    $statement->execute();
  }

  ?>



  <!doctype html>
  <html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="app.css">
    <title>Products Crud</title>
  </head>

  <body>
    <h1>Create new product</h1>

    <?php if (!empty($errors)) { ?>
      <div class="alert alert-danger">
        <?php foreach ($errors as $error) { ?>
          <div><?php echo $error ?> </div>
        <?php } ?>
      </div>
    <?php } ?>


    <form action="" method="post">

      <div class="mb-3">
        <label>Product Image</label>
        <br>
        <input name="image" type="file">

      </div>

      <div class="mb-3">
        <label>Product title </label>
        <input type="text" name="title" class="form-control">


      </div>

      <div class="mb-3">
        <label>Product description </label>
        <textarea class="form-control" name="description"></textarea>

      </div>

      <div class="mb-3">
        <label>Product Price</label>
        <input type="number" step=".01" name="price" class="form-control">

      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>