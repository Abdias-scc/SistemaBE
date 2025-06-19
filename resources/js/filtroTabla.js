//Script para el ordenado de la tabla
function sortTable(columnIndex) {
    const table = document.getElementById('sortable-table');
    const tbody = table.querySelector('tbody');
    const rows = Array.from(tbody.querySelectorAll('tr'));
    let direction = 'asc';

    // Verificar si ya está ordenado por esta columna
    if (table.getAttribute('data-sort-column') == columnIndex) {
        direction = table.getAttribute('data-sort-direction') === 'asc' ? 'desc' : 'asc';
    }

    // Ordenar las filas
    rows.sort((a, b) => {
        const aValue = a.cells[columnIndex].textContent.trim().toLowerCase();
        const bValue = b.cells[columnIndex].textContent.trim().toLowerCase();

        // Ordenar siempre como string, de la A a la Z o Z a A, sin importar si es número
        if (direction === 'asc') {
        return aValue.localeCompare(bValue, 'es', { numeric: false });
        } else {
        return bValue.localeCompare(aValue, 'es', { numeric: false });
        }
    });

    // Reconstruir la tabla
    tbody.innerHTML = '';
    rows.forEach(row => tbody.appendChild(row));

    // Actualizar indicadores visuales (solo una flecha)
    const headers = table.querySelectorAll('th');
    headers.forEach((header, index) => {
        // Limpiar todas las flechas primero
        header.innerHTML = header.textContent.replace(/ ↑| ↓/g, '');

        // Agregar flecha solo a la columna actualmente ordenada
        if (index === columnIndex) {
            header.innerHTML += direction === 'asc' ? ' ↑' : ' ↓';
        }
    });

    // Guardar estado de ordenamiento
    table.setAttribute('data-sort-column', columnIndex);
    table.setAttribute('data-sort-direction', direction);
}
// Exponer la función para que pueda ser llamada desde el HTML
window.sortTable = sortTable;