<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Student Login/Register</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #74ebd5, #ACB6E5);
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        @keyframes gradientShift {
            0% {background-position: 0% 50%;}
            50% {background-position: 100% 50%;}
            100% {background-position: 0% 50%;}
        }

        .portal-container {
            background-color: rgba(255, 255, 255, 0.15);
            padding: 40px 50px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px);
            text-align: center;
            color: #fff;
            max-width: 400px;
            width: 90%;
        }

        h1 {
            font-size: 34px;
            margin-bottom: 30px;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.4);
        }

        .btn-container {
            display: flex;
            flex-direction: column;
            gap: 20px;
            margin-bottom: 20px;
        }

        button {
            padding: 14px;
            font-size: 18px;
            font-weight: bold;
            border: none;
            border-radius: 12px;
            background-color: #ffffff;
            color: #2980b9;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.25);
        }

        button:hover {
            background-color: #2980b9;
            color: #fff;
            transform: scale(1.03);
        }

        a.back-link {
            display: inline-block;
            margin-top: 15px;
            text-decoration: none;
            font-weight: bold;
            background-color: #ffffff;
            color: #27ae60;
            padding: 10px 18px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
            transition: background-color 0.3s, color 0.3s;
        }

        a.back-link:hover {
            background-color: #27ae60;
            color: #fff;
        }

        @media (max-width: 500px) {
            .portal-container {
                padding: 30px 20px;
            }

            h1 {
                font-size: 26px;
            }

            button {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>

    <div class="portal-container">
        <h1>Student Portal</h1>

        <div class="btn-container">
            <button onclick="window.location.href='login_student.html'">Login</button>
            <button onclick="window.location.href='register_student.html'">Register</button>
        </div>

        <a class="back-link" href="home.php">⬅ Back to Home</a>
    </div>

</body>
</html>
