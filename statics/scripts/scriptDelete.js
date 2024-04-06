
    // Récupération des éléments DOM
    const openModalButton = document.getElementById("openModal");
    const closeModalButton = document.getElementById("closeModal");
    const cancelDeleteButton = document.getElementById("cancelDelete");
    const confirmationModal = document.getElementById("confirmationModal");

    // Ajout d'un gestionnaire d'événement pour ouvrir la boîte de dialogue modale
    openModalButton.addEventListener("click", function() {
        confirmationModal.style.display = "block";
    });

    // Ajout d'un gestionnaire d'événement pour fermer la boîte de dialogue modale
    closeModalButton.addEventListener("click", function() {
        confirmationModal.style.display = "none";
    });

    // Ajout d'un gestionnaire d'événement pour annuler la suppression du compte
    cancelDeleteButton.addEventListener("click", function() {
        confirmationModal.style.display = "none";
    });
