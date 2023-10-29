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

    // Обработка запроса на удаление комментария
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $commentId = $_POST["comment-id"];

        // Подготовленный запрос для удаления комментария
        $sql = "DELETE FROM comments WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $commentId);

        if ($stmt->execute()) {
            // Комментарий успешно удален
            echo "Комментарий успешно удален";
        } else {
            // Ошибка при удалении комментария
            echo "Ошибка при удалении комментария: " . $stmt->error;
        }

        $stmt->close();
    }

    $conn->close();
?>

