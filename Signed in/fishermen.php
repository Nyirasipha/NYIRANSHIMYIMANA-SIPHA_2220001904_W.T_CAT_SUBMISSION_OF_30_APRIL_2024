
<html>
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>fishermen</title>
</head>



<body>
    <h1>fishermen Form</h1>
    <form method="post" action="">
        <label for="fishermenid">fishermen Id:</label>
        <input type="number" id="fishermenid" name="fishermenid" readonly><br>

        <label for="fname">Username</label>
        <input type="text" id="fname" name="fname" required><br><br>

        <label for="lname">Address info:</label>
        <input type="text" id="lname" name="lname" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="phone">Contact Info:</label>
        <input type="text" id="phone" name="phone"><br><br>
        <input type="submit" name="add" value="Insert"><br><br>

        <a href="./home.html">Go Back to Home</a>
    </form>
   
    </table>
</body>
</html>
<?php
    // Connection details
    $connection = new mysqli("localhost","root","","fishingmanagement");
    if($connection ->connect_error){
        die("Connect failed: ".$connection -> connect_error);
    }
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $id = $_POST['fishermenid'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $sql = "INSERT INTO fishermen(username, addressinfo, contact_details, password) VALUES('$fname','$lname','$email','$phone')";
            if($connection->query($sql)==TRUE){
                echo "Registration successful";
            } else {
                echo "Error: ".$sql."<br>".$connection->error;
            }
    }
  $connection->close();
?>


