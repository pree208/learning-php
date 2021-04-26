<?php
$title = $_POST['title']; //TEST
$description = $_POST['description'];
$price = $_POST['price'];
$imagepath = '';



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
  $imagepath = $product['image'];



  if ($image && $image['tmp_name']) {


    if ($product['image']) {
      unlink($product['image']);
    }

    $imagepath = 'images/' . randomstring(8) . '/' . $image['name'];
    mkdir(dirname($imagepath));
    //echo '<pre>';
    //var_dump($imagepath);
    //echo '</pre>';

    move_uploaded_file($image['tmp_name'], $imagepath);
  }
}
