document.querySelector('.sidebar-toggler').addEventListener('click', () => {
    document.querySelector('.main-content').classList.toggle('colapsed');
    document.querySelector('.nav-main').classList.toggle('colapsed');
    document.querySelector('.nav-secondary').classList.toggle('collapsed');
});

const date = new Date().toLocaleTimeString("es-VE", {
    hour12: false,
    hour: "2-digit",
    minute: "2-digit",
    second: "2-digit",
  });

  document.querySelector("#hora").innerHTML = `Hora Actual: ${date}`;