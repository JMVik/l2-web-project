const form = document.querySelector('main>form');
const submitButton = document.querySelector('main>form>button');

submitButton.addEventListener('click', function(event) {
    event.preventDefault();
    const email = form.querySelectorAll('input')[0].value;
    const password = form.querySelectorAll('input')[1].value;

    const data = new FormData();
    data.append('email', email);
    data.append('password', password);

    fetch('login.php', {
        method: 'POST',
        body: data
    })
    .then(function(response) {
        if (response.ok) {
            alert('Connecté !');
            form.reset();
        } else {
            alert('Erreur : ' + response.statusText);
        }
    })
    .catch(function(error) {
        alert('Erreur : ' + error.message);
    });
});

/*
const form = document.querySelector('main>form');

loginForm.addEventListener('submit', (event) => {
	event.preventDefault();
	const formData = new FormData(loginForm);

	fetch('login.php', {
		method: 'POST',
		body: formData
	})
	.then(response => {
		if (response.ok) {
			window.location.replace('index.php');
		} else {
			alert('Invalid email or password');
		}
	})
	.catch(error => {
		console.error('Error:', error);
	});
});

document.querySelector("main>form").addEventListener("submit", function(event) {
    event.preventDefault();

    var form = event.target;
    var formData = new FormData(form);

    var xhr = new XMLHttpRequest();
    xhr.open(form.method, form.action);
    xhr.onload = function() {
        if (xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            if (response.success) {
                document.querySelector("main>section").innerHTML = "<p>Login successful!</p>";
            } else {
                document.querySelector("main>section").innerHTML = "<p>" + response.message + "</p>";
            }
        }
    };
    xhr.send(formData);
});
*/