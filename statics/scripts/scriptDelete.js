
    // Récupération des éléments DOM
    const openModalButton = document.getElementById("openModal");
    const cancelDeleteButton = document.getElementById("cancelDelete");
    const confirmationModal = document.getElementById("confirmationModal");

    // Ajout d'un gestionnaire d'événement pour ouvrir la boîte de dialogue modale
    openModalButton.addEventListener("click", function() {
        confirmationModal.style.display = "block";
    });

    // Ajout d'un gestionnaire d'événement pour annuler la suppression du compte
    cancelDeleteButton.addEventListener("click", function() {
        confirmationModal.style.display = "none";
    });
