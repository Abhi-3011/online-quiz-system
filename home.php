<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Home - Online Quiz System</title>
    <style>
        /* Reset margin/padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body, html {
            height: 100%;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow: hidden;
        }

        /* Background image with overlay */
        body {
            background: 
                linear-gradient(rgba(0, 0, 0, 0.6), rgba(0,0,0,0.6)),
                url('https://images.unsplash.com/photo-1496307042754-b4aa456c4a2d?auto=format&fit=crop&w=1470&q=80') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
            padding: 20px;
        }

        h1 {
            font-size: 4rem;
            margin-bottom: 60px;
            text-shadow: 2px 2px 10px rgba(0,0,0,0.7);
            letter-spacing: 2px;
        }

        .button-container {
            display: flex;
            gap: 40px;
            flex-wrap: wrap;
            justify-content: center;
            max-width: 400px;
            width: 100%;
        }

        button {
            flex: 1 1 150px;
            background: #007bff;
            border: none;
            padding: 18px 0;
            color: white;
            font-size: 1.3rem;
            font-weight: 600;
            border-radius: 12px;
            box-shadow: 0 8px 15px rgba(0, 123, 255, 0.4);
            cursor: pointer;
            transition: all 0.3s ease;
            user-select: none;
            letter-spacing: 1px;
        }

        button:hover {
            background: #0056b3;
            box-shadow: 0 12px 20px rgba(0, 86, 179, 0.7);
            transform: translateY(-5px) scale(1.05);
        }

        @media (max-width: 600px) {
            h1 {
                font-size: 2.5rem;
                margin-bottom: 40px;
            }
            .button-container {
                gap: 20px;
                max-width: 300px;
            }
            button {
                font-size: 1.1rem;
                padding: 15px 0;
            }
        }
    </style>
</head>
<body>

    <h1>Welcome to Online Quiz System</h1>

    <div class="button-container">
        <button onclick="window.location.href='admin_login.html'">Admin</button>
        <button onclick="window.location.href='student.php'">Student</button>
    </div>

</body>
</html>
