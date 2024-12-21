<?php
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $type = $_POST['type'];
    $price = floatval($_POST['price']);

    $sql = "UPDATE events SET title = ?, description = ?, date = ?, type = ?, price = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssdi", $title, $description, $date, $type, $price, $id);

    if ($stmt->execute()) {
        header("Location: index.php?message=Запис успішно оновлено");
    } else {
        echo "Помилка: " . $conn->error;
    }
}
?>
