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
            const parsed = new URL(link.getAttribute('href'));
            const result = parsed.pathname + parsed.hash;
            
            if (menuLink) {
                localStoragePath = result.includes(menuLink);
            }else{
                localStoragePath = result.includes(currentPath);
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

// Match the height of a group of elements (e.g. cards) to the tallest one
function matchGroupHeight(selector) {
    const elements = document.querySelectorAll(selector);
    if (!elements.length) return;

    // Reset heights first so we measure natural height
    elements.forEach(el => el.style.height = "auto");

    // Find tallest height
    let maxHeight = 0;
    elements.forEach(el => {
        if (el.offsetHeight > maxHeight) {
            maxHeight = el.offsetHeight;
        }
    });

    // Apply tallest height to all
    elements.forEach(el => {
        el.style.height = maxHeight + "px";
    });
}

// Example usage
function runMatchHeight() {
    matchGroupHeight(".prog_title");
    matchGroupHeight(".news_title");
}

window.addEventListener("load", runMatchHeight);
window.addEventListener("resize", runMatchHeight);

function loginRedirect(url){
    const baseUrl = window.location.origin;
    Swal.fire({
        icon: 'warning',
        title: 'Login Required',
        text: 'Please log in first before you can proceed.',
        confirmButtonText: 'Go to Login',
        showCancelButton: true,
        cancelButtonText: 'Cancel',  
        allowOutsideClick: false
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = baseUrl + "/proms/login.php"; // change to your login route
        }
    });
}