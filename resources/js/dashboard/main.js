document.querySelector('.sidebar-toggler').addEventListener('click', () => {
    document.querySelector('.main-content').classList.toggle('colapsed');
    document.querySelector('.nav-main').classList.toggle('colapsed');
    document.querySelector('.nav-secondary').classList.toggle('collapsed');
});

const now = new Date();
const fechaHora = now.toLocaleDateString("es-VE", {
    year: "numeric",
    month: "long",
    day: "2-digit"
});
const hora = now.toLocaleTimeString("es-VE", {
    hour: "2-digit",
    minute: "2-digit",
    hour12: true // Cambiado a formato 12 horas
});


document.querySelector("#spanHora").innerHTML = ` ${fechaHora}, ${hora}`;