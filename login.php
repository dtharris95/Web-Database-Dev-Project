<?php
include("header.php");
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$username = $password = "";
$formErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = clean_input($_POST["username"]);
    $password = clean_input($_POST["password"]);
}

try {
    $conn = new PDO("mysql:host=$servername;dbname=finalProject", $dbusername, $dbpassword);

    if(!empty($username) && !empty($password)) {
    $formErr = validateUser($conn, $username, $password);
}

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

function validateUser($conn, $username, $password) {
    $select = "SELECT * FROM users WHERE username=:username";
    $stmt = $conn->prepare($select);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $allMatchingUsers = $stmt->fetchAll();
    if (!empty($allMatchingUsers)) {
        foreach($allMatchingUsers as $listRow) {
            $hashedPassword = $listRow['password'];

            if (password_verify($password, $hashedPassword)) {
                session_start();
                $_SESSION['username'] = $username;
                header("Location: loggedIn.php");            
            } else {
                return "Incorrect password";
            }
        }
    } else {
        return "No user exists with the username $username";
    }
}

// function login($username) {
//    session_start();
//    $_SESSION['username'] = $username;
//    header("Location: loggedIn.php");
// }

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
                    <span class="error">*</span><br>
                    <input type="text" class="form-control" name="username" id="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <span class="error">*</span><br>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
                <input type="submit" class="btn btn-primary" value="Submit">
                    <span class="error">* <?php echo $formErr;?></span><br>
            </form>
        </div>
    </div>
</div>