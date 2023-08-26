// Show/hide subnav
const parentMenuItem = document.querySelector('.menu-item li.page_item_has_children');
const subnav = parentMenuItem.querySelector('.children');

function showSubnav() {
    subnav.style.display = 'block';
}

function hideSubnav() {
    subnav.style.display = 'none';
}

parentMenuItem.addEventListener('mouseenter', showSubnav);
parentMenuItem.addEventListener('mouseleave', hideSubnav);

// Disable clickable icon in mobile menu
const isTouchScreen = 'ontouchstart' in window || navigator.maxTouchPoints > 0 || navigator.msMaxTouchPoints > 0;
const firstLink = parentMenuItem.querySelector('a');

function toggleEvents() {
    if (isTouchScreen || window.innerWidth < 570) {
        const spanElement = document.createElement('span');
        firstLink.replaceWith(spanElement);

        firstLink.removeEventListener('mouseenter', showSubnav);
        firstLink.addEventListener('click', showSubnav);
    }
}

window.addEventListener('resize', toggleEvents);
window.addEventListener('load', toggleEvents);
