export function setupSearch(inputId, buttonId, searchRoute) {
    const input = document.getElementById(inputId);
    const button = document.getElementById(buttonId);

    if (!input || !button) return; // Si no existen los elementos, salir

    button.addEventListener('click', () => {
        const feedback = input.parentNode.querySelector('.invalid-feedback');
        if (feedback) feedback.remove();

        if (input.value.trim() === '') {
            showError(input, 'El campo de búsqueda no puede estar vacío.');
            input.focus();
        } else {
            input.classList.remove('is-invalid');
            const searchValue = input.value.trim().toLowerCase();
            window.location.href = `${searchRoute}?search=${encodeURIComponent(searchValue)}`;
        }
    });

    input.addEventListener('input', () => clearError(input));
    input.addEventListener('blur', () => validateOnBlur(input));
    input.addEventListener('keydown', (event) => {
        if (event.key === 'Enter') {
            event.preventDefault(); // Evitar el envío del formulario
            button.click(); // Simular clic en el botón de búsqueda
        }
    });
}

// Funciones auxiliares (privadas)
function showError(input, message) {
    input.classList.add('is-invalid');
    const feedback = document.createElement('div');
    feedback.className = 'invalid-feedback';
    feedback.textContent = message;
    input.parentNode.appendChild(feedback);
}

function clearError(input) {
    input.classList.remove('is-invalid');
    const feedback = input.parentNode.querySelector('.invalid-feedback');
    if (feedback) feedback.remove();
}

function validateOnBlur(input) {
    clearError(input);
    if (input.value.trim() === '') {
        showError(input, 'El campo de búsqueda no puede estar vacío.');
    }
}