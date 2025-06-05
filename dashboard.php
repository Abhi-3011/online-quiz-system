<?php
session_start();

if (!isset($_SESSION['student_id']) || !isset($_SESSION['student_name'])) {
    header("Location: login_student.php");
    exit();
}

$student_name = $_SESSION['student_name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Dashboard</title>
    <style>
        /* Reset and base styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            height: 100vh;
            background: linear-gradient(to right, #6dd5ed, #2193b0);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
        }

        .dashboard-container {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 40px 50px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
            text-align: center;
            width: 600px;
        }

        h2 {
            margin-bottom: 30px;
            font-size: 30px;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2);
        }

        button {
            background-color: #ffffff;
            color: #2193b0;
            border: none;
            padding: 14px 30px;
            margin: 10px;
            font-size: 16px;
            border-radius: 10px;
            cursor: pointer;
            font-weight: bold;
            transition: all 0.3s ease-in-out;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        button:hover {
            background-color: #2193b0;
            color: white;
            transform: scale(1.05);
        }

        .button-row {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        @media (max-width: 500px) {
            .dashboard-container {
                width: 90%;
                padding: 30px 20px;
            }

            h2 {
                font-size: 24px;
            }

            button {
                width: 100%;
                margin: 10px 0;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <h2>Welcome, <?php echo htmlspecialchars($student_name); ?>!</h2>

        <div class="button-row">
        <button onclick="window.location.href='exam_list.php'">Take Quiz</button>
        <button onclick="window.location.href='view_result.php'">View Results</button>
        </div>
        
        <button onclick="window.location.href='logout.php'">Logout</button>
        
    </div>
</body>
</html>
