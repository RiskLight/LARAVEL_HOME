let valueRequest = document.querySelector('#value').getAttribute('data-set-value');
let selects = document.querySelectorAll('select[name=genre]');
if (valueRequest !== null) {
    selects.forEach(select => {
        select.value = valueRequest;
        select.setAttribute('selected', true);
    })
}

let valueRequestYear = document.querySelector('#value-year').getAttribute('data-set-value');
let selectsYear = document.querySelectorAll('select[name=year]');
if (valueRequestYear !== null) {
    selectsYear.forEach(selectYear => {
        selectYear.value = valueRequestYear;
        selectYear.setAttribute('selected', true);
    })
}



