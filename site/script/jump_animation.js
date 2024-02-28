document.addEventListener('DOMContentLoaded', function() {
    const arrowDown = document.querySelector('.arrow-down');
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
});