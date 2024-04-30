<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>catches</title>
</head>
<body>
    <h1>catches Form</h1>
    <form method="post" action="catches.php">
        <label for="catchesid">catches Id:</label>
        <input type="number" id="catchesid" name="catchesid" required><br><br>

        <label for="fishermenid">Fishermenid:</label>
        <input type="number" id="fishermenid" name="fishermenid" required><br><br>

        <label for="locationid">locationid:</label>
        <input type="number" id="locationid" name="locationid" required><br><br>

        <label for="spaces">spaces:</label>
        <input type="spaces" id="spaces" name="spaces" required><br><br>

        <label for="quantity">quantity:</label>
        <input type="text" id="quantity" name="quantity" required><br><br>

        <label for="date_time">date_time:</label>
     <input type="date"id="date_time" name="date_time"req uired><br><br>
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
        $stmt = $connection->prepare("INSERT INTO catches (catchesid, fishermenid,locationid, spaces, quantity, date_time) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $FirstName, $fishermenid, $locationid, $spaces, $quantity);

        // Set parameters from POST and execute
        $catchesid= $_POST['catchesid'];
        $fishermenid = $_POST['fishermenid'];
        $locationid = $_POST['elocationid'];
        $spaces = $_POST['spaces'];
        $quantity = $_POST['quantity'];
        $date_time= $_POST['date_time'];
        if ($stmt->execute()) {
            echo "New record has been added successfully.<br><br>
                  <a href='catches.html'>Back to Form</a>";
        } else {
            echo "Error inserting data: " . $stmt->error;
        }

        $stmt->close();
    }

    // SQL query to fetch data from the catches table
    $sql = "SELECT * FROM catches";
    $result = $connection->query($sql);

    echo "<h2>Table of catches</h2>";
    echo "<table>
            <tr>
                <th>fishermenID</th>
                <th>catchesid</th>
                <th>Lfishermenid</th>
                <th>locationid</th>
                <th>spaces</th>
                <th>quantity</th>
                <th>date_time</th>
                <th>Delete</th>
                <th>Update</th>
            </tr>";

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $catchesid = $row["catchesid"];
            echo "<tr>
                    <td>" . $row["fishermenID"] . "</td>
                    <td>" . $row["catchesid"] . "</td>
                    <td>" . $row["fishermenid"] . "</td>
                    <td>" . $row["locationid"] . "</td>
                    <td>" . $row["spaces"] . "</td>
                    <td>" . $row["quantity"] . "</td>
                    <td>" . $row["date_time"] .</td>
                    <td><a style='padding:4px' href='delete catches.php?catchesid=$catchesid'>Delete</a></td>
                    <td><a style='padding:4px' href='update catches.php?catchesid=$catchesid'>Update</a></td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='7'>No data found</td></tr>";
    }

    echo "</table>";

    // Close connection
    $connection->close();
?>



