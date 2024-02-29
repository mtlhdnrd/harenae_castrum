document.addEventListener('DOMContentLoaded', function() {
    const arrowDown = document.querySelector('.arrow-down');
    const arrowUp = document.querySelector('.arrow-up');

    arrowDown.addEventListener('click', function() {
        jumpTo('bottom');
    });

    arrowUp.addEventListener('click', function() {
        jumpTo('top');
    });

    // Function to scroll or jump to a specified position
    function jumpTo(destination) {
        if (destination === 'bottom') {
            window.scrollTo({
                top: document.body.scrollHeight,
                behavior: 'smooth'
            });
            arrowDown.style.display = 'none';
            arrowUp.style.display = 'block';
        } else if (destination === 'top') {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
            arrowUp.style.display = 'none';
            arrowDown.style.display = 'block';
        }
    }

    // Event listener to detect scrolling
    window.addEventListener('scroll', function() {
        const isAtTop = arrowDown.style.display === "block";

        if(isAtTop) {
            arrowUp.style.display = 'none';
            arrowDown.style.display = 'block';
        } else {
            arrowDown.style.display = 'none';
            arrowUp.style.display = 'block';
        }
    });
});

function openOverlay() {
    document.getElementById('overlay').style.display = 'block';
  }

  function closeOverlay() {
    document.getElementById('overlay').style.display = 'none';
  }