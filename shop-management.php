<?php
$con = mysqli_connect("localhost", "root", "", "ration");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['add_user'])) {
    $shop_name = $_POST['shop_name'];
    $address = $_POST['address'];
    $contact_number = $_POST['contact_number'];
    $shop_owner = $_POST['shop_owner'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $shop_sql = "INSERT INTO shops (shop_name, address, contact_number, created_at, shop_owner, email, password) 
                 VALUES ('$shop_name', '$address', '$contact_number', NOW(), '$shop_owner', '$email', '$password')";
    mysqli_query($con, $shop_sql);

    $login_sql = "INSERT INTO login (email, password, usertype) VALUES ('$email', '$password', 1)";
    mysqli_query($con, $login_sql);
}

$result = mysqli_query($con, "SELECT * FROM shops");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link rel="stylesheet" href="usermanage.css">
</head>
<body>
    <header>
        <h1>User Management</h1>
        <nav>
            <ul>
                <li><a href="admindash.php">Dashboard</a></li>
                <li><a href="shop-management.php">Shop Management</a></li>
                <li><a href="card-management.php">Card Management</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Manage Shops</h2>
        <form method="post">
            <input type="text" name="shop_name" placeholder="Shop Name" required>
            <input type="text" name="address" placeholder="Address" required>
            <input type="text" name="contact_number" placeholder="Contact Number" required>
            <input type="text" name="shop_owner" placeholder="Shop Owner Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="add_user">Add Shop</button>
        </form>

        <table>
            <tr>
                <th>Shop ID</th>
                <th>Shop Name</th>
                <th>Address</th>
                <th>Contact Number</th>
                <th>Shop Owner</th>
                <th>Email</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['shop_name']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['contact_number']; ?></td>
                <td><?php echo $row['shop_owner']; ?></td>
                <td><?php echo $row['email']; ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
    </main>

    <footer>
        <p>&copy; 2024 Ration Shop Management. All rights reserved.</p>
    </footer>
</body>
</html>
