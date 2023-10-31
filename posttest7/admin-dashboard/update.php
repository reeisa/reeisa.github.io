<?php
session_start();
require 'functions.php';

if (!isset($_SESSION['adminLoggedIn'])) {
    echo "<script>alert('login as an admin first.'); window.location='../user-admin/login.php';</script>";
    exit;
}

if (!isset($_GET['id'])) {
    header('Location: read.php');
    exit;
}

$id = $_GET['id'];
$customer = mysqli_query($conn, "SELECT * FROM `customer` WHERE id = '$id'");

if (mysqli_num_rows($customer) == 0) {
    echo "<script>alert('data not found.'); window.location='read.php';</script>";
    exit;
}

$row = mysqli_fetch_assoc($customer);

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $category = $_POST['category'];
    $payment = $_POST['payment'];
    $image = $_FILES['image']['name'];

    if (!empty($image)) {
        $tmp = $_FILES['image']['tmp_name'];
        $allowedExtensions = array("jpg", "png", "jpeg", "gif", "webp");
        $x = explode('.', $image);
        $imageName = strtolower($x[0]);
        $fileExtension = strtolower(end($x));
        $date = date('Y-m-d');
        $fileName = "{$date} {$imageName}.{$fileExtension}";

        if (in_array($fileExtension, $allowedExtensions) === false) {
            echo "<script>alert('file extension is not a supported image type.'); window.location='edit.php?id=$id';</script>";
            exit;
        }

        if (!move_uploaded_file($tmp, '../assets/image/' . $fileName)) {
            echo "<script>alert('error uploading the image.'); window.location='edit.php?id=$id';</script>";
            exit;
        }

        $sql = "UPDATE `customer` SET name = '$name', email = '$email', category = '$category', payment = '$payment', image = '$fileName' WHERE id = '$id'";
    } else {
        $sql = "UPDATE `customer` SET name = '$name', email = '$email', category = '$category', payment = '$payment' WHERE id = '$id'";
    }

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('data successfully updated.'); window.location='read.php';</script>";
    } else {
        echo "error updating data: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
    <!-- css -->
    <link rel="stylesheet" href="../assets/style/crud.css">
    <!-- hanya untuk icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
</head>

<body>
    <div class="form-container">
        <form action="" method="POST" enctype="multipart/form-data">
            <a href="read.php"><button type="button" class="bttn"><i class="fa-solid fa-arrow-left-long"></i></button></a>
            <h2>edit data</h2>
            <div class="form-element">
                name:
                <input type="text" id="name" name="name" placeholder="enter your name" value="<?= $row['name']; ?>" required>
            </div>
            <div class="form-element">
                id number:
                <input type="text" id="id" name="id" placeholder="enter your id" value="<?= $row['id']; ?>" required>
            </div>
            <div class="form-element">
                email:
                <input type="email" id="email" name="email" placeholder="enter your email" value="<?= $row['email']; ?>" required>
            </div>
            <div class="form-element">
                ticket category: <br>
                <input type="radio" id="vip" name="category" value="vip" <?php if ($row['category'] == 'vip') echo 'checked'; ?>> vip
                <input type="radio" id="general" name="category" value="general" <?php if ($row['category'] == 'general') echo 'checked'; ?>> general
            </div>
            <div class="form-element">
                payment method: <br>
                <input type="radio" id="debit" name="payment" value="debit" <?php if ($row['payment'] == 'debit') echo 'checked'; ?>> debit card
                <input type="radio" id="credit" name="payment" value="credit" <?php if ($row['payment'] == 'credit') echo 'checked'; ?>> credit card
            </div>
            <div class="form-element">
                id card: <br>
                <input type="file" id="image" name="image" required>
            </div>
            <button type="submit" class="btn" name="update" value="update">update</button>
        </form>
    </div>
</body>

</html>