<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <title>Update Menu </title>
</head>

<body>

  <?php
  require 'connect.php';

  $sql_select = 'select * from types order by TypeID';
  $stmt_s = $conn->prepare($sql_select);
  $stmt_s->execute();
  echo "MenuID = " . $_GET['MenuID'];

  if (isset($_GET['MenuID'])) {
    $sql_select_food = 'SELECT * FROM menu WHERE MenuID=?';
    $stmt = $conn->prepare($sql_select_food);
    $stmt->execute([$_GET['MenuID']]);
    echo "get = " . $_GET['MenuID'];
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
  }
  ?>


  <div class="container">
    <div class="row">
      <div class="col-md-4"> <br>
        <h3>ฟอร์มแก้ไขข้อมูลเมนู</h3>
        <form action="updateFood.php" method="POST">
          <input type="hidden" name="MenuID" value="<?= $result['MenuID']; ?>">

          <label for="name" class="col-sm-2 col-form-label"> ชื่อ : </label>

          <input type="text" name="MenuName" class="form-control" required value="<?= $result['MenuName']; ?>">


          <label for="name" class="col-sm-2 col-form-label"> ราคา : </label>

          <input type="number" name="Price" class="form-control" required value="<?= $result['Price']; ?>">

          <!-- <label for="name" class="col-sm-2 col-form-label"> รูป : </label>

          <input type="file" name="image" class="form-control" required value=""> -->

          <br> <button type="submit" class="btn btn-primary">แก้ไขข้อมูล</button>
        </form>
      </div>
    </div>
  </div>

</body>

</html>