<?php
// PHP code for the register_student.php page

// Connect to the database
$db = new mysqli("localhost", "username", "password", "school_system");

// Check if the form was submitted
if (isset($_POST['submit'])) {
    // Get the data from the form
    $name = $_POST['name'];
    $age = $_POST['age'];
    $grade = $_POST['grade'];

    // Insert the data into the database
    $db->query("INSERT INTO students (name, age, grade) VALUES ('$name', '$age', '$grade')");

    // Redirect to the home page
    header("Location: index.php");
}
?>

<!-- HTML code for the register student form -->
<h1>Register Student</h1>
<form method="post" action="register_student.php">
    <label>Name:</label><input type="text" name="name" /><br />
    <label>Age:</label><input type="text" name="age" /><br />
    <label>Grade:</label><input type="text" name="grade" /><br />
    <input type="submit" name="submit" value="Submit" />
</form>
