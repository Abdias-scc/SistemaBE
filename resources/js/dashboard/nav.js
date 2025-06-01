const toggleDropdown = (dropdown, menu, isOpen) => {
    dropdown.classList.toggle("open", isOpen);
    menu.style.height = isOpen ? `${menu.scrollHeight}px` : 0;
}

const closeAllDropdowns = () => {
    document.querySelectorAll(".dropdown-container.open").forEach(dropdown => {
        toggleDropdown(dropdown, dropdown.querySelector(".Dropdown-menu"), false);
    });
}
document.querySelectorAll('.Dropdown-toggle').forEach(element => {
    element.addEventListener('click', e => {
        e.preventDefault();
        const  dropdown = e.target.closest(".dropdown-container")
        const menu = dropdown.querySelector(".Dropdown-menu")
        const isOpen = dropdown.classList.contains("open");
        
        // closeAllDropdowns(); //Cierra todos los dropdowns
        toggleDropdown(dropdown, menu, !isOpen);
    });
}); 


document.querySelector('.sidebar-toggler').addEventListener('click', () => {
    closeAllDropdowns();
    document.querySelector('.sidebar').classList.toggle('collapsed');
});