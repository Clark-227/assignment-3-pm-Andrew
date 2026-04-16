<?php
// login.php
$pageTitle = 'Login';
require 'inc/header.inc.php';
require_once 'inc/db_connect.inc.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // form submitted ?? get data
    $email = $_POST['email'];
    $password = hash('sha512', $_POST['password']); // using ALGO. SHA-512

    // query the database
    $sql = "SELECT * FROM user WHERE email=:email AND password=:password LIMIT 1";

    $stmt = $db->prepare($sql); 
    $stmt->execute(["email" => $email, "password" => $password]); // sending credentials 

    // match found start session
    if ($stmt->rowCount() == 1) { // checking to see if in the database there is a match
        $row = $stmt->fetch();
        session_start();
        $_SESSION["is_logged_in"] = 1;
        $_SESSION["first_name"] = $row->first_name;
        header("Location: home.php");
    } else {
        echo "Invalid user credentials";
    }
}

?>

<form action="login.php" method="POST">
    <label for="email">Email</label>
    <br><br>
    <input type="email" name="email" id="email" required>
    <br><br>
    <label for="password">Password</label>
    <span id="showPassword" onclick="showPassword();">Show Password</span>
    <br><br>
    <input type="password" name="password" id="password" required>
    <br><br>
    <input type="submit" value="Login">
</form>

<script src="js/script.js"></script>

<?php require 'inc/footer.inc.php'; ?>