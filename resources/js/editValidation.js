// let button = document.getElementById("button");
// const form = document.querySelector("form");
// const errorCheck = document.getElementById("error-check");
// const errorRadio = document.getElementById("error-radio");
// console.log(form);

// const fields = {
//   name: { element: document.getElementById("name"), error: document.getElementById("error-name"), errorMessage: "Il nome è obbligatorio" },
//   mq: { element: document.getElementById("mq"), error: document.getElementById("error-mq"), errorMessage: "I mq non sono validi" },
//   address: { element: document.getElementById("address"), error: document.getElementById("error-address"), errorMessage: "L'indirizzo non è valido" },
//   photo: { element: document.getElementById("photo"), error: document.getElementById("error-photo"), errorMessage: "La foto è obbligatoria" },
//   rooms: { element: document.getElementById("rooms"), error: document.getElementById("error-rooms"), errorMessage: 'Le camere non possono essere 0' },
//   beds: { element: document.getElementById("beds"), error: document.getElementById("error-beds"), errorMessage: 'I bagni non possono essere 0' },
//   bathrooms: { element: document.getElementById("bathrooms"), error: document.getElementById("error-bathrooms"), errorMessage: "I letti non possono essere 0" },
// };


// button.addEventListener("input", function (e) {
//   e.preventDefault();

//   let isInvalid = false;

//   for (const field in fields) {
//     const value = fields[field].element.value;
//     const errorElement = fields[field].error;
//     const errorMessage = fields[field].errorMessage;
//     if (value === "" || (field === "rooms" || field === "beds" || field === "bathrooms") && parseInt(value) == 0) {
//         errorElement.textContent = errorMessage;
//         isInvalid = true
//     } else {
//       errorElement.textContent = '';
//     }
//   }
  
//   const checkboxes = document.querySelectorAll("input[type = 'checkbox']");
//   const checkedCheckbox = [...checkboxes].filter(checkbox => checkbox.checked);

//   if (checkedCheckbox.length == 0) {
//     errorCheck.textContent = "Seleziona almeno un servizio"
//     isInvalid = true
//   } else {
//     errorCheck.textContent = ''
//   }
  
//   const radioBox = document.querySelectorAll("input[type='radio']")
//   const checkedRadio = [...radioBox].filter(radio => radio.checked);
//   if (checkedRadio.length == 0) {
//     errorRadio.textContent = 'Il campo è obbligatorio'
//     isInvalid = true
//   } else {
//     errorRadio.textContent = ''
//   }

//   if (!isInvalid) {
//     form.submit()
//   }

// });

