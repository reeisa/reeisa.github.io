<?php
session_start();
require '../admin-dashboard/functions.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $admin_username = 'admin';
    $admin_password = '123';

    $user_result = mysqli_query($conn, "SELECT * from user WHERE username = '$username'");

    if (mysqli_num_rows($user_result) > 0) {
        $row = mysqli_fetch_assoc($user_result);

        if (password_verify($password, $row['password'])) {
            $_SESSION['userLoggedIn'] = true;
            header('Location: ../user-dashboard/index.php');
            exit;
        }
    }

    if ($username === $admin_username && $password === $admin_password) {
        $_SESSION['adminLoggedIn'] = true;
        header('Location: ../admin-dashboard/read.php');
        exit;
    } else {
        $error = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <!-- css -->
    <link rel="stylesheet" href="../assets/style/login.css">
    <!-- hanya untuk icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
</head>

<body>
    <div class="login-container">
        <img src="../assets/image/signin.png" alt="">
        <?php
        if (isset($error)) {
            echo "<p style='color:red';> incorrect username or password </p>";
        } ?>
        <form action="" method="post">
            <div class="input-icon">
                <i class="fa-solid fa-at"></i>
                <input type="text" id="username" name="username" placeholder="username" required>
            </div>
            <div class="input-icon">
                <i class="fa-solid fa-lock"></i>
                <input type="password" id="password" name="password" placeholder="password" required>
            </div>
            <button type="submit" name="login">sign in</button>
        </form>
        <p>don't have an account? <br><a href="register.php">sign up</a></p>
    </div>
</body>

</html>