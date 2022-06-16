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

//GET Requests
const urlGetMethod = document.querySelector('input[name="get-rate"]').getAttribute('content');
const urlGetMethodNew = document.querySelector('input[name="get-rate"]').getAttribute('content');

fetch(urlGetMethod)
    .then((response) => {
        return response.json();
    })
    .then((data) => {
        let rate = data;
        let roundRate = Math.round(rate)
        let element = document.querySelector('.star[data-item-value="'+roundRate+'"]');
        element.setAttribute('checked', true);
        let span = document.querySelector('#exact-rating');
        span.textContent = rate;
    });


inputAll.forEach(input => {
    input.addEventListener('click', () =>setTimeout(function () {
        fetch(urlGetMethodNew)
            .then((response) => {
                return response.json();
            })
            .then((data) => {
                let rateNew = data;
                let roundRateNew = Math.round(rateNew)
                let element = document.querySelector('.star[data-item-value="' + roundRateNew + '"]');
                element.setAttribute('checked', true);
                let span = document.querySelector('#exact-rating');
                span.textContent = rateNew;
            });
    }, 2000));
})

function disabledInput () {
    let id = document.querySelector('#for-rate').getAttribute('data-set');
    if (id === 'no-auth') {
        let inputs = document.querySelectorAll('input[type=radio]');
        for( let i = 0; i < inputs.length; i++ ){
            inputs[i].setAttribute('disabled', true);
        }
    }
}

disabledInput();

