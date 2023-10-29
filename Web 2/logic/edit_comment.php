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

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $commentId = $_POST["comment_id"];
        $newComment = $_POST["new_comment"];

        // Обновление комментария в базе данных
        $sql = "UPDATE comments SET comment = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $newComment, $commentId);
        $stmt->execute();

        $stmt->close();
        $conn->close();

        // Перенаправление на страницу с комментариями
        header("Location: index.html");
        exit;
    } else {
        // Получение идентификатора комментария из параметров URL
        $commentId = $_GET["id"];

        // Получение информации о комментарии из базы данных
        $sql = "SELECT * FROM comments WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $commentId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $comment = $row["comment"];

            // Отображение формы редактирования комментария
            ?>
            <form id="comment-form" class="comment-form">
                <input type="hidden" name="comment_id" value="<?php echo $commentId; ?>">
                <textarea name="new_comment" class="comment-textarea"><?php echo $comment; ?></textarea>
                <button type="button" class="save-button" onclick="submitForm()">Сохранить</button>
                <button type="button" id="return-button" class="return-button" style="display: none" onclick="returnToSite()">Вернуться на сайт</button>
                <button type="button" class="return-button" onclick="returnToSite()">Вернуться на сайт</button>
            </form>

            <style>
                @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap');
                * {
                    margin: 0;
                    padding: 0;
                    box-sizing: border-box;
                    font-family: 'Poppins', sans-serif;
                    list-style: none;
                }

                body {
                    background: linear-gradient(rgb(10, 10, 10), rgb(25, 1, 31));
                    color: white;
                }

                a {
                    text-decoration: none;
                }

                .comment-form {
                    margin: 20px;
                }

                .comment-form {
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    justify-content: center;
                }

                .comment-form textarea {
                    width: 100%;
                    height: 100px;
                    padding: 8px;
                    border-radius: 10px;
                    border: none;
                    background-color: rgb(255, 255, 255);
                    color: rgb(0, 0, 0);
                    font-size: 16px;
                    margin-bottom: 15px;
                    resize: vertical;
                }

                .comment-form button {
                    background: none;
                    border: solid 2px white;
                    color: white;
                    padding: 10px 20px;
                    border-radius: 10px;
                    cursor: pointer;
                    font-size: 20px;
                    align-items: center;
                    width: 30%;
                    margin-bottom: 15px;
                }

                .comment-form button:hover {
                    background-color: #ffffff;
                    border: solid 2px #1c022e;
                    color: #1c022e;
                }
            </style>
            <script>
                function submitForm() {
                    var form = document.getElementById('comment-form');
                    var formData = new FormData(form);

                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', '<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>', true);
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            showReturnButton(); // Показать кнопку "Вернуться на сайт"
                        }
                    };
                    xhr.send(formData);
                }

                function showReturnButton() {
                    var returnButton = document.getElementById('return-button');
                    returnButton.style.display = 'inline-block';
                }

                function returnToSite() {
                    // Действия при нажатии кнопки "Вернуться на сайт"
                    window.location.href = 'http://localhost/'; // Замените ссылку на адрес вашего сайта
                }
            </script>
            <?php                                           
        } else {
            echo "Комментарий не найден.";
        }

        $stmt->close();
        $conn->close();
    }
?>
