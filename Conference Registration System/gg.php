<?php

function displayResult($result) {
  if ($result->num_rows > 0) {
    echo '<table>';
    // Build table header with column names
    $fieldInfo = $result->fetch_fields();
    echo '<tr>';
    foreach ($fieldInfo as $field) {
      echo '<th>' . $field->name . '</th>';
    }
    echo '</tr>';

    // Fill table rows with data
    while ($row = $result->fetch_assoc()) {
      echo '<tr>';
      foreach ($row as $value) {
        echo '<td>' . $value . '</td>';
      }
      echo '</tr>';
    }
    echo '</table>';
  } else {
    echo 'No data found.';
  }
}

// Connect to the database
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'csv_db 5';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check which query button was clicked and execute the corresponding SQL query
if (isset($_POST['query1'])) {
  $sqlQuery = "SELECT CONCAT_WS(' ', Firstname, Lastname) AS FullName FROM reg_table";
  $result = $conn->query($sqlQuery);
  displayResult($result);
} elseif (isset($_POST['query2'])) {
  $sqlQuery = "SELECT SessCode, SessName FROM sessions";
  $result = $conn->query($sqlQuery);
  displayResult($result);
} elseif (isset($_POST['query3'])) {
  $sqlQuery = "SELECT reg_id, CONCAT_WS(' ', Firstname, Lastname) AS FullName, payment FROM reg_table";
  $result = $conn->query($sqlQuery);
  displayResult($result);
} elseif (isset($_POST['query4'])) {
  $sqlQuery = "SELECT Confname, ConfLoc FROM conftable";
  $result = $conn->query($sqlQuery);
  displayResult($result);
} elseif (isset($_POST['query5'])) {
  $sqlQuery = "SELECT Sessname, SpeakerName FROM sessions";
  $result = $conn->query($sqlQuery);
  displayResult($result);
}

$conn->close();
?>