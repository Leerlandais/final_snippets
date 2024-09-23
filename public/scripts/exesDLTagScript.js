const dtElements = document.querySelectorAll('dt');

dtElements.forEach(dt => {
    dt.addEventListener('click', function() {
        this.classList.toggle('active');
        
        const dd = this.nextElementSibling;
        if (dd.style.display === 'block') {
            dd.style.display = 'none';
        } else {
            dd.style.display = 'block';
        }
    });
});