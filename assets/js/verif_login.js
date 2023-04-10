const emailCheck = (email) => /[a-zA-Z0-9-._]+@[a-zA-Z0-9-._]+\.[a-z]{2,}/.test(email)
const errorContainer = document.querySelector('main>form p:first-of-type')
const email = document.getElementById('email')
const submitButton = document.querySelector('main>form button')

const eventInputEmail = function (event) {
  if (emailCheck(email.value)) {
    email.classList.remove('error')
    errorContainer.innerText = ''
    submitButton.disabled = false
  } else {
    errorContainer.innerHTML = 'Mauvais format<br>Wrong format'
    email.classList.add('error')
    submitButton.disabled = true
  }
}

document.querySelector('main>form')
        .addEventListener('submit', (event) => {
          eventInputEmail()

          email.addEventListener('input', eventInputEmail)

          if (email.classList.contains('error')) {
            event.preventDefault()
          }
        })


