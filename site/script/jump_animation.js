document.addEventListener('DOMContentLoaded', function() {
    const arrowDown = document.querySelector('.arrow-down');
    const arrowUp = document.querySelector('.arrow-up');
    const footer = document.querySelector('footer');

    arrowDown.addEventListener('click', function() {
        const isFooterVisible = footer.getBoundingClientRect().top < window.innerHeight;

        if (isFooterVisible) {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        } else {
            window.scrollTo({
                top: document.body.scrollHeight,
                behavior: 'smooth'
            });
        }
    });

    arrowUp.addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    // Function to rotate the arrow icon
    function rotateArrow(degrees) {
        arrowDown.style.display = degrees === 0 ? 'block' : 'none';
        arrowUp.style.display = degrees === 180 ? 'block' : 'none';
    }

    // Event listener to detect scrolling
    window.addEventListener('scroll', function() {
        const isFooterVisible = footer.getBoundingClientRect().top < window.innerHeight;

        if (isFooterVisible) {
            rotateArrow(180); // Rotate the arrow 180 degrees when at the bottom
        } else {
            rotateArrow(0); // Rotate the arrow back to its original position when not at the bottom
        }
    });
});
