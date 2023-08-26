// Desktop

const parentMenuItem = document.querySelector('.menu-item li.page_item_has_children');
const subnav = parentMenuItem.querySelector('.children');
const firstLink = parentMenuItem.querySelector('a');

const showSubnav = () => {
    subnav.style.display = 'block';
};

const hideSubnav = () => {
    subnav.style.display = 'none';
};

const menuOpen = elem => {
    elem.classList.remove('menu-close');
    elem.classList.add('menu-open');
};

const menuClose = elem => {
    elem.classList.remove('menu-open');
    elem.classList.add('menu-close');
};

parentMenuItem.addEventListener('mouseenter', showSubnav);
parentMenuItem.addEventListener('mouseleave', hideSubnav);
parentMenuItem.addEventListener('mouseenter', () => menuOpen(firstLink));
parentMenuItem.addEventListener('mouseleave', () => menuClose(firstLink));

// Mobile

const isTouchScreen = 'ontouchstart' in window || navigator.maxTouchPoints > 0 || navigator.msMaxTouchPoints > 0;

const toggleEvents = () => {
    if (isTouchScreen || window.innerWidth < 570) {
        const spanElement = document.createElement('span');
        firstLink.replaceWith(spanElement);

        parentMenuItem.removeEventListener('mouseenter', showSubnav);
        parentMenuItem.removeEventListener('mouseleave', hideSubnav);

        parentMenuItem.addEventListener('click', () => {
            if (subnav.style.display === 'block') {
                menuClose(spanElement);
                hideSubnav();
            } else {
                menuOpen(spanElement);
                showSubnav();
            }
        });
    }
};

window.addEventListener('resize', toggleEvents);
window.addEventListener('load', toggleEvents);
