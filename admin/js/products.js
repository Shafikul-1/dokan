function dropdownFunction(button) {
    const dropdownContent = button.nextElementSibling;
    if (dropdownContent) {
        dropdownContent.classList.toggle("hidden");
        console.log("Dropdown toggled. Hidden status:", dropdownContent.classList.contains("hidden"));
    } else {
        console.error("dropdownContent not found");
    }
}

document.addEventListener('click', function(event) {
    if (!event.target.closest('.relative')) {
        document.querySelectorAll('.dropdownContent').forEach(function(dropdown) {
            dropdown.classList.add('hidden');
        });
    }
});