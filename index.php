<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> php - hotel</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>

  <!-- Creazione Table -->

  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>City</th>
        <th>Country</th>
        <th>Price</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($hotels as $hotel) : ?>
      <tr>
        <td><?php echo $hotel['name']; ?></td>
        <td><?php echo $hotel['city']; ?></td>
        <td><?php echo $hotel['country']; ?></td>
        <td>$<?php echo $hotel['price']; ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>




</body>

</html>