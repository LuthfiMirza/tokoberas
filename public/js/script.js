// Enhanced navbar functionality
let menu = document.querySelector('#menu-bars');
let navbar = document.querySelector('.navbar');
let authButtons = document.querySelector('#authButtons');

// Mobile menu toggle
if (menu) {
  menu.onclick = () => {
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
    
    // Also toggle auth buttons on mobile
    if (authButtons && window.innerWidth <= 991) {
      authButtons.classList.toggle('active');
    }
  };
}

// Section highlighting
let sections = document.querySelectorAll('section');
let navLinks = document.querySelectorAll('header .navbar a');

window.onscroll = () => {
  // Close mobile menu on scroll
  if (menu) {
    menu.classList.remove('fa-times');
  }
  if (navbar) {
    navbar.classList.remove('active');
  }
  if (authButtons) {
    authButtons.classList.remove('active');
  }

  // Highlight active section
  sections.forEach(sec => {
    let top = window.scrollY;
    let height = sec.offsetHeight;
    let offset = sec.offsetTop - 150;
    let id = sec.getAttribute('id');

    if (top >= offset && top < offset + height) {
      navLinks.forEach(link => {
        link.classList.remove('active');
      });
      
      let activeLink = document.querySelector(`header .navbar a[href*=${id}]`);
      if (activeLink) {
        activeLink.classList.add('active');
      }
    }
  });
};

// Close mobile menu when clicking outside
document.addEventListener('click', function(e) {
  if (!e.target.closest('header') && menu && navbar && authButtons) {
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');
    authButtons.classList.remove('active');
  }
});

// Handle window resize
window.addEventListener('resize', function() {
  if (window.innerWidth > 991) {
    // Reset mobile menu on desktop
    if (menu) {
      menu.classList.remove('fa-times');
    }
    if (navbar) {
      navbar.classList.remove('active');
    }
    if (authButtons) {
      authButtons.classList.remove('active');
    }
  }
});

// Initialize on page load
window.onload = function () {
  // Hide legacy modals if they exist
  const loginModal = document.getElementById("loginModal");
  const signupModal = document.getElementById("signupModal");
  
  if (loginModal) {
    loginModal.style.display = "none";
  }
  if (signupModal) {
    signupModal.style.display = "none";
  }
  
  // Initialize navbar elements
  menu = document.querySelector('#menu-bars');
  navbar = document.querySelector('.navbar');
  authButtons = document.querySelector('#authButtons');
  
  console.log('Navbar initialized successfully');
};