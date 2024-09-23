// Select all dt and dd elements
const dtElements = document.querySelectorAll('dt');
const ddElements = document.querySelectorAll('dd');

dtElements.forEach(dt => {
    // Add click event listener to each dt element
    dt.addEventListener('click', function() {
        // Close all open dd elements
        ddElements.forEach(dd => {
            dd.style.display = 'none';
        });

        // Remove 'active' class from all dt elements
        dtElements.forEach(dt => {
            dt.classList.remove('active');
        });

        // Toggle the current dd visibility (if it was closed, open it)
        const dd = this.nextElementSibling;
        if (dd.style.display === 'none') {
            this.classList.add('active');
            dd.style.display = 'block';
        }
    });
});