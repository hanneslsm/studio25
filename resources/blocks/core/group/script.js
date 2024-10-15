/** Spotlight Effect */


document.addEventListener('DOMContentLoaded', function() {
    const gradient = document.querySelector('.is-style-group-spotlight');

    // Ensure the element exists before adding event listeners and manipulating styles
    if (gradient) {
        function onMouseMove(event) {
            gradient.style.backgroundImage =
                'radial-gradient(at ' +
                event.clientX +
                'px ' +
                event.clientY +
                'px, rgba(24, 93, 106, 0) 0, #1F3A47 70%)';
        }

        // Add the mousemove event listener only if the element exists
        document.addEventListener('mousemove', onMouseMove);
    }
});


console.log('Hello Script!');
