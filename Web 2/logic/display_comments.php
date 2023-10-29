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

    // Получение комментариев из базы данных с использованием подготовленного выражения
    $sql = "SELECT * FROM comments ORDER BY created_at DESC LIMIT 4";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $commentId = $row['id'];

                echo "<div class='comment'>";
                echo "<img src='Web 2/img/для аккаунта.jpg' alt=''>";
                echo "<div class='comment-info'>";
                echo "<p class='name'>Автор: " . htmlspecialchars($row['name']) . "</p>";
                echo "<p class='email'>Email: " . htmlspecialchars($row['email']) . "</p>";
                echo "<p class='comment-text'><span>Комментарий</span>: " . htmlspecialchars($row['comment']) . "</p>";
                echo "<p class='timestamp'>Опубликовано: " . $row['created_at'] . "</p>";
                echo "<div class='actions'>";
                echo "<a href='Web 2/logic/edit_comment.php?id=" . $commentId . "' class='edit-button'>Редактировать</a>";
                echo "<button class='delete-button' data-comment-id='" . $commentId . "' onclick='deleteComment(event)'>Удалить</button>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<h1>Нет комментариев</h1>";
        }

        $stmt->close();
    } else {
        echo "Ошибка: " . $conn->error;
    }

    $conn->close();
?>

