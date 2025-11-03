document.addEventListener("DOMContentLoaded", () => {
    const button1 = document.querySelector("#lihatSemua");
    const button2 = document.querySelector("#tambahVideo");
    button1.addEventListener("click", (e) => {
        e.preventDefault(); 
        button1.classList.add("active");
        button2.classList.remove("active");
    });

    button2.addEventListener("click", (e) => {
        e.preventDefault();
        button2.classList.add("active");
        button1.classList.remove("active");
    });
});
