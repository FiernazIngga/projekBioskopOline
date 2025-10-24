document.addEventListener("DOMContentLoaded", function () {
    const inputPencarian = document.querySelector(".inputPencarian");
    const ikonPencarian = document.querySelector(".ikonPencarian");

    inputPencarian.addEventListener("focus", function () {
        ikonPencarian.style.color = "#e50914";
    });

    inputPencarian.addEventListener("blur", function () {
        ikonPencarian.style.color = "#aaa";
    });
});

function langganan(role, id_user) {
    window.location.href = `?page=bayar&paket=${role}&root=${id_user}`;
}