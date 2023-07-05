// selection des champs
const telephoneInput = document.getElementById('telephone');
// const promotionInput = document.getElementById('promotion');
const anneeCertInput = document.getElementById('annee_cert');

const submitButton = document.querySelector('.submit-button');
const telephoneError = document.querySelector('.telephone-error');
// const promotionError = document.querySelector('.promotion-error');
const anneeCertError = document.querySelector('.annee_cert-error');

telephoneInput.addEventListener('change', managementTelephone);
// promotionInput.addEventListener('change', managementPromotion);
anneeCertInput.addEventListener('change', managementAnneeCert);
submitButton.addEventListener('click', submitForm);


// Creation de mes modeles d'expression reguliere
const reTelephone = new RegExp("^[0-9]{8}$"); // le g indique que l'expression doit être evaluée globalement sur l'ensemble de la chaine
// const rePromotion = new RegExp("^P[0-9]+$"); // le g indique que l'expression doit être evaluée globalement sur l'ensemble de la chaine
const reAnneeCert = new RegExp("^[0-9]{4}$", "g"); // le g indique que l'expression doit être evaluée globalement sur l'ensemble de la chaine

// Creation des fonctions de gestion des élément
function managementTelephone(event) {
    const telephoneValue = event.target.value;
    let isSuccess = reTelephone.test(telephoneValue);
    if (!isSuccess) {
        telephoneError.textContent = 'Le format du numero de téléphone est incorrecte';
    } else {
        telephoneError.textContent = '';
    }

}

// function managementPromotion(event) {
//     const promotionValue = event.target.value;
//     let isSuccess = rePromotion.test(promotionValue);
//     if (!isSuccess) {
//         promotionError.textContent = 'Le format de la promotion est incorrecte';
//     } else {
//         promotionError.textContent = '';
//     }
// }

function managementAnneeCert(event) {
    const anneeCertValue = event.target.value;
    let isSuccess = reAnneeCert.test(anneeCertValue);
    if (!isSuccess) {
        anneeCertError.textContent = "Le format de l'année de certification est incorrecte";
    } else {
        anneeCertError.textContent = '';
    }
}