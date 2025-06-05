<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Home -Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 150px;
        }
        button {
            font-size: 20px;
            padding: 15px 40px;
            margin: 20px;
            cursor: pointer;
            border: none;
            border-radius: 8px;
            background-color: #2980b9;
            color: white;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #3498db;
        }
    </style>
</head>
<body>

<h1>Welcome to Admin Page </h1>

<button onclick="window.location.href='dashboard.php'">Student details</button>
<button onclick="window.location.href='add_exam.php'">Exam</button>

</body>
</html>
