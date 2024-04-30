 <?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

// Connect to database (replace dbname, username, password with actual credentials)
$connection = new mysqli("localhost", "root", "", "fishingmanagement");

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$user_id = $_SESSION['user_id'];

// Retrieve user's email from the database
$sql = "SELECT lastname FROM user WHERE id='$user_id'";
$result = $connection->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $email = $row['lastname'];
} else {
    $email = "Unknown";
}

$connection->close();
?>
<html>
    <header>
        <title>FISHING MANAGENT PROJECT</title>
        <style>
            #ribbon li{
                text-decoration: none;
                float: left;
                display: inline-block;
                margin-left: 5%;
                margin-top: 20px;
                font-size: 30px;
            }
            #ribbon li a{
                text-decoration: none;
                color: black;
                font-family: Georgia, 'Times New Roman', Times, serif;
            }
            footer #foot{
                color: white;
                text-align: center;
                padding-top: 70px;
            } 
            footer{
                margin-top: 50px;
                height: 100px;
                background-color: black
            }
            #picture{
                text-align: center;
                padding-top: 100px;
            }
            #paragraphing{
                margin-left: 50px;
            }
            #scroll{
                margin-top: 50px;;
                padding-top: 10px;
                background-color: black;color: white;height: 50px;font-size: 30px;border-radius: 100px;
                text-align: center;
            } 
            #scroll a{
                text-decoration: none;
                color: white;
            }
            .Block{
                float: left;
                display: inline-block;
            }
            #Block1{
                width: 70%;
            }
            #Block2{
                width: 30%;
            }
            #Block1 ol li{
                text-decoration: none;
                float: left;
                display: inline-block;
                margin-left: 5%;
                margin-top: 20px;
                font-size: 30px;
            }
            #Block2 ol li{
                text-decoration: none;
                float: left;
                display: inline-block;
                margin-left: 5%;
                margin-top: 20px;
                font-size: 30px;
            }
            #Block1 ol li a{
                text-decoration: none;
                color: black;
                font-family: Georgia, 'Times New Roman', Times, serif;
            }
            #Block2 ol li a{
                text-decoration: none;
                color: black;
                font-family: Georgia, 'Times New Roman', Times, serif;
            }
            #username{
                color: blue;
            }
        </style>
    </header>
    <body>
       <!--Home Ribbon on the website of the system-->
       <div class="Block" id="Block1">
            <ol id="ribbon1">
                <li><a href=".\fishermen.php">fishermen</a></li>
                <li><a href=".\fishing_location.php">fishing_location</a></li>
                <li><a href=".\catches.html">catches</a></li>
                <li><a href=".\permit.html">permit</a></li>
            </ol>
        </div>
        <div class="Block" id="Block2">
            <ol>
                <li><?php echo $email; ?></li>
                <li><a href=".\logout.php">Logout</a></li>
            </ol>
        </div>
        <div id="paragraphing">
            <h1 style="padding-top: 200px;">FISHING MANAGEMENT PROJECT</h1>
            <p>Fishing is an essential activity that sustains livelihoods, cultures, and ecosystems worldwide. However, the increasing pressures of overfishing, habitat degradation, and climate change have raised concerns about the long-term sustainability of global fish stocks. Effective management strategies are crucial to ensuring the health and productivity of fisheries, safeguarding marine biodiversity, and supporting the communities reliant on them.

This project aims to address these challenges by developing comprehensive fishing management strategies tailored to specific regions or fisheries. By integrating scientific research, stakeholder engagement, and innovative technologies, we seek to promote sustainable fishing practices that balance economic, social, and environmental objectives. Through collaboration with government agencies, local communities, and industry stakeholders, we aim to implement evidence-based solutions that enhance the resilience and adaptive capacity of fisheries in the face of changing environmental conditions.
            </p>
            <h1>Key objectives of this project include:</h1>
            <p>
                <ol>
                    <li>Assessing the status of target fish stocks and identifying key threats to their sustainability.</li>
                    <li>Engaging with local fishing communities and indigenous peoples to incorporate traditional knowledge and perspectives into management plans.</li>
                    <li>Implementing ecosystem-based management approaches that consider the interconnectedness of marine ecosystems and human activities.</li>
                    <li>Utilizing cutting-edge technologies such as satellite monitoring, acoustic tagging, and data analytics to improve fisheries monitoring, control, and surveillance.</li>
                </ol>
            </p>
            
        </div>
        <div id="scroll"><a href="#">Scroll Up</a></div>
    </body>
    <footer>
        <div id="foot">Copyright © 2024 FMP All Right Reserved</div>
    </footer>
</html>