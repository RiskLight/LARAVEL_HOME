const apiURL = 'https://videocdn.tv/api/short?api_token=O0NZvxemcwkiq30bsgQoFKEQX6EqiVl7&title=';

const inputTitle = document.querySelector('#name');

const filmTitle = document.querySelector('#film');

const path = document.querySelector('#film_path');

const year = document.querySelector('#year');

const type = document.querySelector('#standart_id');


inputTitle.onchange = function () {
    getFilms();
}


function getFilms () {
    while (filmTitle.firstChild) {
        filmTitle.firstChild.remove()
    }
    const finalUrl = apiURL + inputTitle.value;
    if (inputTitle.value !== '' && inputTitle.value.length > 5) {
        fetch(finalUrl)
            .then(res => res.json())
            .then(data => {
                data.data.forEach(film => {
                    console.log(film);
                    filmTitle.insertAdjacentHTML('beforeend',
                        `<option value="${film.title}">`);
                    path.setAttribute('value', `${film.iframe_src}`);
                    year.setAttribute('value', `${film.year}`);
                    if (film.type === 'movie') {
                        type.value = '2'
                    }
                    if (film.type === 'serial') {
                        type.value = '1'
                    }
                })
            })
    }
}


