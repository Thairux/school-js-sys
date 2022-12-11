<?php
// PHP code for the manage_test_results.php page

// Connect to the database
$db = new mysqli("localhost", "username", "password", "school_system");

// Check if the form was submitted
if (isset($_POST['submit'])) {
    // Get the data from the form
    $student_id = $_POST['student_id'];
    $subjects = array();
    for ($i = 1; $i <= 7; $i++) {
        $subjects[$i] = $_POST["subject_$i"];
    }

    // Insert the data into the database
    foreach ($subjects as $subject) {
        $db->query("INSERT INTO test_results (student_id, subject, marks) VALUES ('$student_id', '$subject', '$marks')");
    }

    // Redirect to the home page
    header("Location: index.php");
}

// Get the list of students from the database
$students = $db->query("SELECT * FROM students");
?>
<!-- HTML code for the manage test results form -->
<h1>Manage Test Results</h1>
<form method="post" action="manage_test_results.php">
    <label>Student:</label>
    <select name="student_id">
        <?php
        while ($row = $students->fetch_assoc()) {
            echo "<option value='{$row['id']}'>{$row['name']}</option>";
        }
        ?>
    </select><br />
    <label>Subject 1:</label><input type="text" name="subject_1" /><br />
    <label>Subject 2:</label><input type="text" name="subject_2" /><br />
    <label>Subject 3:</label><input type="text" name="subject_3" /><br />
    <label>Subject 4:</label><input type="text" name="subject_4" /><br />
    <label>Subject 5:</label><input type="text" name="subject_5" /><br />
    <label>Subject 6:</label><input type="text" name="subject_6" /><br />
    <label>Subject 7:</label><input type="text" name="subject_7" /><br />
    <input type="submit" value="Submit" />
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect form data
    $student_id = $_POST["student_id"];
    $subject_1 = $_POST["subject_1"];
    $subject_2 = $_POST["subject_2"];
    $subject_3 = $_POST["subject_3"];
    $subject_4 = $_POST["subject_4"];
    $subject_5 = $_POST["subject_5"];
    $subject_6 = $_POST["subject_6"];
    $subject_7 = $_POST["subject_7"];

    // save test results to database
    // (assumes that you have a connection to the database set up)
    $query = "INSERT INTO test_results (student_id, subject_1, subject_2, subject_3, subject_4, subject_5, subject_6, subject_7) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $db_connection->prepare($query);
    $stmt->bind_param("isssssss", $student_id, $subject_1, $subject_2, $subject_3, $subject_4, $subject_5, $subject_6, $subject_7);
    $stmt->execute();
}

    

