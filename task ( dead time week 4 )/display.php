<?php
// Read the contents of the JSON file
$dataFile = 'library_data.json';
$jsonData = file_exists($dataFile) ? json_decode(file_get_contents($dataFile), true) : [];

// Check if the data exists
$books = isset($jsonData['books']) ? $jsonData['books'] : [];
$users = isset($jsonData['users']) ? $jsonData['users'] : [];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f4f4f9;
            color: #333;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #3498db;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Library Management System</h1>

    <!-- Display Books -->
    <h2>Books</h2>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Available</th>
                <th>Checkout Date</th>
                <th>Due Date</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($books)): ?>
                <?php foreach ($books as $book): ?>
                    <tr>
                        <td><?= htmlspecialchars($book['title']); ?></td>
                        <td><?= htmlspecialchars($book['author']); ?></td>
                        <td><?= $book['isAvailable'] ? 'Yes' : 'No'; ?></td>
                        <td><?= $book['checkoutDate'] ?? 'Not Checked Out'; ?></td>
                        <td><?= $book['dueDate'] ?? 'Not Checked Out'; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">No books available.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <!-- Display Users -->
    <h2>Users</h2>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Borrowed Books</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($users)): ?>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= htmlspecialchars($user['name']); ?></td>
                        <td>
                            <?= !empty($user['borrowedBooks'])
                                ? implode(', ', array_map('htmlspecialchars', $user['borrowedBooks']))
                                : 'No borrowed books'; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="2">No user data available.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>

</html>