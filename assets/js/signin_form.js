const form = document.querySelector('main>form');
const submitButton = document.querySelector('main>form>button');

submitButton.addEventListener('click', function(event) {
    event.preventDefault();
    const email = form.querySelectorAll('input')[0].value;
    const password = form.querySelectorAll('input')[1].value;

    const data = new FormData();
    data.append('email', email);
    data.append('password', password);

    fetch('signin.php', {
        method: 'POST',
        body: data
    })
    .then(function(response) {
        if (response.ok) {
            alert('Utilisateur créé avec succès !');
            form.reset();
        } else {
            alert('Erreur : ' + response.statusText);
        }
    })
    .catch(function(error) {
        alert('Erreur : ' + error.message);
    });
});