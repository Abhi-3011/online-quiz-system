<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard</title>
  <style>
    /* Reset */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background: radial-gradient(circle at top left, #0f2027, #203a43, #2c5364);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: #fff;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: flex-start;
      padding: 50px 20px;
    }

    h2 {
      font-size: 42px;
      margin-bottom: 40px;
      text-shadow: 0 0 15px rgba(255, 255, 255, 0.3);
    }

    table {
      border-collapse: collapse;
      background: rgba(255, 255, 255, 0.05);
      backdrop-filter: blur(12px);
      border-radius: 15px;
      box-shadow: 0 0 25px rgba(0, 255, 255, 0.1);
      overflow: hidden;
      width: 90%;
      max-width: 800px;
    }

    th, td {
      padding: 20px;
      text-align: center;
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    th {
      font-size: 20px;
      background-color: rgba(0, 255, 255, 0.05);
      color: #00ffff;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    td button {
      padding: 12px 25px;
      font-size: 16px;
      font-weight: bold;
      background: rgba(255, 255, 255, 0.08);
      color: white;
      border: 1px solid rgba(255, 255, 255, 0.2);
      border-radius: 10px;
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: 0 0 10px rgba(0, 255, 255, 0.1);
    }

    td button:hover {
      background: rgba(0, 255, 255, 0.1);
      color: cyan;
      box-shadow: 0 0 15px cyan;
      transform: scale(1.05);
    }

    .back-button {
      margin-top: 40px;
      padding: 12px 25px;
      background-color: transparent;
      border: 2px solid white;
      color: #fff;
      border-radius: 10px;
      font-size: 16px;
      font-weight: bold;
      text-decoration: none;
      transition: all 0.3s ease;
    }

    .back-button:hover {
      background: white;
      color: #203a43;
      box-shadow: 0 0 20px white;
    }

    @media (max-width: 600px) {
      h2 {
        font-size: 28px;
      }

      table {
        font-size: 14px;
      }

      td button {
        width: 100%;
      }
    }
  </style>
</head>
<body>

  <h2>🛠️ Admin Dashboard</h2>

  <table>
    <tr>
      <th>Action</th>
      <th>Option</th>
    </tr>
    <tr>
      <td>Add Exam</td>
      <td><button onclick="window.location.href='add_exam.php'">➕ Add Exam</button></td>
    </tr>
    <tr>
      <td>Add Question</td>
      <td><button onclick="window.location.href='add_question.php'">📄 Add Question</button></td>
    </tr>
    <tr>
      <td>View Student Results</td>
      <td><button onclick="window.location.href='view_student_results.php'">📊 View Results</button></td>
    </tr>
    <tr>
      <td>Student Details</td>
      <td><button onclick="window.location.href='registered_student.php'">📊 View Details</button></td>
    </tr>
    <tr>
      <td>Add Subject</td>
      <td><button onclick="window.location.href='add_subject_exam.html'">📘 Add Subject</button></td>
    </tr>
  </table>

  <a href="admin_Login.html" class="back-button">⬅ Back to Admin Login</a>

</body>
</html>
