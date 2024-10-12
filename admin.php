<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Management</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <h2>Booking  Management</h2>
    <a href="book.html">Back</a>
    <table>
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Phone_Number</th>
            <th>Email</th>
            <th>Person</th>
            <th>Date</th>
        </tr>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "onlineorder";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT Name, Phone_Number, Email, Person, Date FROM booking";
        $result = $conn->query($sql);

        if (!$result) {
            die("Query failed: " . $conn->error);
        }
        $serialNumber = 1;

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$serialNumber."</td>";
                echo "<td>".$row["Name"]."</td>";
                echo "<td>".$row["Phone_Number"]."</td>";
                echo "<td>".$row["Email"]."</td>";
                echo "<td>".$row["Person"]."</td>";
                echo "<td>".$row["Date"]."</td>";
                echo "</tr>";
                $serialNumber++;
            }
        } else {
            echo "<tr><td colspan='5'>No booking found</td></tr>";
        }
        $conn->close();
    ?>
    </table>
    <form action="clear.php" method="post">
        <input type="submit" value="Clear All Payments" onclick="return confirm('Are you sure you want to clear all data?');">
    </form>
</body>
</html>


















