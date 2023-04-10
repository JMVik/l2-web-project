const emailCheckSub = (emailSub) => /[a-zA-Z0-9-._]+@[a-zA-Z0-9-._]+\.[a-z]{2,}/.test(emailSub)
const errorContainerSub = document.querySelector('body>footer>nav>section:nth-of-type(2) p:nth-of-type(2)')
const emailSub = document.getElementById('emailsub')
const submitButtonSub = document.querySelector('body>footer>nav form button')

const eventInputEmailSub = function (event) {
  if (emailCheckSub(emailSub.value)) {
    emailSub.classList.remove('error')
    errorContainerSub.innerText = ''
    submitButtonSub.disabled = false
  } else {
    errorContainerSub.innerHTML = 'Mauvais format<br>Wrong format'
    emailSub.classList.add('error')
    submitButtonSub.disabled = true
  }
}

document.querySelector('body>footer>nav form')
        .addEventListener('submit', (event) => {
          eventInputEmailSub()

          emailSub.addEventListener('input', eventInputEmailSub)

          if (emailSub.classList.contains('error')) {
            event.preventDefault()
          }
        })


