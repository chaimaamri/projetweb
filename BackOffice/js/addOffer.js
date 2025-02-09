// Partie 1 : Validation avec onClick
function validerFormulaire() {
    // Récupérer les valeurs des champs
    const titre = document.getElementById('title').value.trim();
    const destination = document.getElementById('destination').value.trim();
    const departureDate = new Date(document.getElementById('departure_date').value);
    const returnDate = new Date(document.getElementById('return_date').value);
    const price = parseFloat(document.getElementById('price').value);

    // Variable pour vérifier si le formulaire est valide
    let isValid = true;

    // Validation du titre
    if (titre.length < 3) {
        alert("Le titre doit contenir au moins 3 caractères.");
        isValid = false;
    }

    // Validation de la destination
    const destinationRegex = /^[A-Za-z\s]{3,}$/;
    if (!destinationRegex.test(destination)) {
        alert("La destination doit contenir uniquement des lettres et des espaces, et au moins 3 caractères.");
        isValid = false;
    }

    // Validation des dates
    if (isNaN(departureDate.getTime())) {
        alert("La date de départ doit être une date valide.");
        isValid = false;
    }

    if (isNaN(returnDate.getTime())) {
        alert("La date de retour doit être une date valide.");
        isValid = false;
    }

    if (returnDate <= departureDate) {
        alert("La date de retour doit être ultérieure à la date de départ.");
        isValid = false;
    }

    // Validation du prix
    if (isNaN(price) || price <= 0) {
        alert("Le prix doit être un nombre positif.");
        isValid = false;
    }

    // Si tout est valide, afficher un message de succès
    if (isValid) {
        alert("Le formulaire est valide. L'offre peut être ajoutée.");
    }

    return isValid;
}

// Partie 2 : Validation avec addEventListener et affichage des messages d'erreur/succès
document.addEventListener('DOMContentLoaded', function () {
    // Récupérer le formulaire
    const form = document.getElementById('addTravelOfferForm');

    // Récupérer les champs
    const titleInput = document.getElementById('title');
    const destinationInput = document.getElementById('destination');

    // Ajouter les événements 'keyup' pour la validation en temps réel
    titleInput.addEventListener('keyup', function () {
        validateTitle();
    });

    destinationInput.addEventListener('keyup', function () {
        validateDestination();
    });

    // Ajouter un écouteur d'événement pour l'événement 'submit'
    form.addEventListener('submit', function (event) {
        // Empêcher la soumission du formulaire par défaut
        event.preventDefault();

        // Réinitialiser les messages d'erreur et de succès précédents
        clearMessages();

        let isValid = true;

        // Vérifier les champs en utilisant les fonctions de validation
        if (!validateTitle()) isValid = false;
        if (!validateDestination()) isValid = false;

        // Validation des autres champs
        const departureDateValue = document.getElementById('departure_date').value;
        const returnDateValue = document.getElementById('return_date').value;
        const price = parseFloat(document.getElementById('price').value);

        // Validation des dates
        if (!departureDateValue) {
            showError('departure_date-error', 'Please select a valid departure date.');
            isValid = false;
        } else {
            showSuccess('departure_date-error', 'Correct');
        }

        if (!returnDateValue) {
            showError('return_date-error', 'Please select a valid return date.');
            isValid = false;
        } else {
            showSuccess('return_date-error', 'Correct');
        }

        if (departureDateValue && returnDateValue) {
            const departureDate = new Date(departureDateValue);
            const returnDate = new Date(returnDateValue);

            if (returnDate <= departureDate) {
                showError('return_date-error', 'The return date must be after the departure date.');
                isValid = false;
            } else {
                showSuccess('return_date-error', 'Correct');
            }
        }

        // Validation du prix
        if (isNaN(price) || price <= 0) {
            showError('price-error', 'The price must be a positive number.');
            isValid = false;
        } else {
            showSuccess('price-error', 'Correct');
        }

        // Si tout est valide
        if (isValid) {
            showGlobalSuccess('The form is valid. The offer can be added.');

            // Réinitialiser tous les champs du formulaire
            form.reset();

            // Effacer les messages après 3 secondes
            setTimeout(() => {
                clearMessages();
            }, 3000);
        }
    });

    // Fonction de validation du titre
    function validateTitle() {
        const titre = titleInput.value.trim();
        if (titre.length < 3) {
            showError('title-error', 'The title must contain at least 3 characters.');
            return false;
        } else {
            showSuccess('title-error', 'Correct');
            return true;
        }
    }

    // Fonction de validation de la destination
    function validateDestination() {
        const destination = destinationInput.value.trim();
        const destinationRegex = /^[A-Za-z\s]{3,}$/;
        if (!destinationRegex.test(destination)) {
            showError('destination-error', 'The destination must contain only letters and at least 3 characters.');
            return false;
        } else {
            showSuccess('destination-error', 'Correct');
            return true;
        }
    }

    // Fonction pour afficher un message d'erreur sous un champ
    function showError(errorId, message) {
        const errorMessage = document.getElementById(errorId);
        if (errorMessage) {
            errorMessage.textContent = message;
            errorMessage.style.color = 'red';
        }
    }

    // Fonction pour afficher un message de succès sous un champ
    function showSuccess(errorId, message) {
        const successMessage = document.getElementById(errorId);
        if (successMessage) {
            successMessage.textContent = message;
            successMessage.style.color = 'green';
        }
    }

    // Fonction pour afficher un message de succès global
    function showGlobalSuccess(message) {
        const existingMessage = document.getElementById('global-success-message');
        if (existingMessage) {
            existingMessage.remove();
        }

        const globalMessage = document.createElement('div');
        globalMessage.id = 'global-success-message';
        globalMessage.textContent = message;
        globalMessage.style.color = 'green';
        globalMessage.style.marginTop = '20px';
        globalMessage.style.textAlign = 'center';
        form.appendChild(globalMessage);
    }

    // Fonction pour effacer tous les messages d'erreur et de succès précédents
    function clearMessages() {
        document.querySelectorAll('.error-message').forEach(function (message) {
            message.textContent = '';
        });

        const globalMessage = document.getElementById('global-success-message');
        if (globalMessage) {
            globalMessage.remove();
        }
    }
});

