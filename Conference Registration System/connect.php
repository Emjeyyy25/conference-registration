<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstName = $_POST["FirstName"];
    $lastName = $_POST["LastName"];
    $address = $_POST["Address"];
    $city = $_POST["City"];
    $zipCode = $_POST["ZipCode"];
    $contactNo = $_POST["Contact"];
    $payment = $_POST["Payment"];
    $Conference = $_POST["ConfId"];

    $reg_date = date("Y-m-d"); // Format: YYYY-MM-DD

 
    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $dbname = "csv_db 5"; 


    $conn = new mysqli($servername, $username, $password, $dbname);


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

 
    $sql = "INSERT INTO reg_table (Firstname, Lastname, Address, City, Zipcode, Contact,Payment,ConfId, reg_date)
            VALUES ('$firstName', '$lastName', '$address', '$city', '$zipCode', '$contactNo' , '$payment','$Conference', '$reg_date')";

    if ($conn->query($sql) === TRUE) {
        echo 'Query executed successfully! Redirecting back to register page...</div>';
        header("Refresh: 2; URL=register.php");

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


    $conn->close();
}
?>