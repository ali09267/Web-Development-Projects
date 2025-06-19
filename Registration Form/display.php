<?php
// Step 1: Connect to database
$servername = "localhost";
$username = "root";
$password = "ali123";
$database = "task02";

$conn = new mysqli($servername, $username, $password, $database);

// Step 2: Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 3: Write SQL SELECT query
$sql = "SELECT std_ID, std_name, rollNo,email, dept, batch,phone,gender,imgPath FROM STUDENT";
$result = $conn->query($sql);

// Step 4: Fetch data
if ($result->num_rows > 0) {
   echo "<table border='1' cellpadding='10' style='border-collapse: collapse; text-align: left;'>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Roll Number</th>
    <th>Email</th>
    <th>Department</th>
    <th>Batch</th>
    <th>Phone No:</th>
    <th>Gender</th>
    <th>Profile Picture</th>
</tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['std_ID'] . "</td>";
    echo "<td>" . $row['std_name'] . "</td>";
    echo "<td>" . $row['rollNo'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['dept'] . "</td>";
    echo "<td>" . $row['batch'] . "</td>";
    echo "<td>" . $row['phone'] . "</td>";
    echo "<td>" . $row['gender'] . "</td>";
echo "<td><img src='" . $row['imgPath'] . "' width='80' alt='Profile'></td>";

    echo "</tr>";
}

echo "</table>";
} else {
    echo "No results found.";
}

// Step 5: Close connection
$conn->close();
?>
