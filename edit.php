<?php
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $sql = "SELECT * FROM events WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $event = $result->fetch_assoc();

    if (!$event) {
        die("Запис не знайдено");
    }
}
?>

<?php include 'includes/header.php'; ?>

<form method="POST" action="update.php">
    <input type="hidden" name="id" value="<?= $event['id'] ?>">
    <label for="title">Назва:</label>
    <input type="text" id="title" name="title" value="<?= htmlspecialchars($event['title']) ?>">
    <br>
    <label for="description">Опис:</label>
    <textarea id="description" name="description"><?= htmlspecialchars($event['description']) ?></textarea>
    <br>
    <label for="date">Дата:</label>
    <input type="date" id="date" name="date" value="<?= $event['date'] ?>">
    <br>
    <label for="type">Тип:</label>
    <input type="text" id="type" name="type" value="<?= $event['type'] ?>">
    <br>
    <label for="price">Ціна:</label>
    <input type="number" id="price" name="price" value="<?= $event['price'] ?>">
    <br>
    <button type="submit">ОК</button>
</form>

<?php include 'includes/footer.php'; ?>
