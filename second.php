<!DOCTYPE html>
<html>
<head>
    <title>Name and Image Form</title>
</head>
<body><?php    
    $firstName = '';
    $lastName = '';
    $fullName = '';
    $userImage = '';

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $fullName = $firstName . ' ' . $lastName;

    
        $uploadDir = __DIR__ . '/uploads/';
        $userImage = $_FILES['userImage']['name'];

        
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $uploadPath = $uploadDir . $userImage;

        if (move_uploaded_file($_FILES['userImage']['tmp_name'], $uploadPath)) {
    
        } else {
        
            echo "Upload failed!";
        }
    }
?>

    <form id="nameAndImageForm" action="#" method="post" enctype="multipart/form-data">
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" pattern="[A-Za-z]+" required value="<?php echo $firstName; ?>">
        <br><br>
        
        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" pattern="[A-Za-z]+" required value="<?php echo $lastName; ?>"><br>
        <br>
         
        <label for="userImage">User Image:</label>
        <input type="file" id="userImage" name="userImage" accept="image/*" required><br>
        <br>
        
        <label for="fullName">Full Name:</label>
        <input type="text" id="fullName" name="fullName" readonly disabled value="<?php echo htmlspecialchars($fullName); ?>"><br>
        <br>
        <input type="submit" value="Submit"><br>
    </form>
    <div id="message">
        <?php
            if ($fullName !== '') {
                echo 'Hello ' . htmlspecialchars($fullName) . '<br>';
                echo '<img src="uploads/' . $userImage . '" alt="User Image">';
            }
            
        ?>
    </div>
  
    <a href="first.php"> Task 1 </a><br>
    <a href="third.php"> Task 3 </a><br>

    <a href="fourth.php"> Task 4 </a><br>
    <a href="fifth.php"> Task 5 </a><br>
    
    <a href="sixth.php"> Task 6 </a><br>
