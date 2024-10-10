<?php
// user-management.php
$con = mysqli_connect("localhost", "root", "", "ration");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query to fetch users with card color
$result = mysqli_query($con, "SELECT * FROM users");

$order_by = isset($_GET['sort']) ? $_GET['sort'] : 'usid';
$result = mysqli_query($con, "SELECT * FROM users ORDER BY $order_by");
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
        <h2>Manage Users</h2>

        <!-- Sorting Options -->
        <div>
            <strong>Sort by:</strong>
            <a href="?sort=color">Card Color</a>
            <a href="?sort=name">Name</a>
            <a href="?sort=usid">User ID</a>
        </div>

        <table>
            <tr>
                <th>User ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Card Color</th> <!-- New column for Card Color -->
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $row['usid']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phno']; ?></td>
                <td><?php echo $row['card_color']; ?></td> <!-- Fetch and display Card Color -->
            </tr>
            <?php endwhile; ?>
        </table>
    </main>

    <footer>
        <p>&copy; 2024 Ration Shop Management. All rights reserved.</p>
    </footer>
</body>
</html>
