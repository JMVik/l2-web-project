function loadTabContent(tabId, event) {
    fetch('assets/extras/admin/' + tabId + ".php")
      .then(response => response.text())
      .then(data => {
        document.querySelector("main>section:nth-child(2)").innerHTML = data;
        
        const title = document.querySelector('article > form input:first-of-type')
        const file = document.querySelector('article > form input:nth-of-type(2)')
        const textarea = document.querySelector('article > form textarea')
        const titleCheck = (title) => /^.{2,100}$/.test(title)
        const fileCheck = (file) => allowedFile.test(file)
        const fileName = fileCheck.name;
        const fileExtension = fileName.split('.').pop()
        const allowedFile = /(\.jpg|\.jpeg|\.png|\.gif)$/i
        const textareaCheck = (textarea) => /^.{2,600}$/.test(textarea)
        const errorTitleContainer = document.querySelector('article > form p:first-of-type')
        const errorFileContainer = document.querySelector('article > form p:nth-of-type(2)')
        const errorTextContainer = document.querySelector('article > form p:nth-of-type(3)')
        const submitButton = document.querySelector('article > form button[type="submit"]')

        const eventInputTitle = function (event) {
          if (titleCheck(title.value)) {
            title.classList.remove('error')
            errorTitleContainer.innerText = ''
            submitButton.disabled = false
          } else {
            title.classList.add('error')
            errorTitleContainer.innerHTML = 'Entre 2 et 100 caractères requis<br>Between 2 and 100 characters required'
            submitButton.disabled = true
          }
        }

        const eventInputFile = function (event) {
          const fileVal = file.value
          if (fileCheck(fileVal)) {
            file.classList.remove('error')
            errorFileContainer.innerText = ''
            submitButton.disabled = false
          } else {
            file.classList.add('error')
            errorFileContainer.innerHTML = 'Fichier invalide (extensions: png, jpg, jpeg ou gif)<br>Invalid file (extensions: png, jpg, jpeg or gif)'
            submitButton.disabled = true
          }
        }

        const eventInputText = function (event) {
          if (textareaCheck(textarea.value)) {
            textarea.classList.remove('error')
            errorTextContainer.innerText = ''
            submitButton.disabled = false
          } else {
            textarea.classList.add('error')
            errorTextContainer.innerHTML = 'Entre 2 et 600 caractères requis<br>Between 2 and 600 characters required'
            submitButton.disabled = true
          }
        }

        document.querySelector('article > form')
                .addEventListener('submit', (event) => {
                  event.preventDefault()
                  
                  eventInputTitle()
                  eventInputFile()
                  eventInputText()

                  title.addEventListener('input', eventInputTitle)
                  file.addEventListener('change', eventInputFile)
                  textarea.addEventListener('input', eventInputText)

                  if (!title.classList.contains('error') && !textarea.classList.contains('error') && !file.classList.contains('error')) {
                    document.querySelector('article > form').submit()
                  }
                })
      })
      .catch(error => console.log(error));
  }