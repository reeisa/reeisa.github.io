<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>confirmation</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $id = $_POST['id'];
        $email = $_POST['email'];
        $category = $_POST['category'];
        $payment = $_POST['payment'];
    } else {
        echo "No data existed.";
    }
    ?>
    <div class="ticket2">
        <p>ticket booked!</p>
        <table>
            <tr>
                <th>name</th>
                <td><?php echo $name; ?></td>
            </tr>
            <tr>
                <th>id number</th>
                <td><?php echo $id; ?></td>
            </tr>
            <tr>
                <th>email</th>
                <td><?php echo $email; ?></td>
            </tr>
            <tr>
                <th>category</th>
                <td><?php echo $category; ?></td>
            </tr>
            <tr>
                <th>payment method</th>
                <td><?php echo $payment; ?></td>
            </tr>
        </table>
        <p>continue to payment in (10) minutes...</p>
        <a href="index.html">back</a>
    </div>
</body>
</html>