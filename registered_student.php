<?php
include 'db.php';

$sql = "
SELECT 
    s.student_name,
    s.student_contact,
    s.student_qualification
FROM
 student s
";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Results</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #1e3c72, #2a5298);
            margin: 0;
            padding: 20px;
            color: #fff;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 28px;
        }

        table {
            width: 90%;
            margin: auto;
            border-collapse: collapse;
            background: #fff;
            color: #333;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0,0,0,0.15);
        }

        th, td {
            padding: 14px 18px;
            text-align: center;
        }

        th {
            background-color: #2c3e50;
            color: #ecf0f1;
            font-weight: bold;
            text-transform: uppercase;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #dfe6e9;
        }

        @media (max-width: 768px) {
            table {
                width: 100%;
                font-size: 14px;
            }

            th, td {
                padding: 10px;
            }
            
        }
    </style>
</head>
<body>
    <h2>Student Details</h2>
    <table>
        <tr>
            <th>Student Name</th>
            <th>Contact</th>
            <th>Qualification</th>
           
        </tr>

        <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['student_name']; ?></td>
            <td><?php echo $row['student_contact']; ?></td>
            <td><?php echo $row['student_qualification']; ?></td>
           
        </tr>
        

        <?php } ?>
        
    </table>
   

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

</body>
</html>
