<?php

$pdo =  new PDO('mysql:host=localhost;port=3306;dbname=products_crud', 'root', 'pree208');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$statement = $pdo->prepare('SELECT * FROM products ORDER BY create_date DESC');
$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC);





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
  <h1>Products Crud</h1>

  <p>
    <a href="create.php" class="btn btn-success">Create Product</a>
  </p>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">image</th>
        <th scope="col">title</th>
        <th scope="col">price</th>
        <th scope="col">Create Date</th>
        <th scope="col">Action</th>


      </tr>
    </thead>
    <tbody>

      <?php foreach ($products as $i => $product) { ?>

        <tr>
          <th scope="row"><?php echo $i + 1 ?></th>
          <td>
            <img src="<?php echo $product['image'] ?>" class="thumb-image">
          </td>
          <td><?php echo $product['title'] ?></td>
          <td><?php echo $product['price'] ?></td>
          <td><?php echo $product['create_date'] ?></td>

          <td>

            <button type="button" class="btn btn-sm btn-outline-primary">Edit</button>
            <form style="display:inline-block" action="delete.php" method="post">
              <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
              <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
            </form>


          </td>
        </tr>

      <?php } ?>





    </tbody>
  </table>

</body>

</html>