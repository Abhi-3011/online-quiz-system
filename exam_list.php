<?php
session_start();
include 'db.php';

$sql = "SELECT DISTINCT exam_subject FROM examination";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Select Subject for Quiz</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(to right,rgb(5, 57, 103),rgb(26, 118, 123));
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 30px;
        }

        .container {
            background: rgba(255, 255, 255, 0.23);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            padding: 40px 30px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 100%;
            max-width: 400px;
            color: #fff;
        }

        h2 {
            font-size: 30px;
            margin-bottom: 30px;
            font-weight: bold;
            text-shadow: 1px 1px 5px rgba(0,0,0,0.3);
        }

        select {
            width: 100%;
            padding: 12px 15px;
            font-size: 16px;
            border-radius: 10px;
            border: none;
            margin-bottom: 25px;
            background-color: #ffffff;
            color: #333;
            appearance: none;
            background-image: url('data:image/svg+xml;charset=US-ASCII,<svg xmlns="http://www.w3.org/2000/svg" width="14" height="10"><polygon points="0,0 14,0 7,10" fill="%23333"/></svg>');
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: 12px;
        }

        input[type="submit"], button {
            padding: 12px 20px;
            width: 100%;
            border: none;
            border-radius: 8px;
            font-size: 17px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s ease;
            margin-bottom: 15px;
        }

        input[type="submit"] {
            background-color: #ffffff;
            color: #0072ff;
        }

        input[type="submit"]:hover {
            background-color: #0072ff;
            color: white;
        }

        button {
            background-color: transparent;
            border: 2px solid #fff;
            color: white;
        }

        button:hover {
            background-color: white;
            color: #0072ff;
        }

        @media (max-width: 500px) {
            .container {
                padding: 30px 20px;
            }

            h2 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Select a Subject</h2>

        <form action="select_exam_by_subject.php" method="POST">
            <select name="subject" required>
                <option value="" disabled selected>Select Subject</option>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <option value="<?php echo htmlspecialchars($row['exam_subject']); ?>">
                        <?php echo htmlspecialchars($row['exam_subject']); ?>
                    </option>
                <?php endwhile; ?>
            </select>

            <input type="submit" value="Take Quiz">
        </form>

        <button onclick="window.location.href='dashboard.php'">Back to Dashboard</button>
    </div>

</body>
</html>
