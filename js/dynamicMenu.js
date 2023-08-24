const isTouchScreen = 'ontouchstart' in window || navigator.maxTouchPoints > 0 || navigator.msMaxTouchPoints > 0;

const parentMenuItem = document.querySelector('.menu-item li.page_item_has_children');
const subnav = parentMenuItem.querySelector('.children');

function showSubnav() {
    subnav.style.display = 'block';
}

function hideSubnav() {
    subnav.style.display = 'none';
}

function toggleEvents() {
    const firstLink = parentMenuItem.querySelector('a');

    if (isTouchScreen || window.innerWidth < 570) {
        firstLink.addEventListener('click', showSubnav);
        firstLink.removeEventListener('mouseover', showSubnav);
    } else {
        firstLink.removeEventListener('click', showSubnav);
        firstLink.addEventListener('mouseover', showSubnav);
    }
}

parentMenuItem.addEventListener('mouseover', showSubnav);
parentMenuItem.addEventListener('mouseout', hideSubnav);

window.addEventListener('resize', toggleEvents);
window.addEventListener('load', toggleEvents);

const secondaryMenu = document.getElementById('secondary-menu');
const firstListItem = secondaryMenu.querySelector('ul:first-child > li:first-child');
const firstItem = firstListItem.querySelector('a');

firstItem.textContent = '';

window.addEventListener('resize', () => {
    if (isTouchScreen || window.innerWidth < 570) {
        const spanElement = document.createElement('span');
        spanElement.textContent = '';
        firstItem.replaceWith(spanElement);
    }
});

window.addEventListener('load', () => {
    if (isTouchScreen || window.innerWidth < 570) {
        const spanElement = document.createElement('span');
        spanElement.textContent = '';
        firstItem.replaceWith(spanElement);
    }
});
