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
                    <p class="para">1. Retrieve the attendee names and registration dates for registrations made using the credit card payment method</p>
                    <form method="post" action="">
                        <input type="submit" name="query1" class="show" value="Show Record">
                    </form>
                    <?php
                        // PHP code to handle the first query using PHPMyAdmin
                        if (isset($_POST['query1'])) {
                        // Replace 'reg_table' with the actual name of your table
                        $query1 = "SELECT CONCAT_WS(' ', Firstname, Lastname) as FullName, reg_date, payment FROM reg_table WHERE payment = 'Credit Card'";
                        $result1 = mysqli_query($connection, $query1);

                        // Display the results
                        echo '<div class="answer">';
                        while ($row = mysqli_fetch_assoc($result1)) {
                            echo $row['FullName'] . " - " . $row['reg_date'] . " - " . $row['payment'] . "<br>";
                        }
                        echo '</div>';
                    }
                    ?>

                </div>

                <div class="para-wrapper">
                    <p class="para">2. Retrieve the conference names and locations for conferences that have a fee greater than 500</p>
                    <form method="post" action="">
                        <input type="submit" name="query2" class="show" value="Show Record">
                    </form>
                    <?php
                        // PHP code to handle the query using PHPMyAdmin
                        if (isset($_POST['query2'])) {
                            // Replace 'conftable' with the actual name of your table
                            $query2 = "SELECT ConfName, ConfLoc FROM conftable WHERE ConfFee > 500";
                            $result2 = mysqli_query($connection, $query2);

                            // Display the results
                            echo '<div class="answer">';
                            while ($row = mysqli_fetch_assoc($result2)) {
                                echo $row['ConfName'] . " - " . $row['ConfLoc'] . "<br>";
                            }
                            echo '</div>';
                        }
                    ?>
                </div>

                
                <div class="para-wrapper">
                    <p class="para">3. Retrieve the session names and speaker names for sessions taking place on a on the month of August:</p>
                    <form method="post" action="">
                        <input type="submit" name="query3" class="show" value="Show Record">
                    </form>
                    <?php
                    // PHP code to handle the query using PHPMyAdmin
                    if (isset($_POST['query3'])) {
                        // Replace 'sessions' with the actual name of your table
                        $query3 = "SELECT Sessname, SpeakerName FROM sessions WHERE MONTH(SessDate) = 8";
                        $result3 = mysqli_query($connection, $query3);

                        // Display the results
                        echo '<div class="answer">';
                        while ($row = mysqli_fetch_assoc($result3)) {
                            echo $row['Sessname'] . " - " . $row['SpeakerName'] . "<br>";
                        }
                        echo '</div>';
                    }
                    ?>

                </div>

                
                <div class="para-wrapper">
                    <p class="para">4. Retrieve the registration numbers and addresses for registrations with a zip code starting with 1:</p>
                    <form method="post" action="">
                        <input type="submit" name="query4" class="show" value="Show Record">
                    </form>
                    <?php
                        // PHP code to handle the query using PHPMyAdmin
                        if (isset($_POST['query4'])) {
                            // Replace 'reg_table' with the actual name of your table
                            $query4 = "SELECT reg_id, address FROM reg_table WHERE Zipcode LIKE '1%'";
                            $result4 = mysqli_query($connection, $query4);

                            // Display the results
                            echo '<div class="answer">';
                            while ($row = mysqli_fetch_assoc($result4)) {
                                echo $row['reg_id'] . " - " . $row['address'] . "<br>";
                            }
                            echo '</div>';
                        }
                    ?>

                </div>

                
                <div class="para-wrapper">
                    <p class="para">5. Count how many attendees have the same payment method, display the registration number and attendee name</p>
                    <form method="post" action="">
                        <input type="submit" name="query5" class="show" value="Show Record">
                    </form>
                    <?php
                        // PHP code to handle the query using PHPMyAdmin
                        if (isset($_POST['query5'])) {
                            // Replace 'reg_table' with the actual name of your table
                            $query5 = "SELECT payment, COUNT(*) AS SamePaymentMethod FROM reg_table GROUP BY payment";
                            $result5 = mysqli_query($connection, $query5);

                            // Display the results
                            echo '<div class="answer">';
                            while ($row = mysqli_fetch_assoc($result5)) {
                                echo $row['payment'] . " - " . $row['SamePaymentMethod'] . "<br>";
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
