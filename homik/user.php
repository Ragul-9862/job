<head>
    <link rel="shortcut icon" href="./images/favicon.ico" />
    <link rel="shortcut icon" href="./images/favicon.png" type="image/x-icon" />
</head>
<?php
// Start session
session_start();

// Database connection
$servername = "localhost";
$username = "root"; // Database username
$password = ""; // Database password
$dbname = "homik"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Prevent SQL injection
    $user = mysqli_real_escape_string($conn, $user);
    $pass = mysqli_real_escape_string($conn, $pass);

    // Query to fetch the user with matching credentials
    $sql = "SELECT * FROM users WHERE user_name = '$user' AND password = '$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Store username in session and redirect
        $_SESSION['username'] = $user;
        header("Location: https://www.amazon.in");
        exit(); // Ensure no further code is executed after redirect
    } else {
        echo "<script>alert('Invalid credentials. Please try again.');</script>";
    }
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<?php include('header.php') ?>





<body>

    <div class="login-wrapper container">
        <!-- Left Banner Section -->
        <div class="login-banner"></div>

        <!-- Login Form Section -->
        <div class="login-form-container">
            <h2 class="login-title">User Login</h2>
            <form class="login-form" method="POST" action="">
                <div class="form-group">
                    <label for="username" class="label-text">Username:</label>
                    <input type="text" id="username" name="username" class="input-field" required>
                </div>

                <div class="form-group">
                    <label for="password" class="label-text">Password:</label>
                    <input type="password" id="password" name="password" class="input-field" required>
                </div>

                <input type="submit" class="btn-submit btn btn-success" value="Login">
            </form>
        </div>
    </div>
</body>
<?php include('footer.php') ?>

</html>