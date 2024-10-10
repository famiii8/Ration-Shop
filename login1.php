<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login1.css">
    <title>Login Page</title>
</head>
<body>

<nav class="navbar">
    <div class="navbar-title">E-RATION MANAGEMENT SYSTEM</div>
    <ul class="nav-menu">
        <li class="abcd"><a href="./index1.html"><b>Home</b></a></li>
        <li class="abcd"><a href="./fee.php"><b>Feedback</b></a></li>
    </ul>
</nav>

<div class="logincontainer">
    <form class="loginform" action="" method="post">
        <h1>E-RATION</h1>
        <input class="doc1" type="text" name="email" placeholder="Email">
        <input class="doc1" type="password" name="password" placeholder="Password">
        <input class="LoginButton" type="submit" name="submit" value="LOGIN">
        <div class="signup-link">
            <p>Don't have an account? <a href="./register.php">Register</a></p>
        </div>
    </form>
</div>

<?php
$con = mysqli_connect("localhost", "root", "", "ration");
if (!$con) {
    echo "Database connection failed.";
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM login WHERE email='$email' AND password='$password'";
    $data = mysqli_query($con, $sql);

    if ($data && mysqli_num_rows($data) > 0) {
        $value = mysqli_fetch_assoc($data);

        // Redirect based on user type
        if ($value['usertype'] == 0) {
            header('Location: userdash.php');
            exit();
        } elseif ($value['usertype'] == 1) {
            header('Location: staffdash.php');
            exit();
        } elseif ($value['usertype'] == 3) {
            header('Location: admindash.php');
            exit();
        }
    } else {
        echo "<script>alert('User not found');</script>";
    }
}

// Close the database connection
mysqli_close($con);
?>

</body>
</html>