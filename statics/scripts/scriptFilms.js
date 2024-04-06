document.addEventListener('DOMContentLoaded', function () {
    // Récupérer l'ID du film à partir de l'URL
    const urlParams = new URLSearchParams(window.location.search);
    const refTmdb = urlParams.get('ref');

    // Faire une requête à l'API TMDB pour obtenir les détails du film
    const options = {
        method: 'GET',
        headers: {
            accept: 'application/json',
            Authorization: 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI0MTMzNzlmMTgxOTg0MWQyYTMxY2FmNWI2ZDNjNDU4OSIsInN1YiI6IjY1ZTZlNjg3Y2VkZTY5MDE2MmJkZmQyZSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.S5Uw2VA9TiRB9h5ZqJIHsK6RqvAHaPWJw4-JLK9hRyc'
        }
    };
    fetch(`https://api.themoviedb.org/3/movie/${refTmdb}?language=fr-FR`, options)
        .then(response => response.json())
        .then(data => {
            // Créer des éléments pour chaque détail du film
            const synopsisElement = document.createElement('p');
            synopsisElement.textContent = `Synopsis : ${data.overview}`;

            const revenueElement = document.createElement('p');
            revenueElement.textContent = `Revenus : ${data.revenue} $`;

            const budgetElement = document.createElement('p');
            budgetElement.textContent = `Budget : ${data.budget} $`;

            const releaseDate = new Date(data.release_date);
            const formattedReleaseDate = releaseDate.toLocaleDateString('fr-FR');
            const releaseDateElement = document.createElement('p');
            releaseDateElement.textContent = `Sortie : ${formattedReleaseDate}`;

            const imdbRatingElement = document.createElement('p');
            imdbRatingElement.textContent = `Note IMDB : ${data.vote_average} / 10`;

            const genres = data.genres.map(genre => genre.name).join(' - ');
            const genresElement = document.createElement('p');
            genresElement.textContent = `Genres : ${genres}`;

            // Sélectionner l'élément où vous souhaitez ajouter les détails
            const detailsElement = document.getElementById('details');

            // Ajouter chaque élément au DOM en tant qu'enfant de detailsElement
            detailsElement.appendChild(genresElement);
            detailsElement.appendChild(releaseDateElement);
            detailsElement.appendChild(budgetElement);
            detailsElement.appendChild(revenueElement);
            detailsElement.appendChild(imdbRatingElement);
            detailsElement.appendChild(synopsisElement);
            

        })
        .catch(error => console.error('Erreur lors de la récupération des détails du film :', error));
});

