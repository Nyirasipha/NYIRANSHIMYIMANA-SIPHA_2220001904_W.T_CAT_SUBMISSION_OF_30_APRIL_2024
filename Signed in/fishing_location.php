<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>fishing_location</title>
</head>
<body>
    <h1>fishing_location Form</h1>
    <form method="post" action=fishing_location.php">
        <label for="locationid">location Id:</label>
        <input type="number" id="locationid" name="locationid" required><br><br>

        <label for="name"> Name</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="cordinates">cordnates</label>
        <input type="text" id="cordinates" name="cordinates" required><br><br>

        <label for="watertype">watertype:</label>
        <input type="watertype" id="watertype" name="watertype" required><br><br>

        <input type="submit" name="add" value="Insert"><br><br>

        <a href="./home.html">Go Back to Home</a>
    </form>
 <?php
    // Connection details
    $host = "localhost";
    $user = "root";
    $pass = "";
    $database = "fishingmanagement";

    // Creating connection
    $connection = new mysqli($host, $user, $pass, $database);

    // Check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Check if the form is submitted for insert
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {
        // Insert section
        $stmt = $connection->prepare("INSERT INTO fishing_location (locationid, name, cordinates, watertype,) VALUES (?, ?, ?, ?, )");
        $stmt->bind_param("ssss", $name, $cordinates, $watertype,);

        // Set parameters from POST and execute
        $locationid = $_POST['locationid'];
        $name = $_POST['name'];
        $ecordinates = $_POST['cordinates'];
        $watertype = $_POST['watertype'];

        if ($stmt->execute()) {
            echo "New record has been added successfully.<br><br>
                  <a href='fishing_location.html'>Back to Form</a>";
        } else {
            echo "Error inserting data: " . $stmt->error;
        }

        $stmt->close();
    }

    // SQL query to fetch data from the fishing_locations table
    $sql = "SELECT * FROM fishing_locations";
    $result = $connection->query($sql);

    echo "<h2>Table of fishing_location</h2>";
    echo "<table>
            <tr>
                <th>locationid</th>
                <th>name</th>
                <th>cordinates</th>
                <th>watertype</th>
                <th>Delete</th>
                <th>Update</th>
            </tr>";

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $locationid = $row["locationid"];
            echo "<tr>
                    <td>" . $row["locationid"] . "</td>
                    <td>" . $row["name"] . "</td>
                    <td>" . $row["cordinates"] . "</td>
                    <td>" . $row["watertype"] . "</td>
                    <td><a style='padding:4px' href='delete fishing_location.php?locationid=$locationid'>Delete</a></td>
                    <td><a style='padding:4px' href='update fishing_location.php?locationid=$flocationid'>Update</a></td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='7'>No data found</td></tr>";
    }

    echo "</table>";

    // Close connection
    $connection->close();
?>
s


