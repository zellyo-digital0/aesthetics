const header = document.getElementById('header');

// Function to handle scroll event
function handleScroll() {
    // Check the scroll position
    if (window.scrollY > 0) {
        // Add a CSS class to change the background color with smooth transition
        header.classList.add('scrolled');
    } else {
        // Remove the CSS class with smooth transition if the scroll position is at the top
        header.classList.remove('scrolled');
    }
}

// Add scroll event listener to the window
window.addEventListener('scroll', handleScroll);