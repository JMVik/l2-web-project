function loadTabContent(tabId, event) {
    fetch('assets/extras/admin/' + tabId + ".php")
      .then(response => response.text())
      .then(data => {
        document.querySelector("main>section:nth-child(2)").innerHTML = data;
      })
      .catch(error => console.log(error));
  }