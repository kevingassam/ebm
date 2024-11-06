// Fonction pour lire un cookie
function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) {
        return decodeURIComponent(parts.pop().split(";").shift());
    }
    return null;
}

// Fonction pour définir un cookie avec une durée de vie de 2 semaines
function setCookie(name, value, days = 14) {
    const date = new Date();
    date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
    document.cookie = `${name}=${encodeURIComponent(
        value
    )}; expires=${date.toUTCString()}; path=/`;
}

// Récupère les IDs stockés dans le cookie et les convertit en tableau
function getStoredIds() {
    const storedIds = getCookie("compareIds");
    return storedIds ? JSON.parse(storedIds) : [];
}

// Stocke le tableau d'IDs dans le cookie
function storeIds(ids) {
    setCookie("compareIds", JSON.stringify(ids));
}

// Vérifie si un ID existe et le retire du tableau si non existant
function checkExist(id) {
    $.ajax({
        url: "/check_exist_appartement/"+id ,
        type: "GET",
        success: function (data) {
            if (!data.exist) {
                const compareIds = getStoredIds();
                compareIds.splice(compareIds.indexOf(id), 1);
                storeIds(compareIds);
                updateCompareCount();
            }
        },
        error: function (xhr, status, error) {
            console.log("Erreur lors de la recherche : " + error);
        },
    });
}

// Met à jour l'affichage du nombre total d'IDs dans la comparaison
function updateCompareCount() {
    const compareIds = getStoredIds();
    const total = compareIds.length;

    if (total > 0) {
        // Vérifie chaque ID pour s'assurer qu'il existe encore
        compareIds.forEach(function (id) {
            checkExist(id);
        });

        $("#count-total-compare").text(total);
        $("#compare-btn").removeClass("d-none");
    } else {
        $("#compare-btn").addClass("d-none");
    }
}

// Au chargement de la page
$(document).ready(function () {
    // Initialise l'affichage du nombre d'éléments dans la comparaison
    updateCompareCount();

    // Gère l'ajout ou la suppression d'un ID au clic
    $(".btn-add-compare").on("click", function () {
        const id = $(this).data("id");
        let compareIds = getStoredIds();

        // Ajoute ou retire l'ID du tableau
        if (compareIds.includes(id)) {
            compareIds = compareIds.filter((item) => item !== id);
        } else {
            compareIds.push(id);
        }

        // Met à jour le cookie et rafraîchit l'affichage
        storeIds(compareIds);
        updateCompareCount();
    });

    // Redirige vers la page de comparaison avec les IDs sélectionnés
    $("#compare-btn").on("click", function () {
        go_to_url();
    });

    // Retire un ID de la comparaison
    $(".btn-retirer-compare").on("click", function () {
        const id = $(this).data("id");
        const compareIds = getStoredIds();

        compareIds.splice(compareIds.indexOf(id), 1);
        storeIds(compareIds);
        updateCompareCount();

        // Recharge la page après la suppression
        go_to_url();
    });

    function go_to_url() {
        const compareIds = getStoredIds();
        if (compareIds.length > 0) {
            const idsParam = compareIds.join(",");
            window.location.href = `/compare?ids=${idsParam}`;
        }
    }
});
