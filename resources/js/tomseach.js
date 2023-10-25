import axios from "axios";

function generateHints(hints) {
    hintsList.innerHTML = ''
    hints.filter((value, key) => {
        if (key < 5) {
            const singleHint = document.createElement('li')
            singleHint.textContent = value.address.freeformAddress;
            hintsList.appendChild(singleHint);
        }
    })
}

function search() {
    let userSearch = addressInput.value;
    console.log(userSearch);
    if (userSearch.length > 3) {
        console.log('avviamo chiamata axios', userSearch);
        axios.get('http://127.0.0.1:8000/api/search', {
            params: {
              query: userSearch
            }
          })
          .then(function (response) {
              console.log(response.data.shortAnswer);
              generateHints(response.data.shortAnswer);
          })
          .catch(function (error) {
            console.log(error);
          })
          .finally(function () {

          });
    }
}

const hintsList = document.querySelector('.userAddressHints')
const addressInput = document.querySelector('.userAddressInput');
addressInput.addEventListener('input', search);
console.log(addressInput.value);
