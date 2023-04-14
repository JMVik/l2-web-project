const loadMoreBtn = document.getElementById('load-more');
const link = document.getElementById('allarticle');

let offset = 3;
const limit = 3;

loadMoreBtn.addEventListener('click', () => {
    fetch(`/assets/ajax/more_article.php?limit=3&offset=${offset}`)
      .then(response => response.json())
      .then(data => {
        if (data.length > 0) {
          const articleList = document.querySelector('main>nav:nth-of-type(2)>section');
          data.forEach(article => {
          const articleElement = document.createElement('article');
          articleElement.innerHTML = `
          <h3>${article.title}</h3>
          <section>
            <img src="data:${article.imagetype};base64,${article.imagedata}" alt="Image article">
          </section>
          <section>
            <p>${article.content}</p>
          </section>
          `;
          articleList.appendChild(articleElement);
          });
          offset += limit;
        } else {
          loadMoreBtn.style.display = 'none';
          link.style.display = 'flex';
        }
      })
      .catch(error => {
        console.error('Erreur lors de la récupération des projets', error)
      })
})