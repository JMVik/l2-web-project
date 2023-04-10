const form = document.querySelector('main>form');
const submitButton = document.querySelector('main>form>button');

submitButton.addEventListener('click', function(event) {
    event.preventDefault();
    const name = form.querySelectorAll('input')[0].value;
    const email = form.querySelectorAll('input')[1].value;
    const password = form.querySelectorAll('input')[2].value;

    const data = new FormData();
    data.append('name', name);
    data.append('email', email);
    data.append('password', password);

    fetch('signin.php', {
        method: 'POST',
        body: data
    })
    .then(function(response) {
        if (response.ok) {
            window.location.href = "login.php";
        } else {
            alert('Erreur : ' + response.statusText);
        }
    })
    .catch(function(error) {
        alert('Erreur : ' + error.message);
    });
});