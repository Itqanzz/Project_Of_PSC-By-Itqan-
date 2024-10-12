<?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "onlineorder";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "DELETE FROM booking";

        if ($conn->query($sql) === TRUE) {
            echo "All payments cleared successfully!";
            // Redirect back to the main page
            header(header: "Location: admin.php"); //Assuming the main page is payments.php
        }else{
            echo "Error clearing data: " .$conn->error;
        }

        $conn->close();
        ?>