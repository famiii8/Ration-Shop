<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reg.css">
    <title>Document</title>
</head>
<body>
    <div class="logincontainer"> 
    <div class="parent">
    <form class="test" method="post" enctype="multipart/form-data">
    <span class="head"><b>User Registration</b></span><br>
            <label>Name:</label> <input class="input1" type="text" placeholder="Enter Firstname" name="name" required><br>
            <label>Email:</label> <input class="input1" type="email" placeholder="Enter Email" name="email" required><br>
            <label>Ph No:</label><input class="input1" type="number" placeholder="Enter your Ph No" name="phno" required><br>
            <label>Address:</label><input class="input2" type="text" placeholder="Enter your address" name="address" required><br>
            <label>Pincode:</label><input class="input1" type="number" placeholder="Enter Pincode" name="pincode" required><br>
            <label>Card Num:</label><input class="input1" type="number" placeholder="Enter Card Num" name="rcard" required><br>
            <label>Card Color:</label>
            <select name="card_color" class="input1" required>
                <option value="white">White</option>
                <option value="blue">Blue</option>
                <option value="pink">Pink</option>
                <option value="yellow">Yellow</option>
            </select><br>
            <label>Number of Members in House:</label><input class="input1" type="number" placeholder="Enter Number of Members" name="members" required><br>
            <label>Ration Card Image:</label><input class="input1" type="file" name="ration_card_image" accept="image/*" required><br>
            <label>Password:</label><input class="input1" type="password" placeholder="Enter Password" name="pwd" required><br>
            <button name="submit" type="submit" class="button1">REGISTER</button>
            <p class="abc">Already have an Account?<a href="login1.php">Signup</a></p>
        </form>
    </div>

</body>

</html>

<?php
$con=mysqli_connect("localhost","root","","ration");
if(!$con){
    echo "db not connected";
}
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phno = $_POST['phno'];
    $address = $_POST['address'];
    $pincode = $_POST['pincode'];
    $rcard = $_POST['rcard'];
    $card_color = $_POST['card_color'];
    $members = $_POST['members'];
    $pwd = $_POST['pwd'];

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["ration_card_image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


    if ($uploadOk == 0) {
        echo "<script>alert('Sorry, your file was not uploaded.')</script>";
    } else {
        if (move_uploaded_file($_FILES["ration_card_image"]["tmp_name"], $target_file)) {
            $sql = "INSERT INTO `users`(`name`, `phno`, `email`, `address`, `pincode`, `rcardno`, `card_color`, `members`, `ration_card_image`, `password`) VALUES ('$name','$phno','$email','$address','$pincode','$rcard','$card_color','$members','$target_file','$pwd')";
            $sql1 = "INSERT INTO `login`(`email`, `password`, `usertype`) VALUES ('$email','$pwd',0)";
            
            $data = mysqli_query($con, $sql);
            $data1 = mysqli_query($con, $sql1);
            
            if ($data && $data1) {
                echo "<script>alert('User registration Success'); window.location.href = 'login.php';</script>";
            } else {
                echo "<script>alert('User registration Failed'); window.location.href = 'login.php';</script>";
            }
            
        } else {
            echo "<script>alert('Sorry, there was an error uploading your file.')</script>";
        }
    }
}
?>
