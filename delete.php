<?php
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $sql = "DELETE FROM events WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: index.php?message=Запис успішно видалено");
    } else {
        echo "Помилка: " . $conn->error;
    }
}
?>
