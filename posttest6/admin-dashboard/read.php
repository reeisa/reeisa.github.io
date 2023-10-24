<!-- dashboard -->

<?php
require 'functions.php';

session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

$customer = mysqli_query($conn, "SELECT * FROM `customer`");

// date
date_default_timezone_set('Asia/Makassar');
$currentTime = new DateTime();
$Time = $currentTime->format('l, d F Y H:i:s e');
?>

<!DOCTYPE html>
<html lang=en>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
    <!-- css -->
    <link rel="stylesheet" href="crud.css">
    <!-- hanya untuk icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
</head>

<body>
    <!-- navbar -->
    <nav class="navbar">
        <img src="../assets/image/logo.png" alt="logo">
        <ul>
            <li><a href="logout.php">log out</a></li>
        </ul>
    </nav>
    <!-- navbar -->

    <div class="read-container">
        <h1>customer data</h1>
        <hr>
        <p><?php echo "Today's Date : " . $Time ?></p>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>id number</th>
                    <th>name</th>
                    <th>email</th>
                    <th>category</th>
                    <th>payment method</th>
                    <th>id card</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($customer as $row) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $row['id']; ?></td>
                        <td><?= $row['name']; ?></td>
                        <td><?= $row['email']; ?></td>
                        <td><?= $row['category']; ?></td>
                        <td><?= $row['payment']; ?></td>
                        <td><img src="../assets/image/<?= $row['image'] ?>" alt=""></td>
                        <td>
                            <a href="update.php?id=<?= $row['id']; ?>"><button type="button" class="edit btn"><i class="fa-solid fa-pen-to-square"></i></button></a>
                            <a href="delete.php?id=<?= $row['id']; ?>" onclick="return confirm('are you sure to delete this data? remember : action cannot be undone.')"><button type="button" class="delete btn"><i class="fa-solid fa-trash"></i></button></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>