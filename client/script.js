$(document).ready(function(){
    $(window).scroll(function(){
        if(this.scrollY > 20){
            $('.navbar').addClass("sticky");
        }else{
            $('.navbar').removeClass("sticky");
        }
        if(this.scrollY > 500){
            $('.scroll-up-btn').addClass("show");
        }else{
            $('.scroll-up-btn').removeClass("show");
        }
    }); // slide-up script
$('.scroll-up-btn').click(function(){
    $('html').animate({scrollTop: 0});
});

//toogle menu
$('.menu-btn').click(function(){
    $('.navbar .menu').toggleClass("active");
    $('.menu-btn i').toggleClass("active");
});

// owl carousel
$('.carousel').owlCarousel({
    margin: 10,
    loop: true,
    autoplayTimeOut: 2000,
    autoplayHoverPause: true,
    responsive: {
        0:{
            items: 1,
            nav: false
        },
        600:{
         items: 4,
         nav: false
        },
        1000:{
         items: 4,
         nav: false
        }
    }
});
});
 
// Show popup
const showPopupBtn = document.querySelector(".login-btn");
const formPopup = document.querySelector(".form-popup");
const hidePopupBtn = document.querySelector(".form-popup .close-btn");
const loginSignupLink = document.querySelectorAll(".form-box .bottom-link a");

showPopupBtn.addEventListener("click", () => {
    console.log("Login button clicked");
    document.body.classList.add("show-popup");
});

// Hide popup
hidePopupBtn.addEventListener("click", () => {
    document.body.classList.remove("show-popup");
});

loginSignupLink.forEach(link => {
    link.addEventListener("click", (e) => {
        e.preventDefault();
        formPopup.classList[link.id === "signup-link" ? 'add' : 'remove']("show-signup");
    });
});

// Function to attempt login
function attemptLogin() {
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;

    // Simplified example: Check if email and password are correct
    if (email === 'example@email.com' && password === 'password123') {
        // Handle successful login
        console.log('Login successful');
    } else {
        // Handle incorrect login
        console.log('Login failed, try again');
        // You can display an error message to the user or perform other actions
        // but don't remove the "show-popup" class to keep the modal visible
    }
}

