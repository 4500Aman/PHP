<!DOCTYPE html>
<html>
<head>
    <title>Phone Number</title>
</head>
<body>
<?php    
    $firstName = '';
    $lastName = '';
    $fullName = '';
    $userImage = '';
    $marksTable = array();
    $phoneNumber = '';

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

        $SubjectNames = $_POST['SubjectName'];
        $MarksArray = $_POST['Marks'];

        foreach ($SubjectNames as $key => $subjectName) {
            $marksTable[] = array('SubjectName' => $subjectName, 'Marks' => $MarksArray[$key]);
        }

        $phoneNumber = $_POST['phoneNumber'];
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

        <label for="phoneNumber">Phone Number:</label>
        <input type="tel" id="phoneNumber" name="phoneNumber" pattern="\+91\d{10}" required value="<?php echo $phoneNumber; ?>"><br>
        
        <h3>Marksheet</h3>
        <div id="Marksheet">
            <div class="subject-marks">
                <label for="SubjectName">Subject Name:</label>
                <input type="text" name="SubjectName[]" pattern="[A-Za-z]+" required>
                <label for="Marks">Marks (0-100):</label>
                <input type="number" name="Marks[]" min="0" max="100" required>
            </div>
        </div><br>
        
        <button type="button" id="addMarks">Add Another Subject</button><br><br>

        <input type="submit" value="Submit">
        <br><br>    
    </form>
    <div id="message">
        <?php
            if ($fullName !== '') {
                echo 'Hello ' . htmlspecialchars($fullName) . '<br><br>';
                echo 'Phone Number: ' . htmlspecialchars($phoneNumber) . '<br><br>';
                echo '<img src="uploads/' . $userImage . '" alt="User Image">';
            }
            
            if (!empty($marksTable)) {
                echo '<h2>Marks Table:</h2>';
                echo '<table border="1">';
                echo '<tr><th>Subject Name</th><th>Marks</th></tr>';
                foreach ($marksTable as $row) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($row['SubjectName']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['Marks']) . '</td>';
                    echo '</tr>';
                }
                echo '</table>';
            }
        ?>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addMarksButton = document.getElementById('addMarks');
            const Marksheet = document.getElementById('Marksheet');
            
            addMarksButton.addEventListener('click', function() {
                const newSubjectMarks = document.createElement('div');
                newSubjectMarks.classList.add('subject-marks');
                
                newSubjectMarks.innerHTML = `
                    <label for="SubjectName">Subject Name:</label>
                    <input type="text" name="SubjectName[]" pattern="[A-Za-z]+" required>
                    <label for="Marks">Marks (0-100):</label>
                    <input type="number" name="Marks[]" min="0" max="100" required>
                `;
                
                Marksheet.appendChild(newSubjectMarks);
            });
        });
    </script>
    <a href="first.php"> Task 1 </a><br>
    <a href="second.php"> Task 2 </a><br>
    <a href="third.php"> Task 3 </a><br>

    <a href="fifth.php"> Task 5 </a><br>
    
    <a href="sixth.php"> Task 6 </a><br>


</body>
</html>
