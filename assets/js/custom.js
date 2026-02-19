// Highlight the active menu item based on the current URL path
document.addEventListener('DOMContentLoaded', () => {
    const menuItems = document.querySelectorAll('#navmenu li');

    // Get the current page's pathname
    const currentPath = window.location.pathname;

    // Get the current path saved in the local storage if the menu has subpage
    let menuLink = localStorage.getItem('menu_link');
    let localStoragePath = false;

    menuItems.forEach(item => {
        const link = item.querySelector('a');
        
        if (link) {
            if (menuLink) {
                const parsed = new URL(link.getAttribute('href'));
                const result = parsed.pathname + parsed.hash;
                
                localStoragePath = result.includes(menuLink);
            }
            
            if (localStoragePath) {
                link.classList.add('active');

                if (item.parentElement.classList.contains("side-nav-second-level")) {
                    item.closest('li').classList.add('active');
                }
            }
        }
    });

    localStorage.removeItem('menu_link');
});