const navbar_toggle_menu = document.querySelector(".navbar_toggle_menu");
const navbar_list = document.querySelector(".navbar_list");
let navbar_open = false;

navbar_toggle_menu.addEventListener('click', function() {
    console.log('Navbar toggle menu clicked!');

    if (!navbar_open) {
        navbar_list.style.display = "flex"
        navbar_open = true;
    }
    else {
        navbar_list.style.display = "none"
        navbar_open = false;

    }
   

  });

  window.addEventListener('resize', function() {
    if (window.innerWidth > 1000) {
        navbar_list.style.display = "flex";
        navbar_open = true;
    }
    else {
        navbar_list.style.display = "none";
        navbar_open = false;
    }
});