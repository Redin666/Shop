<?php
    // Подключение к базе данных
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Коментарии";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
    }

    // Получение данных из формы и защита от SQL-инъекций
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $comment = mysqli_real_escape_string($conn, $_POST['comment']);

    // Вставка комментария в базу данных с использованием подготовленного выражения
    $sql = "INSERT INTO comments (name, email, comment) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sss", $name, $email, $comment);
        $stmt->execute();
        echo "Комментарий успешно добавлен.";
    } else {
        echo "Ошибка: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
?>
