<?php
    include("header.php");
    
    if (isset($_SESSION['username'])) {
?>

<div class='container'>
    <div class="row">
        <div class="col-12 col-lg-6 offset-lg-3">
            <h1>Hello <?php echo $_SESSION['username'] ?></h1>
        </div>
    </div>
</div>

<?php
} else {
?>

<a href="login.php">Please log in to see this page</a>

<?php
}

// remove all session variables
session_unset();

// destroy the session
session_destroy();
?>