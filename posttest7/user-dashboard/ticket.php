<?php
session_start();
require '../admin-dashboard/functions.php';

if (!isset($_SESSION['userLoggedIn'])) {
    header('Location: ../user-admin/login.php');
    exit;
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $id = $_POST['id'];
    $email = $_POST['email'];
    $category = $_POST['category'];
    $payment = $_POST['payment'];

    // image file
    $image = $_FILES['image']['name'];
    $x = explode('.', $image);
    $imageName = strtolower(($x[0]));
    $fileExtension = strtolower(end($x));
    $date = date('Y-m-d');
    $fileName = "{$date} {$imageName}.{$fileExtension}";
    $tmp = $_FILES['image']['tmp_name'];
    $allowedExtensions = array("jpg", "png", "jpeg", "gif", "webp");

    if (in_array($fileExtension, $allowedExtensions) === false) {
        echo "
        <script>
            alert('file extension is not a supported image type.');
            document.location.href = 'index.php';
        </script>";
    } else {
        if (move_uploaded_file($tmp, '../assets/image/' . $fileName)) {
            $result = mysqli_query($conn, "INSERT INTO customer (id, name, email, category, payment, image) VALUES ('$id', '$name', '$email', '$category', '$payment', '$fileName')");
            if ($result) {
                header('Location: hasil.php?name=' . $name . '&id=' . $id . '&email=' . $email . '&category=' . $category . '&payment=' . $payment . '&image=' . $fileName);
                exit;
            } else {
                echo "
                <script>
                    alert('failed to booked ticket.');
                    document.location.href = 'index.php';
                </script>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ticket</title>
    <!-- css -->
    <link rel="stylesheet" href="../assets/style/crud.css">
    <!-- hanya untuk icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
</head>

<body>
    <div class="form-container">
        <form action="" method="POST" enctype="multipart/form-data">
            <a href="index.php"><button type="button" class="bttn"><i class="fa-solid fa-arrow-left-long"></i></button></a>
            <h2>ticket</h2>
            <div class="form-element">
                name:
                <input type="text" id="name" name="name" placeholder="enter your name" required>
            </div>
            <div class="form-element">
                id number:
                <input type="text" id="id" name="id" placeholder="enter your id" required>
            </div>
            <div class="form-element">
                email:
                <input type="email" id="email" name="email" placeholder="enter your email" required>
            </div>
            <div class="form-element">
                ticket category: <br>
                <input type="radio" id="vip" name="category" value="vip"> vip
                <input type="radio" id="general" name="category" value="general"> general
            </div>
            <div class="form-element">
                payment method: <br>
                <input type="radio" id="payment" name="payment" value="debit"> debit card
                <input type="radio" id="payment" name="payment" value="credit"> credit card
            </div>
            <div class="form-element">
                id card: <br>
                <input type="file" name="image" class="image" required>
            </div>
            <button type="submit" class="btn" name="submit" value="submit">purchase</button>
        </form>
    </div>
</body>

</html>