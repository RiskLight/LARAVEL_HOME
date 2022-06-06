// POST Request
const inputAll = document.querySelectorAll('.class input');

const token = document.querySelector('input[name="csrf-token"]').getAttribute('content');

const url = document.querySelector('.class').getAttribute('action');

inputAll.forEach(input => input.addEventListener('click', function () {
    let points = this.dataset.itemValue;
    let filmId = document.querySelector('.hide').getAttribute('data-set-value');
    fetch(url, {
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json, text-plain, */*",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-TOKEN": token
        },
        method: 'POST',
        credentials: "same-origin",
        body: JSON.stringify({
            points: points,
            votes: points,
            film_id: filmId
        })
    })
        .then(response => {
            return response.text();
        })
        .then(text => {
            return console.log(text);
        })
        .catch(function(error) {
            console.log(error);
        });
}))

//GET Request
const urlGetMethod = document.querySelector('input[name="get-rate"]').getAttribute('content');

fetch(urlGetMethod)
    .then( response => response.json() )
    .then( response => {
        // Do something with response.
    } );

