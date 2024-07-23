<?php
$servername = 'localhost';


$username = 'root';
$password = '';


$dbname = 'csv_db 5';


$connection = mysqli_connect($servername, $username, $password, $dbname);


if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>Webpage Design</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="main">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">Conference Inc.</h2>
            </div>

            <div class="menu">
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="easy.php">EASY</a></li>
                    <li><a href="medium.php">MEDIUM</a></li>
                    <li><a href="hard.php">HARD</a></li>
                    <li><a href="conferences.php">CONFERENCES</a></li>
                </ul>
            </div>
        </div>
        
        <div class="content">
            <div class="form">
                <div class="para-wrapper">
                    <p class="para">1. Retrieve the names of all attendees from the Registration table:</p>
                    <form method="post" action="">
                        <input type="submit" name="query1" class="show" value="Show Record">
                    </form>
                    <?php
              

                    if (isset($_POST['query1'])) {
                       
                       
                        $query1 = "SELECT CONCAT_WS(' ', Firstname, Lastname) AS FullName FROM reg_table";
                        $result1 = mysqli_query($connection, $query1);

                     
                        while ($row = mysqli_fetch_assoc($result1)) {
                            echo $row['FullName'] . "<br>";
                        }
                    }
                    ?>
                </div>
          
                <div class="para-wrapper">
                    <p class="para">2. Retrieve the session codes and Session names from the Session table</p>
                    <form method="post" action="">
                        <input type="submit" name="query2" class="show" value="Show Record">
                    </form>
                    <?php
        

                    if (isset($_POST['query2'])) {
                       
                        $query2 = "SELECT SessCode, SessName FROM sessions";
                        $result2 = mysqli_query($connection, $query2);

                      
                        while ($row = mysqli_fetch_assoc($result2)) {
                            echo $row['SessCode'] . " - " . $row['SessName'] . "<br>";
                        }
                    }
                    ?>
                </div>

                <div class="para-wrapper">
                    <p class="para">3. Retrieve the registration numbers, attendee name and payment methods from the "Registration" table.</p>
                    <form method="post" action="">
                        <input type="submit" name="query3" class="show" value="Show Record">
                    </form>
                    <?php
                    // PHP code to handle the third query using PHPMyAdmin
                    if (isset($_POST['query3'])) {
                        // Replace 'your_database_name' with the actual name of your database
                        // Replace 'Registration' with the actual name of your table
                        $query3 = "SELECT reg_id, CONCAT_WS(' ', Firstname, Lastname) AS FullName, payment FROM reg_table";
                        $result3 = mysqli_query($connection, $query3);

                        // Display the results
                        echo '<div class="answer">';
                        while ($row = mysqli_fetch_assoc($result3)) {
                            echo $row['reg_id'] . " - " . $row['FullName'] . " - " . $row['payment'] . "<br>";
                        }
                        echo '</div>';
                    }
                    ?>
                </div>

                <div class="para-wrapper">
                    <p class="para">4. Retrieve the conference name and conference location</p>
                    <form method="post" action="">
                        <input type="submit" name="query4" class="show" value="Show Record">
                    </form>
                    <?php
                    // PHP code to handle the fourth query using PHPMyAdmin
                    if (isset($_POST['query4'])) {
                        // Replace 'your_database_name' with the actual name of your database
                        // Replace 'Conference' with the actual name of your table
                        $query4 = "SELECT Confname, ConfLoc FROM conftable";
                        $result4 = mysqli_query($connection, $query4);

                        // Display the results
                        echo '<div class="answer">';
                        while ($row = mysqli_fetch_assoc($result4)) {
                            echo $row['Confname'] . " - " . $row['ConfLoc'] . "<br>";
                        }
                        echo '</div>';
                    }
                    ?>
                </div>

                <div class="para-wrapper">
                    <p class="para">5.  Retrieve the session names and speaker names from the "Session" table</p>
                    <form method="post" action="">
                        <input type="submit" name="query5" class="show" value="Show Record">
                    </form>
                    <?php
                    // PHP code to handle the fifth query using PHPMyAdmin
                    if (isset($_POST['query5'])) {
                        // Replace 'your_database_name' with the actual name of your database
                        // Replace 'Session' with the actual name of your table
                        $query5 = "SELECT Sessname, SpeakerName FROM sessions";
                        $result5 = mysqli_query($connection, $query5);

                        // Display the results
                        echo '<div class="answer">';
                        while ($row = mysqli_fetch_assoc($result5)) {
                            echo $row['Sessname'] . " - " . $row['SpeakerName'] . "<br>";
                        }
                        echo '</div>';
                    }
                    ?>
                </div>

     

            </div>
        </div>
    </div>

    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>
</html>
