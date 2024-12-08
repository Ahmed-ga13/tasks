<?php
session_start(); 

// Read data from JSON file
$jsonFile = 'database.json';
$registeredData = [];
if (file_exists($jsonFile)) {
    $registeredData = json_decode(file_get_contents($jsonFile), true);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Users</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            color: #4caf50;
            margin-top: 20px;
        }

        .back-link {
            display: inline-block;
            margin: 20px auto;
            text-align: center;
            font-size: 16px;
            text-decoration: none;
            background-color: #4caf50;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .back-link:hover {
            background-color: #45a049;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 15px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
            font-size: 16px;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid #ddd;
        }

        p {
            text-align: center;
            font-size: 18px;
            color: #666;
        }
    </style>
</head>

<body>
    <h2>Registered Users</h2>
    <div style="text-align: center;">
        <a href="index.php" class="back-link">Back to Registration</a>
    </div>
    <?php if (empty($registeredData)): ?>
        <p>No registered users found.</p>
    <?php else: ?>
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Image</th>
            </tr>
            <?php foreach ($registeredData as $user): ?>
                <tr>
                    <td><?php echo htmlspecialchars($user['name']); ?></td>
                    <td><?php echo htmlspecialchars($user['email']); ?></td>
                    <td>
                        <img src="<?php echo htmlspecialchars($user['image']); ?>" alt="User Image">
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</body>

</html>