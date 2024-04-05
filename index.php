<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Practice</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
    <h1>Database Practice</h1>
</header>
<div class="container">
    <div class="content">
        <?php
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "gursimran"; 

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM product_data"; 
        $result = $conn->query($sql);

        if ($result) {
            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr><th>ID</th><th>Item Name</th><th>Cost</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["id"] . "</td><td>" . $row["item_name"] . "</td><td>" . $row["cost"] . "</td></tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }
        } else {
            echo "Error: " . $conn->error;
        }

        $conn->close();
        ?>
    </div>
</div>
<footer>
    &copy; gursimran. All rights reserved.
</footer>
</body>
</html>
