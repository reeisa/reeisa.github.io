<?php
require '../admin-dashboard/functions.php';

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    if ($password == $cpassword) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
        if (mysqli_fetch_assoc($result)) {
            $error = true;
            $errorMsg = "username already exist";
        } else {
            $sql = "INSERT INTO user VALUES ('','$username', '$password')";
            $result_query = mysqli_query($conn, $sql);

            if (mysqli_affected_rows($conn) > 0) {
                echo "<script>alert('registration successful!'); window.location='login.php';</script>";
            } else {
                echo "<script>alert('registration failed!'); window.location='register.php';</script>";
            }
        }
    } else {
        $error = true;
        $errorMsg = "password do not match";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign up</title>
    <!-- css -->
    <link rel="stylesheet" href="../assets/style/login.css">
    <!-- hanya untuk icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
</head>

<body>
    <div class="login-container">
        <img src="../assets/image/signup.png" alt="">
        <?php
        if (isset($error)) {
            echo "<p style='color:red;'>$errorMsg</p>";
        }
        ?>
        <form action="" method="post">
            <div class="input-icon">
                <i class="fa-solid fa-at"></i>
                <input type="text" id="username" name="username" placeholder="username" required>
            </div>
            <div class="input-icon">
                <i class="fa-solid fa-lock"></i>
                <input type="password" id="password" name="password" placeholder="password" required>
            </div>
            <div class="input-icon">
                <i class="fa-solid fa-key"></i>
                <input type="password" id="cpassword" name="cpassword" placeholder="confirm password" required>
            </div>
            <button type="submit" name="register">sign up</button>
        </form>
        <p>already have an account? <br><a href="login.php">sign in</a></p>
    </div>
</body>

</html>