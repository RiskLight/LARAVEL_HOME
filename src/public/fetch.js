
let inputAll = document.querySelectorAll('.class input')

let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

let url = document.querySelector('.class').getAttribute('action');



inputAll.forEach(input => input.addEventListener('click', function () {
    let value = this.dataset.itemValue;
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
            points: value,
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
