<?php
include("header.php");
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$username = $password = $password1 = $password2 = "";
$usernameErr = $passwordErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = clean_input($_POST["username"]);
    $password1 = clean_input($_POST["password1"]);
    $password2 = clean_input($_POST["password2"]);

    if ($password1 !== $password2) {
        $passwordErr = "Passwords must match";
    } else {
        $password = password_hash($password1, PASSWORD_DEFAULT);
    }
}

try {
    $conn = new PDO("mysql:host=$servername;dbname=finalProject", $dbusername, $dbpassword);
    if (!empty($username)) {
        $usernameErr = validateUsername($conn, $username);
    }
    if(!empty($username) && empty($usernameErr) && empty($passwordErr)) {
    addUser($conn, $username, $password1);
}

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

function addUser($conn, $username, $password) {
    $insert = "INSERT INTO users (userName,password)
    VALUES (:username, :password)";
    $stmt = $conn->prepare($insert);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
}

function validateUsername($conn, $username) {
    $select = "SELECT * FROM users WHERE username=:username";
    $stmt = $conn->prepare($select);
    $stmt->bindParam(":username", $username);
    $stmt->execute();
    
    if (!empty($stmt->fetchAll())) {
        return "Username is already taken";
    }
}

function clean_input($data) {
    $data = trim($data); // removes whitespace
    $data = stripslashes($data); // strips slashes
    $data = htmlspecialchars($data); // replaces html chars
    return $data;
}
?>

<style>
    .error {color: #FF0000;}
</style>
<div class='userLoginForm container'>
    <div class="row">
        <div class="col-12 col-lg-6 offset-lg-3">
            <form method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="form-group">
                    <label for="username">Username</label>
                    <span class="error">* <?php echo $usernameErr;?></span><br>
                    <input type="text" class="form-control" name="username" id="username" required>
                </div>
                <div class="form-group">
                    <label for="password1">Password</label>
                    <span class="error">* <?php echo $passwordErr;?></span><br>
                    <input type="password" class="form-control" name="password1" id="password1" required>
                </div>
                <div class="form-group">
                    <label for="password2">Repeat Password</label>
                    <span class="error">* <?php echo $passwordErr;?></span><br>
                    <input type="password" class="form-control" name="password2" id="password2" required>
                </div>
                <input type="submit" class="btn btn-primary" value="Submit">
            </form>
        </div>
    </div>
</div>