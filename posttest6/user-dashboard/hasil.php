<?php
$name = $_GET['name'];
$id = $_GET['id'];
$email = $_GET['email'];
$category = $_GET['category'];
$payment = $_GET['payment'];
$image = $_GET['image'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>confirmation</title>
    <!-- css -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="ticket2">
        <p>ticket booked!</p>
        <table>
            <tr>
                <th>name</th>
                <td><?php echo htmlspecialchars($name); ?></td>
            </tr>
            <tr>
                <th>id number</th>
                <td><?php echo htmlspecialchars($id); ?></td>
            </tr>
            <tr>
                <th>email</th>
                <td><?php echo htmlspecialchars($email); ?></td>
            </tr>
            <tr>
                <th>category</th>
                <td><?php echo htmlspecialchars($category); ?></td>
            </tr>
            <tr>
                <th>payment method</th>
                <td><?php echo htmlspecialchars($payment); ?></td>
            </tr>
            <tr>
                <th>id card</th>
                <td><img src="../assets/image/<?php echo htmlspecialchars($image); ?>" alt="id card"></td>
            </tr>
        </table>
        <p>continue to payment in (10) minutes...</p>
        <a href="index.php">back</a>
    </div>

</body>

</html>