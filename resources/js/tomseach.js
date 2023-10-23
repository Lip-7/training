import axios, { Axios } from "axios";

function search() {
    let userSearch = addressInput.value;
    axios.get('/user', {
        params: {
          ID: 12345
        }
      })
      .then(function (response) {
        console.log(response);
      })
      .catch(function (error) {
        console.log(error);
      })
      .finally(function () {
        // always executed
      });
}

const addressInput = document.querySelector('userAddressInput');
addressInput.addEventListener('change', search);
