<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 800px;
        }


        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
        }

        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 8px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #5cb85c;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #4cae4c;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <form action="save.php" method="POST">
            Name: <input type="text" name="name" required>
            Email: <input type="email" name="email" required>
            <input type="submit" name="save" value="Save">
        </form>
    </div>
</body>
</html>
