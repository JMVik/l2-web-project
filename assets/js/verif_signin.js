const emailCheck = (email) => /[a-zA-Z0-9-._]+@[a-zA-Z0-9-._]+\.[a-z]{2,}/.test(email)
const nameCheck = (name_user) => /^.{2,100}$/.test(name_user)
const passwordCheck = (password_user) => /^.{6,100}$/.test(password_user)
const errorEmailContainer = document.querySelector('main > form p:nth-of-type(2)')
const errorNameContainer = document.querySelector('main > form p:first-of-type')
const errorPassContainer = document.querySelector('main > form p:nth-of-type(3)')
const email = document.querySelector('main > form input:nth-of-type(2)')
const name_user = document.querySelector('main > form input:first-of-type')
const password_user = document.querySelector('main > form input:nth-of-type(3)')
const submitButton = document.querySelector('main > form button[type="submit"]')

const eventInputEmail = function (event) {
  if (emailCheck(email.value)) {
    email.classList.remove('error')
    errorEmailContainer.innerText = ''
    submitButton.disabled = false
  } else {
    email.classList.add('error')
    errorEmailContainer.innerHTML = 'Mauvais format<br>Wrong format'
    submitButton.disabled = true
  }
}

const eventInputName = function (event) {
  if (nameCheck(name_user.value)) {
    name_user.classList.remove('error')
    errorNameContainer.innerText = ''
    submitButton.disabled = false
  } else {
    name_user.classList.add('error')
    errorNameContainer.innerHTML = 'Entre 2 et 100 caractères requis<br>Between 2 and 100 characters required'
    submitButton.disabled = true
  }
}

const eventInputPass = function (event) {
  if (passwordCheck(password_user.value)) {
    password_user.classList.remove('error')
    errorPassContainer.innerText = ''
    submitButton.disabled = false
  } else {
    password_user.classList.add('error')
    errorPassContainer.innerHTML = 'Entre 6 et 100 caractères requis<br>Between 6 and 100 characters required'
    submitButton.disabled = true
  }
}

document.querySelector('main > form')
        .addEventListener('submit', (event) => {
          eventInputEmail()
          eventInputName()
          eventInputPass()

          email.addEventListener('input', eventInputEmail)
          name_user.addEventListener('input', eventInputName)
          password_user.addEventListener('input', eventInputPass)

          if (email.classList.contains('error') || name_user.classList.contains('error') || password_user.classList.contains('error')) {
            event.preventDefault()
          }
        })


