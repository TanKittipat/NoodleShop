<?php

if (isset($_POST['MenuID'])) {
    require 'connect.php';

    $MenuID = $_POST['MenuID'];
    $MenuName = $_POST['MenuName'];
    $Price = $_POST['Price'];
    // $Image = $_POST['image'];

    echo 'MenuID = ' . $MenuID;
    echo 'Name = ' . $MenuName;
    echo 'Price = ' . $Price;

    // $uploadFile = $_FILES['image']['name'];
    // $tmpFile = $_FILES['image']['tmp_name'];
    // echo " upload file = " . $uploadFile;
    // echo " tmp file = " . $tmpFile;

    // $stmt = $conn->prepare("UPDATE  Customer SET Name=:Name, Email=:Email WHERE CustomerID=:CustomerID");
    $stmt = $conn->prepare(
        'UPDATE menu SET MenuName=:MenuName, Price=:Price WHERE MenuID=:MenuID'
    );
    $stmt->bindParam(':MenuID', $MenuID);
    $stmt->bindParam(':MenuName', $MenuName);
    $stmt->bindParam(':Price', $Price);
    // $stmt->bindParam(':image', $uploadFile);
    $stmt->execute();

    // $fullpath = "./img/" . $uploadFile;
    // echo " fullpath = " . $fullpath;
    // move_uploaded_file($tmpFile, $fullpath);

    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

    if ($stmt->rowCount() >= 0) {
        echo '
        <script type="text/javascript">
        
        $(document).ready(function(){
        
            swal({
                title: "Success!",
                text: "Successfuly update customer information",
                type: "success",
                timer: 2500,
                showConfirmButton: false
              }, function(){
                    window.location.href = "index.php";
              });
        });
        
        </script>
        ';
    }
    $conn = null;
}
?>