/** Spotlight Effect */

const gradient = document.querySelector('.is-style-group-spotlight');

function onMouseMove(event) {
	gradient.style.backgroundImage =
		'radial-gradient(at ' +
		event.clientX +
		'px ' +
		event.clientY +
		'px, rgba(24, 93, 106, 0) 0, #1F3A47 70%)';
}
document.addEventListener('mousemove', onMouseMove);
