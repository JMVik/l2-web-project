const emailCheck = (email) => /[a-zA-Z0-9-._]+@[a-zA-Z0-9-._]+\.[a-z]{2,}/.test(email)
const errorContainer = document.querySelector('main form p:first-of-type')
const email = document.getElementById('email')

const eventInputEmail = function (event) {
  if (emailCheck(email.value)) {
    email.classList.remove('error')
    errorContainer.innerText = ''
  } else {
    errorContainer.innerText = 'L\'email n\'a pas le bon format'
    email.classList.add('error')
  }
}

document.querySelector('main>form')
        .addEventListener('submit', (event) => {
          event.preventDefault()
          eventInputEmail()

          email.addEventListener('input', eventInputEmail)
        })


