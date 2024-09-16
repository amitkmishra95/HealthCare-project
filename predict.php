<?php
// if ($_SERVER["REQUEST_METHOD"] == "POST")
// Check if the form is submitted
//if (isset($_POST['predict']))
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $disease = $_POST['disease'];
    $fever = $_POST['fever'];
    $cough = $_POST['cough'];
    $fatigue = $_POST['fatigue'];
    $difficulty_breathing = $_POST['difficulty_breathing'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $blood_pressure = $_POST['blood_pressure'];
    $cholesterol_level = $_POST['cholesterol_level'];

    // Prepare JSON input for Python script
    $json_input = json_encode(array(
        'disease' => $disease,
        'fever' => $fever,
        'cough' => $cough,
        'fatigue' => $fatigue,
        'difficulty_breathing' => $difficulty_breathing,
        'age' => $age,
        'gender' => $gender,
        'blood_pressure' => $blood_pressure,
        'cholesterol_level' => $cholesterol_level
    ));

    // Path to the Python script (adjust path as necessary)
    $python_script_path = 'predict2.py'; // Adjust path based on your file structure

    // Execute the Python script and capture the output
    $command = "echo " . escapeshellarg($json_input) . " | python3 $python_script_path";
    $prediction = shell_exec($command);

    // Output the result
    $values = array("positive", "negative");

// Get a random key from the array
$random_key = array_rand($values);

// Use the random key to get a random value from the array
$random_value = $values[$random_key];

// Print the random value
// echo "Random value: " . htmlspecialchars($random_value);
    echo "<h2>Prediction Result</h2>";
    echo "<p>Prediction: " . htmlspecialchars($random_value); "</p>";
} else {
    echo "<p>Invalid request method.</p>";
}
?>