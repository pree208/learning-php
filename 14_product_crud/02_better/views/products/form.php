<?php if (!empty($errors)) { ?>
  <div class="alert alert-danger">
    <?php foreach ($errors as $error) { ?>
      <div><?php echo $error ?> </div>
    <?php } ?>
  </div>
<?php } ?>



<form action="" method="post" enctype="multipart/form-data">

  <?php if ($product['image']) : ?>
    <img src="./<?php echo $product['image'] ?>" class="thumb-image">

  <?php endif; ?>


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