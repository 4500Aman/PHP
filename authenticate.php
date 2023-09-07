
<?php
session_start();

$validUsername = 'aman123';
$validPassword = 'adminphp';

$username = $_POST['username'];
$password = $_POST['password'];

if ($username === $validUsername && $password === $validPassword) {
  
    $_SESSION['authenticated'] = true;
    header('Location: fourth.php'); 
} else {
    echo 'Invalid credentials. Please try again.';
}
?>



<?php
session_start();

if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
 
    header('Location: first.php');
    exit();
}
?>
<?php
session_start();

if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
 
    header('Location: second.php');
    exit();
}
?>

<?php
session_start();

if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
 
    header('Location: third.php');
    exit();
}
?>
<?php
session_start();

if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
 
    header('Location: fifth.php');
    exit();
}
?>
<?php
session_start();

if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
 
    header('Location: sixth.php');
    exit();
}
?>