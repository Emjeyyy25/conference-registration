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

            <form action="connect.php" method="post">
                <div class="form1">
                    <div class="image-holder">
                      <img src="logo.png">
                    </div>
                    <div class="input-group">
                      <div class="form-field">
                        <label for="FirstName">First Name:</label>
                        <input type="text" id="FirstName" name="FirstName" placeholder="Enter First Name Here" required>
                      </div>
                      <div class="form-field">
                        <label for="LastName">Last Name:</label>
                        <input type="text" id="LastName" name="LastName" placeholder="Enter Last Name Here" required>
                      </div>
                      <div class="form-field">
                        <label for="Address">Address:</label>
                        <input type="text" id="Address" name="Address" placeholder="Enter Address Here" required>
                      </div>
                      <div class="form-field">
                        <label for="City">City:</label>
                        <input type="text" id="City" name="City" placeholder="Enter City Here" required>
                      </div>
                      <div class="form-field">
                        <label for="ZipCode">Zip Code:</label>
                        <input type="text" id="ZipCode" name="ZipCode" placeholder="Enter Zip code Here" required>
                      </div>
                      <div class="form-field">
                        <label for="Contact">Contact No.:</label>
                        <input type="text" id="Contact" name="Contact" placeholder="Enter Contact No. Here" required>
                      </div>
                       <div class="form-field">
                        <label for="Payment">Choose Payment method:</label>
                        <select id="Payment" name="Payment">
                          <option value="Credit Card">Credit Card</option>
                          <option value="Paypal">Paypal</option>
                          <option value="Bank Transfer">Bank Transfer</option>
                        </select>
                      </div>
                      <div class="form-field">
                        <label for="ConfId">Choose Available Conferences:</label>
                        <select id="ConfId" name="ConfId">
                          <option value="1">Conference 1</option>
                          <option value="2">Conference 2</option>
                          <option value="3">Conference 3</option>
                          <option value="4">Conference 4</option>
                          <option value="5">Conference 5</option>
                        </select>
                      </div>
                      <button class="btnn" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>
</html>
