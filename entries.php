<?php

// Database configuration
$dbHost = 'localhost:3306';
$dbUsername = 'tejas';
$dbPassword = 'ILOVEKRISHNA';
$dbName = 'OPENCHAT';

// Connect to the database
$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve data from the table
$sql = "SELECT * FROM messages";
$result = $conn->query($sql);
echo "<h3> <mark style='background:#4CAF50;color:#fff;'>ADMIN PANEL</mark>, Login Entries Database </h3>";

echo "<h3 style='right:8%;position:absolute;top:0;'><a href='index.html' style='background:tomato;color:#fff;border-radius:6px;padding:6px;text-decoration:none;'>Home</a></h3>";
// Check if any rows were returned
if (mysqli_num_rows($result) > 0) {
    // Start the HTML table and add CSS styles
    echo "<style>
            table {
                border-collapse: collapse;
                width: 100%;
            }
            th, td {
                text-align: left;
                padding: 8px;
            }
            th {
                background-color: #4CAF50;
                color: white;
            }
            tr:nth-child(even) {
                background-color: #f2f2f2;
            }
            tr:hover {
                background-color: #ddd;
            }
          </style>";
    echo "<table>";
    echo "<tr><th>Name</th><th>Message Content</th>";
    // echo "<th>Password</th>";
    // echo "<th>Date</th><th>Time</th>";
    echo "</tr>";

    // Loop through each row and display the data
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["username"] . "</td>";
        echo "<td>" . $row["message"] . "</td>";
        //echo "<td>" . $row["password"] . "</td>";
        //echo "<td>" . $row["date"] . "</td>";
        //echo "<td>" . $row["time"] . "</td>";
        echo "</tr>";
    }

    // End the HTML table
    echo "</table>";
} else {
    echo "No data found.";
}
// Close the MySQL connection
$conn->close();

?>
