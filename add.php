<?php
session_start();
$errors = $_SESSION['errors'] ?? [];
$old = $_SESSION['old'] ?? [];
unset($_SESSION['errors'], $_SESSION['old']);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Add Product</title>
  </head>
  <body> 
    <h1 class="text-center mt-3 text-success">Add Product</h1>
    
    <div class="container">
      <div class="row">
        <div class="col-10 mx-auto">

          <!-- Form Start -->
          <form action="code.php" method="post">

            <!-- Name field -->
            <input type="text" 
                   placeholder="Enter Product Name" 
                   class="form-control mt-3 <?= isset($errors['name']) ? 'is-invalid' : '' ?>" 
                   name="p_name" 
                   value="<?= htmlspecialchars($old['name'] ?? '') ?>">
            <?php if (isset($errors['name'])): ?>
              <div class="invalid-feedback"><?= $errors['name'] ?></div>
            <?php endif; ?>

            <!-- Price field-->
            <input type="number" 
                   placeholder="Enter Product Price" 
                   min="0" 
                   class="form-control mt-3 <?= isset($errors['price']) ? 'is-invalid' : '' ?>" 
                   name="p_price"
                   value="<?= htmlspecialchars($old['price'] ?? '') ?>">
            <?php if (isset($errors['price'])): ?>
              <div class="invalid-feedback"><?= $errors['price'] ?></div>
            <?php endif; ?>

            <!-- Quantity field -->
            <input type="number" 
                   placeholder="Enter Product Quantity" 
                   min="0" 
                   class="form-control mt-3 <?= isset($errors['qty']) ? 'is-invalid' : '' ?>" 
                   name="p_qty"
                   value="<?= htmlspecialchars($old['qty'] ?? '') ?>">
            <?php if (isset($errors['qty'])): ?>
              <div class="invalid-feedback"><?= $errors['qty'] ?></div>
            <?php endif; ?>

            <button type="submit" class="btn btn-outline-success mt-3" name="add_product">Add Product</button>
            <a href="view.php" class="btn btn-outline-primary mt-3 ms-3">View Product</a>
          </form>
          <!-- Form End -->

        </div>
      </div>
    </div>
  </body>
</html>
