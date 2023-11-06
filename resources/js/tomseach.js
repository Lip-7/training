import axios from "axios";

function getCoordinates(data) {
    const userCoordinates = data.coordinate;
    return userCoordinates.lon + ' ' + userCoordinates.lat;
}

function generateHints(hints) {
    hintsList.innerHTML = ''
    hints.filter((value, key) => {
        if (key < 5) {
            const singleHint = document.createElement('li')
            singleHint.textContent = value.address.freeformAddress;
            singleHint.addEventListener('click', (e) => {
                hintsList.innerHTML = '';
                addressInput.value = e.target.textContent;
                coordinateInput.value = getCoordinates(value)

            })
            hintsList.appendChild(singleHint);
        }
    })
}

function search() {
    clearTimeout(timeOut);
    timeOut = setTimeout(() => {
        let userSearch = addressInput.value;
        if (userSearch.length > 6) {
            axios.get('http://127.0.0.1:8000/api/geoSearch', {
                params: {
                  query: userSearch
                }
              })
              .then(function (response) {
                  generateHints(response.data.shortAnswer);
              })
              .catch(function (error) {
                console.log(error);
              })
              .finally(function () {

              });
        }
    }, 500);
}

let timeOut;
const coordinateInput = document.getElementById('coordinates');
const hintsList = document.querySelector('.userAddressHints')
const addressInput = document.querySelector('.userAddressInput');
addressInput.addEventListener('input', search);
console.log(addressInput.value);
