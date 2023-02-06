document.addEventListener('DOMContentLoaded', function(){
    eventlisteners();
});

function eventlisteners(){
    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenu.addEventListener('click', navegacionResponsive); 
}

function navegacionResponsive(){
    const navegacion = document.querySelector('.navegacion')
      navegacion.classList.toggle('mostrar')
    
}