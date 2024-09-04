
// For handling of the dropdown menus in the sideBar
document.addEventListener("DOMContentLoaded", function () {
    const optionsWithDropdown = document.querySelectorAll(".option-with-dropdown");
    optionsWithDropdown.forEach(function (option) {
        option.addEventListener("click", function () {
            const dropdown = option.querySelector(".dropdown");
            dropdown.classList.toggle("hidden");
        });
    });


    const optionsWithDropdownInner = document.querySelectorAll(".option-with-dropdown-inner");
    optionsWithDropdownInner.forEach(function (option) {
        option.addEventListener("click", function (event) {
            event.stopPropagation();

            const dropdownInner = option.querySelector(".dropdown-inner");
            dropdownInner.classList.toggle("hidden");
        });
    });

}); // end doc Ready