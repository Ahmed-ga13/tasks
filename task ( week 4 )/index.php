<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $image = $_FILES['image'];

    $target_dir = "uploads/";


    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0755, true);
    }

    $target_file = $target_dir . basename($image["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


    $check = getimagesize($image["tmp_name"]);
    if ($check === false) {
        $_SESSION['error'] = "File is not an image.";
        $uploadOk = 0;
    }

    if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
        $_SESSION['error'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    if ($image["size"] > (1024 * 1024)) { // 1MB = 1024 * 1024 bytes
        $_SESSION['error'] = "Sorry, your file is too large. Maximum size is 1MB.";
        $uploadOk = 0;
    }

    if ($uploadOk == 1) {
        if (move_uploaded_file($image["tmp_name"], $target_file)) {

            $data = [
                'name' => $name,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'image' => $target_file
            ];

            $jsonFile = 'database.json';
            $existingData = [];
            if (file_exists($jsonFile)) {
                $existingData = json_decode(file_get_contents($jsonFile), true);
            }

            
            $existingData[] = $data;

           
            file_put_contents($jsonFile, json_encode($existingData, JSON_PRETTY_PRINT));

            $_SESSION['success'] = "Registration successful! Image uploaded.";
            header("Location: display.php"); // Redirect to display page
            exit;
        } else {
            $_SESSION['error'] = "Sorry, there was an error uploading your image.";
        }
    } else {
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}


$error = !empty($_SESSION['error']) ? $_SESSION['error'] : '';
$success = !empty($_SESSION['success']) ? $_SESSION['success'] : '';
session_unset();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: #fff;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            text-align: center;
            color: #4caf50;
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        p {
            text-align: center;
            font-size: 14px;
        }

        p.error {
            color: red;
        }

        p.success {
            color: green;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2>Registration Form</h2>
        <?php if (!empty($error)) {
            echo "<p class='error'>$error</p>";
        } ?>
        <?php if (!empty($success)) {
            echo "<p class='success'>$success</p>";
        } ?>

        <form action="" method="post" enctype="multipart/form-data">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="image">Upload Image:</label>
            <input type="file" id="image" name="image" accept="image/*" required>

            <input type="submit" value="Register">
        </form>
    </div>
</body>

</html>