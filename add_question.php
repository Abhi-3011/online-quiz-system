<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Add Question</title>
    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #3a1c71, #d76d77, #ffaf7b);
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            padding: 20px;
        }

        .container {
            background: rgba(255, 255, 255, 0.15);
            padding: 20px 40px;
            border-radius: 10px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.3);
            width: 550px;
            text-align: center;
        }

        h2 {
            margin-bottom: 30px;
            font-size: 28px;
            text-shadow: 1px 1px 5px rgba(0,0,0,0.4);
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 1px;
            
            text-align: left;
        }

        label, select, textarea, input[type="text"], input[type="number"] {
            display: block;
            width: 100%;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        select, textarea, input[type="text"], input[type="number"] {
            padding: 12px 15px;
            border-radius: 10px;
            border: none;
            outline: none;
            font-weight: 500;
            color: #333;
            background: #fff;
            transition: box-shadow 0.3s ease;
        }

        select:focus, textarea:focus, input[type="text"]:focus, input[type="number"]:focus {
            box-shadow: 0 0 8px 3px #ffaf7b;
            background: #fff;
        }

        textarea {
            resize: vertical;
            min-height: 50px;
            font-family: inherit;
        }

        input[type="submit"] {
            background: #ffaf7b;
            color: #3a1c71;
            font-weight: 700;
            padding: 15px 0;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            box-shadow: 0 6px 15px rgba(255, 175, 123, 0.5);
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        input[type="submit"]:hover {
            background-color: #ff8c42;
            transform: scale(1.05);
        }

        p a {
            color: #fff;
            font-weight: 600;
            text-decoration: underline;
            transition: color 0.3s ease;
        }

        p a:hover {
            color: #ffaf7b;
        }

        p.success-message {
            margin-top: 15px;
            color: #a6f1a6;
            font-weight: 600;
            text-align: center;
            text-shadow: 0 0 7px #85d585;
        }

        @media (max-width: 500px) {
            .container {
                width: 95vw;
           
                padding: 30px 20px;
            }

            h2 {
                font-size: 28px;
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add Question</h2>

        <form method="POST" action="">
            <label for="subject_code">Subject:</label>
            <select id="subject_code" name="subject_code" required>
                <?php
                $subjects = $conn->query("SELECT * FROM subject");
                while ($row = $subjects->fetch_assoc()) {
                    echo "<option value='{$row['subject_code']}'>{$row['subject_name']}</option>";
                }
                ?>
            </select>

            <label for="question_text">Question Text:</label>
            <textarea id="question_text" name="question_text" required></textarea>

            <label for="option1">Option 1:</label>
            <input type="text" id="option1" name="option1" required>

            <label for="option2">Option 2:</label>
            <input type="text" id="option2" name="option2" required>

            <label for="option3">Option 3:</label>
            <input type="text" id="option3" name="option3" required>

            <label for="option4">Option 4:</label>
            <input type="text" id="option4" name="option4" required>

            <label for="correct_option">Correct Option (1-4):</label>
            <input type="number" id="correct_option" name="correct_option" min="1" max="4" required>

            <input type="submit" name="add_question" value="Add Question">
        </form>

        <style>
    .back-button {
        display: inline-block;
        margin-top: 25px;
        padding: 10px 20px;
        background-color: white;
        color: #0072ff;
        font-weight: bold;
        text-decoration: none;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        cursor: pointer;
        transition: 0.3s ease;
        box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }

    .back-button:hover {
        background-color: #0072ff;
        color: white;
    }
   </style>

    <div style="text-align:center;">
    <a href="admin_dashboard.php" class="back-button">⬅ Back to Admin Dashboard</a>
     </div>
        <?php
        if (isset($_POST['add_question'])) {
            $text = $_POST['question_text'];
            $o1 = $_POST['option1'];
            $o2 = $_POST['option2'];
            $o3 = $_POST['option3'];
            $o4 = $_POST['option4'];
            $correct = $_POST['correct_option'];
            $subject_code = $_POST['subject_code'];

            $stmt = $conn->prepare("INSERT INTO question (question_text, option1, option2, option3, option4, correct_option, subject_code)
                                    VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssis", $text, $o1, $o2, $o3, $o4, $correct, $subject_code);
            $stmt->execute();

            echo "<p class='success-message'>Question added successfully!</p>";
        }
        ?>
    </div>
</body>
</html>
