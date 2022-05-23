import axios from 'axios';

console.log('Hello')

axios
    .get("https://videocdn.tv/api/short?api_token=O0NZvxemcwkiq30bsgQoFKEQX6EqiVl7")
    .then(response => {
        console.log("response", response);
    })
    .catch(error => {
        console.log("error", error);
    });
