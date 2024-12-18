<?php include 'includes/header.php'; ?>
<?php include 'includes/db.php'; ?>

<?php
$error = '';
$success = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = htmlspecialchars($_POST['title']);
    $description = htmlspecialchars($_POST['description']);
    $date = $_POST['date'];
    $type = $_POST['type'];
    $price = $_POST['price'];

    if (empty($title) || empty($date) || empty($type)) {
        $error = 'Будь ласка, заповніть всі обов’язкові поля.';
    } else {
        $stmt = $conn->prepare("INSERT INTO events (title, description, date, type, price) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssd", $title, $description, $date, $type, $price);

        if ($stmt->execute()) {
            $success = 'Подію успішно створено!';
        } else {
            $error = 'Сталася помилка: ' . $stmt->error;
        }
        $stmt->close();
    }
}
?>

<form method="POST" action="create_event.php">
    <label>Назва події*</label>
    <input type="text" name="title" required>
    <label>Опис</label>
    <textarea name="description"></textarea>
    <label>Дата проведення*</label>
    <input type="date" name="date" required>
    <label>Тип події*</label>
    <select name="type" required>
        <option value="Conference">Конференція</option>
        <option value="Workshop">Майстер-клас</option>
        <option value="Meetup">Міт-ап</option>
    </select>
    <label>Ціна квитка</label>
    <input type="number" name="price" step="0.01">
    <button type="submit">Створити</button>
    <a href="http://localhost/%D0%9B%D0%B0%D0%B1%D0%B0%D1%80%D0%B0%D0%BE%D1%80%D0%BD%D0%B0%207%20%D0%B2%D0%B5%D0%B1-%D1%80%D0%BE%D0%B7%D1%80%D0%BE%D0%B1%D0%BA/index.php">
        <button type="button">Назад</button>
    </a>
</form>


<?php if ($error): ?>
    <p style="color: red;"><?= $error ?></p>
<?php endif; ?>

<?php if ($success): ?>
    <p style="color: green;"><?= $success ?></p>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>
