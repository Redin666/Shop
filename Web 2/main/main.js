const counterDisplays = document.querySelectorAll('.counter-display');
const addButtons = document.querySelectorAll('.add-button');
const subtractButtons = document.querySelectorAll('.subtract-button');
const resetButtons = document.querySelectorAll('.reset-button');


let counter = localStorage.getItem('counter');
if (counter === null) {
	counter = 0;
	localStorage.setItem('counter', counter);
}


for (let i = 0; i < counterDisplays.length; i++) {
  	counterDisplays[i].innerText = counter;
}


for (let i = 0; i < addButtons.length; i++) {
	addButtons[i].addEventListener('click', () => {
		counter++;
		localStorage.setItem('counter', counter);
		for (let j = 0; j < counterDisplays.length; j++) {
			counterDisplays[j].innerText = counter;
		}
	});
}

for (let i = 0; i < subtractButtons.length; i++) {
	subtractButtons[i].addEventListener('click', () => {
		if (counter > 0) {
			counter--;
		}
		localStorage.setItem('counter', counter);
		for (let j = 0; j < counterDisplays.length; j++) {
			counterDisplays[j].innerText = counter;
		}
	});
}

for (let i = 0; i < resetButtons.length; i++) {
		resetButtons[i].addEventListener('click', () => {
		counter = 0;
		localStorage.setItem('counter', counter);
		for (let j = 0; j < counterDisplays.length; j++) {
			counterDisplays[j].innerText = counter;
		}
	});
}

function submitForm(event) {
    event.preventDefault();

    var form = document.getElementById("comment-form");
    var iframe = document.getElementById("comment-iframe");

    form.target = "comment-iframe";
    iframe.addEventListener("load", handleIframeLoad);

    form.submit();
}

function handleIframeLoad() {
	var iframe = document.getElementById("comment-iframe");
	var iframeContent = iframe.contentDocument || iframe.contentWindow.document;
	var response = iframeContent.body.innerHTML;

	console.log(response);
}

function deleteComment(event) {
    var commentId = event.target.dataset.commentId;
    var confirmation = confirm("Вы уверены, что хотите удалить этот комментарий?");

    if (confirmation) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "Web 2/logic/delete_comment.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = xhr.responseText;
                console.log(response);

                // Можно выполнить дополнительные действия после удаления комментария
            }
        };
        xhr.send("comment-id=" + commentId);
    }
}