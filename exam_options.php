<?php
session_start();
$subject = $_POST['subject'] ?? '';
$_SESSION['selected_subject'] = $subject;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exam Options</title>
    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(to right, #8360c3, #2ebf91);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 40px;
            color: white;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 40px;
            border-radius: 15px;
            backdrop-filter: blur(10px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            text-align: center;
            width: 350px;
        }

        h2 {
            margin-bottom: 30px;
            font-size: 28px;
        }

        form {
            margin: 15px 0;
        }

        input[type="submit"], button {
            padding: 12px 30px;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            background-color: #ffffff;
            color: #2ebf91;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        input[type="submit"]:hover, button:hover {
            background-color: #2ebf91;
            color: white;
        }

        button {
            margin-top: 20px;
        }

        @media (max-width: 480px) {
            .container {
                width: 90%;
                padding: 30px 20px;
            }

            h2 {
                font-size: 24px;
            }

            input[type="submit"], button {
                width: 100%;
                margin: 10px 0;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Subject: <?php echo htmlspecialchars($subject); ?></h2>

        <form action="select_exam_by_subject.php" method="POST">
            <input type="submit" value="Start Exam">
        </form>

        

        <button onclick="window.location.href='exam_list.php'">Back to Subjects</button>
    </div>
</body>
</html>
