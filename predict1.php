



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Disease Prediction</title>
    <script>
        function submitForm() {
            // Create a form data object
            var formData = new FormData(document.querySelector('form'));
            
            // Use Fetch API to send form data to PHP script
            fetch('predict.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                document.getElementById('result').innerHTML = data;
            });
        }
    </script>
</head>
<body>
    <h1>Disease Prediction Form</h1>
    <form action="predict.php" method="post">
        <label for="disease">Disease:</label>
        <input type="text" id="disease" name="disease"><br><br>
        
        <label for="fever">Fever:(YES/NO)</label>
        <input type="text" id="fever" name="fever"><br><br>
        
        <label for="cough">Cough:(YES/NO)</label>
        <input type="text" id="cough" name="cough"><br><br>
        
        <label for="fatigue">Fatigue:(YES/NO)</label>
        <input type="text" id="fatigue" name="fatigue"><br><br>
        
        <label for="difficulty_breathing">Difficulty Breathing:(YES/NO)</label>
        <input type="text" id="difficulty_breathing" name="difficulty_breathing"><br><br>
        <label for="age">Age:</label>
        <input type="text" id="age" name="age"><br><br>
        <label for="gender">Gender:(FEMALE/MALE)</label>
        <input type="text" id="gender" name="gender"><br><br>
        
        <label for="blood_pressure">Blood Pressure:(LOW,NORMAL,HIGH)</label>
        <input type="text" id="blood_pressure" name="blood_pressure"><br><br>
        
        <label for="cholesterol_level">Cholesterol Level:</label>
        <input type="text" id="cholesterol_level" name="cholesterol_level"><br><br>
        <p id="result"></p>
        <input type="submit" name="predict" value="predict">
    </form>

    </form>
</body>
</html>
