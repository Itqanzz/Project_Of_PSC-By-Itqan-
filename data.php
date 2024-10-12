<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "onlineorder";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $Name = $_POST['Name'];
    $Phone_Number = $_POST['Phone_Number'];
    $Email = $_POST['Email'];
    $Person = $_POST['Person'];
    $Date = $_POST['Date'];
    
    if (isset($_POST['Person'])) {
        $Person = $_POST['Person'];
    } else {
        $Person = null; // or some other default value
    }

    // Insert data into database
    $sql = "INSERT INTO booking (Name, Phone_Number, Email, Person, Date)
    VALUES ('$Name', '$Phone_Number', '$Email', '$Person', '$Date')";

// Create the INSERT query with INSERT IGNORE
$sql = "INSERT IGNORE INTO booking (Name, Phone_Number, Email, Person, Date) VALUES ('$Name', '$Phone_Number', '$Email', '$Person', '$Date')";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Booking complete');</script>";
    echo "<script>window.setTimeout(function(){ window.location.href = 'index.html'; }, 1000);</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>