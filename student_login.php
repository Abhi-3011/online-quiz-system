<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Student Login</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 400px; margin: 100px auto; }
        form { display: flex; flex-direction: column; }
        label { margin-top: 10px; }
        input[type="text"], input[type="number"] {
            padding: 8px; font-size: 16px; margin-top: 5px;
        }
        button {
            margin-top: 20px; padding: 10px; font-size: 18px;
            background-color: #2980b9; color: white; border: none; border-radius: 6px;
            cursor: pointer;
        }
        button:hover { background-color: #3498db; }
    </style>
</head>
<body>

<h2>Student Login</h2>

<form action="student_login_process.php" method="POST">
    <label for="student_id">Student ID:</label>
    <input type="number" id="student_id" name="student_id" required>

    <label for="student_name">Student Name:</label>
    <input type="text" id="student_name" name="student_name" required>

    <button type="submit">Login</button>
</form>

<p><a href="home.php">Back to Home</a></p>

</body>
</html>
