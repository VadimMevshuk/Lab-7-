<?php include 'includes/header.php'; ?>
<?php include 'includes/db.php'; ?>

<?php
$order_by = isset($_GET['sort']) ? $_GET['sort'] : 'date';
$sql = "SELECT * FROM events ORDER BY $order_by ASC";
$result = $conn->query($sql);
?>

<table>
    <thead>
        <tr>
            <th><a href="?sort=title">Назва</a></th>
            <th>Опис</th>
            <th><a href="?sort=date">Дата</a></th>
            <th>Тип</th>
            <th>Ціна</th>
            <th>Створено</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['title']) ?></td>
            <td><?= htmlspecialchars($row['description']) ?></td>
            <td><?= $row['date'] ?></td>
            <td><?= $row['type'] ?></td>
            <td><?= $row['price'] ?></td>
            <td><?= $row['created_at'] ?></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>


<div class="back-button">
    <a href="http://localhost/%D0%9B%D0%B0%D0%B1%D0%B0%D1%80%D0%B0%D0%BE%D1%80%D0%BD%D0%B0%207%20%D0%B2%D0%B5%D0%B1-%D1%80%D0%BE%D0%B7%D1%80%D0%BE%D0%B1%D0%BA/index.php">
        <button type="button">Назад</button>
    </a>
</div>

<?php include 'includes/footer.php'; ?>
