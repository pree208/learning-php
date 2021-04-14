  <?php

  $pdo =  new PDO('mysql:host=localhost;port=3306;dbname=products_crud', 'root', 'pree208');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title = $_POST['title']; //TEST
    $description = $_POST['description'];
    $price = $_POST['price'];
    $date = date('Y-m-d H:i:s');


    if (!$title) { //if title is  empty string
      $errors[] = 'Product title is required';
    }

    if (!$price) { //if price is  empty string
      $errors[] = ' Product Price  is required';
    }

    if (!$description) { //if description is  empty string
      $errors[] = 'product description  is required';
    }


    //if (count($errors) > 0) {

    //return;
    //}

    if (!is_dir('images')) {
      mkdir('images');
    }

    if (empty($errors)) {

      $image = $_FILES['image'] ?? null;
      $imagepath = '';
      if ($image && $image['tmp_name']) {

        $imagepath = 'images/' . randomstring(8) . '/' . $image['name'];
        mkdir(dirname($imagepath));
        //echo '<pre>';
        //var_dump($imagepath);
        // echo '</pre>';

        move_uploaded_file($image['tmp_name'], $imagepath);
      }


      $statement = $pdo->prepare("INSERT INTO products (title, image, description,price,create_date)
  VALUES (:title, :image, :description, :price, :date)");

      $statement->bindValue(':title', $title);
      $statement->bindValue(':image', $imagepath);
      $statement->bindValue(':description', $description);
      $statement->bindValue(':price', $price);
      $statement->bindValue(':date', $date);
      $statement->execute();
      header('Location:index.php');
    }
  }

  function randomString($n)
  {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $str = '';
    for ($i = 0; $i < $n; $i++) {
      $index = rand(0, strlen($characters) - 1);
      $str = $characters[$index];
    }
    return $str;
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



    <form action="" method="post" enctype="multipart/form-data">

      <div class="mb-3">
        <label>Product Image</label>
        <br>
        <input name="image" type="file">

      </div>

      <div class="mb-3">
        <label>Product title </label>
        <input type="text" name="title" class="form-control" value="<?php echo $title ?>">


      </div>

      <div class="mb-3">
        <label>Product description </label>
        <textarea class="form-control" name="description" value="<?php echo $description ?>"></textarea>

      </div>

      <div class="mb-3">
        <label>Product Price</label>
        <input type="number" step=".01" name="price" class="form-control" value="<?php echo $price ?>">

      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </body>

  </html>