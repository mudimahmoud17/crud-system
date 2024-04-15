<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+z5vIOI3hP5k6k0oPq0iF7gV58qcVR5PbOQvqtf" crossorigin="anonymous">
    <title>Sidebar</title>
</head>
<body>

<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use href="#bootstrap-icons"></use></svg>
      <span class="fs-4">Sidebar</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="index.php" class="nav-link active" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use href="#users"></use></svg>
          Users
        </a>
      </li>
      <li>
        <a href="role.php" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use href="#roles"></use></svg>
          Roles
        </a>
      </li>
      <li>
        <a href="product.php" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use href="#orders"></use></svg>
          product
        </a>
      </li>
      <li>
        <a href="orderdetail.php" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use href="#products"></use></svg>
          orderdetail
        </a>
      </li>
      <li>
        <a href="category.php" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use href="#customers"></use></svg>
          Categories
        </a>
      </li>
    </ul>
    <hr>
</div>

</body>
</html>
