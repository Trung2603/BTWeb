<?php
// Sample data (in practice, you would fetch this data from a database)
$books = [];
for ($i = 1; $i <= 100; $i++) {
    $books[] = [
        'stt' => $i,
        'tensach' => "Tensach$i",
        'noidung' => "Noidung$i",
    ];
}

// Pagination settings
$limit = 10; // Number of rows per page
$totalBooks = count($books); // Total number of books
$totalPages = ceil($totalBooks / $limit); // Total number of pages

// Get the current page from the URL, default is page 1
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max($page, 1); // Ensure page is at least 1
$page = min($page, $totalPages); // Ensure page does not exceed total pages

// Calculate the offset for the query
$offset = ($page - 1) * $limit;

// Get the subset of books for the current page
$currentBooks = array_slice($books, $offset, $limit);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pagination Example</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 8px;
            text-align: left;
        }
        table {
            width: 50%;
            margin: 20px auto;
        }
        th {
            background-color: #f2f2f2;
        }
        .pagination {
            text-align: center;
            margin-top: 20px;
        }
        .pagination a {
            margin: 0 5px;
            text-decoration: none;
            padding: 8px 16px;
            border: 1px solid #ddd;
            color: #333;
        }
        .pagination a.active {
            background-color: #4CAF50;
            color: white;
            border: 1px solid #4CAF50;
        }
        .pagination a:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>

<table>
    <tr>
        <th>STT</th>
        <th>Tên sách</th>
        <th>Nội dung sách</th>
    </tr>
    <?php foreach ($currentBooks as $book): ?>
        <tr>
            <td><?php echo $book['stt']; ?></td>
            <td><?php echo $book['tensach']; ?></td>
            <td><?php echo $book['noidung']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<div class="pagination">
    <?php if ($page > 1): ?>
        <a href="?page=<?php echo $page - 1; ?>">&laquo; Previous</a>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <a href="?page=<?php echo $i; ?>" class="<?php echo $i == $page ? 'active' : ''; ?>">
            <?php echo $i; ?>
        </a>
    <?php endfor; ?>

    <?php if ($page < $totalPages): ?>
        <a href="?page=<?php echo $page + 1; ?>">Next &raquo;</a>
    <?php endif; ?>
</div>

</body>
</html>
