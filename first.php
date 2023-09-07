<!DOCTYPE html>
<html>
<head>
    <title>Name Form</title>
</head>
<body>
    <?php    
        $firstName = '';
        $lastName = '';
        $fullName = '';

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $fullName = $firstName . ' ' . $lastName;
        }
    ?>
    <form id="nameForm" action="#" method="post">
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" pattern="[A-Za-z]+" required value="<?php echo $firstName; ?>">
        <br><br>
        
        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" pattern="[A-Za-z]+" required value="<?php echo $lastName; ?>"><br>
        <br>
         
        <label for="fullName">Full Name:</label>
        <input type="text" id="fullName" name="fullName" readonly disabled value="<?php echo htmlspecialchars($fullName); ?>"><br>
        <br>
        <input type="submit" value="Submit">
    </form>
    <div id="message">
        <?php
            if ($fullName !== '') {
                echo 'Hello ' . htmlspecialchars($fullName);
            }
            
        ?>
    </div>
    
    <a href="second.php"> Task 2 </a><br>
    <a href="third.php"> Task 3 </a><br>
    
    <a href="fourth.php"> Task 4 </a><br>

    <a href="fifth.php"> Task 5 </a><br>
    
    <a href="sixth.php"> Task 6 </a><br>
</body>
</html>
 