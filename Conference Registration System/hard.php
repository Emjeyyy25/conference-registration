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
                <!-- Query 1: List all conferences with the total number of registrations per conference -->
                <div class="para-wrapper">
                    <p class="para">1. List all conferences along with the total number of registrations per conference, sorted by the number of registrations in descending order, but exclude conferences with less than 5 registrations.</p>
                    <form method="post" action="">
                        <input type="submit" name="query1" class="show" value="Show Record">
                    </form>
                    <?php
                    if (isset($_POST['query1'])) {
                        // Replace 'reg_table' and 'conftable' with the actual names of your tables
                        $query1 = "SELECT ConfName, COUNT(*) as registrations
                                FROM reg_table R, conftable C
                                WHERE R.confId = C.confId
                                GROUP BY ConfName
                                HAVING COUNT(*) > 5
                                ORDER BY registrations DESC";
                        $result1 = mysqli_query($connection, $query1);

                        // Check for errors during query execution
                        if (!$result1) {
                            die("Query failed: " . mysqli_error($connection));
                        }

                        // Display the results
                        echo '<div class="answer">';
                        while ($row = mysqli_fetch_assoc($result1)) {
                            echo $row['ConfName'] . " - Registrations: " . $row['registrations'] . "<br>";
                        }
                        echo '</div>';
                        
                        if (isset($_POST['query1'])) {
                            // Debugging message
                            echo "Query 1 block executed.";

                            // Rest of the code
                            // ...
                        }
                    }
                    ?>
                </div>

                <!-- Query 2: Retrieve information about conference names and the number of sessions in each conference -->
                <div class="para-wrapper">
                    <p class="para">2. Retrieve the information about conference name and count how many sessions in each conference, then sorts the results by the conference name</p>
                    <form method="post" action="">
                        <input type="submit" name="query2" class="show" value="Show Record">
                    </form>
                    <?php
                    // PHP code to handle Query 2
                    if (isset($_POST['query2'])) {
                        // Replace 'conftable' and 'Sessions' with the actual names of your tables
                        $query2 = "SELECT Confname, COUNT(*) AS session_count
                                FROM conftable C, Sessions S
                                WHERE C.confID = S.confID
                                GROUP BY ConfName
                                ORDER BY ConfName";
                        $result2 = mysqli_query($connection, $query2);

                        // Check for errors during query execution
                        if (!$result2) {
                            die("Query failed: " . mysqli_error($connection));
                        }

                        // Display the results
                        echo '<div class="answer">';
                        while ($row = mysqli_fetch_assoc($result2)) {
                            echo $row['Confname'] . " - Number of Sessions: " . $row['session_count'] . "<br>";
                        }
                        echo '</div>';
                    }
                    ?>
                </div>

                <!-- Query 3: Count registrations in each conference for sessions with duration longer than 2 hours -->
                <div class="para-wrapper">
                    <p class="para">3. Count how many registrations in each conference for sessions that have a duration longer than 2 hours.</p>
                    <form method="post" action="">
                        <input type="submit" name="query3" class="show" value="Show Record">
                    </form>
                    <?php
                    // PHP code to handle Query 3
                    if (isset($_POST['query3'])) {
                        // Replace 'reg_table', 'conftable', and 'Sessions' with the actual names of your tables
                        $query3 = "SELECT sessname, COUNT(*) as NumberOfRegistrations
                                FROM reg_table R, conftable C, Sessions S
                                WHERE ((R.confId = C.confID) AND (C.confID = S.confID)) AND (TIME_TO_SEC(timediff(Endtime, StartTime)) > 7200)
                                GROUP BY sessname";
                        $result3 = mysqli_query($connection, $query3);

                        // Display the results
                        echo '<div class="answer">';
                        while ($row = mysqli_fetch_assoc($result3)) {
                            echo $row['sessname'] . " - Number of Registrations: " . $row['NumberOfRegistrations'] . "<br>";
                        }
                        echo '</div>';
                    }
                    ?>
                </div>

                <!-- Query 4: Display session name and total number of unique attendees registered in August and September -->
                <div class="para-wrapper">
                    <p class="para">4. Display the session name, along with the total number of unique attendees who have registered for sessions in the month of August and September.</p>
                    <form method="post" action="">
                        <input type="submit" name="query4" class="show" value="Show Record">
                    </form>
                    <?php
                    // PHP code to handle Query 4
                    if (isset($_POST['query4'])) {
                        // Replace 'reg_table', 'conftable', and 'Sessions' with the actual names of your tables
                        $query4 = "SELECT sessname, COUNT(DISTINCT R.reg_id) AS attendees
                                FROM reg_table R, conftable C, Sessions S
                                WHERE ((R.confId = C.confID) AND (C.ConfId = S.ConfId)) AND MONTH(S.Sessdate) IN (8, 9)
                                GROUP BY SessName";
                        $result4 = mysqli_query($connection, $query4);

                        // Check for errors during query execution
                        if (!$result4) {
                            die("Query failed: " . mysqli_error($connection));
                        }

                        // Display the results
                        echo '<div class="answer">';
                        while ($row = mysqli_fetch_assoc($result4)) {
                            echo $row['sessname'] . " - Number of Unique Attendees: " . $row['attendees'] . "<br>";
                        }
                        echo '</div>';
                    }
                    ?>
                </div>

                <!-- Query 5: Count attendees who live in Quezon City for each conference -->
                <div class="para-wrapper">
                    <p class="para">5. Count the attendees who have registered in each conferences who live in Quezon City. Display the conference name.</p>
                    <form method="post" action="">
                        <input type="submit" name="query5" class="show" value="Show Record">
                    </form>
                    <?php
                    // PHP code to handle Query 5
                    if (isset($_POST['query5'])) {
                        // Replace 'reg_table' and 'conftable' with the actual names of your tables
                        $query5 = "SELECT ConfName, COUNT(*) as AttendeesLivesInQC
                                FROM reg_table AS R, conftable C
                                WHERE R.confId = C.confID AND city = 'Quezon City'
                                GROUP BY ConfName";
                        $result5 = mysqli_query($connection, $query5);

                        // Check for errors during query execution
                        if (!$result5) {
                            die("Query failed: " . mysqli_error($connection));
                        }

                        // Display the results
                        echo '<div class="answer">';
                        while ($row = mysqli_fetch_assoc($result5)) {
                            echo $row['ConfName'] . " - Number of Attendees Living in Quezon City: " . $row['AttendeesLivesInQC'] . "<br>";
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
