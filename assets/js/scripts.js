document.addEventListener('DOMContentLoaded', () => {

    // Toggle login/signup forms
    let hash = location.hash;
    if (hash === '#login') {
        showLoginForm();
    }
    // Show login form
    const showLoginBtns = document.querySelectorAll('.show-login');
    Array.from(showLoginBtns).forEach(elem => {
        elem.addEventListener('click', showLoginForm );
    });
    // Show signup form
    const showSignupBtns = document.querySelectorAll('.show-signup');   
    Array.from(showSignupBtns).forEach(elem => {
        elem.addEventListener('click', showSignupForm ); 
    });


    function showLoginForm() {
        document.querySelector('#signup-form').classList.add('hide');
        document.querySelector('#login-form').classList.remove('hide');
    }

    function showSignupForm() {
        document.querySelector('#signup-form').classList.remove('hide');
        document.querySelector('#login-form').classList.add('hide');
    }


    // Set active nav link
    let pathname = location.pathname;
    let page = pathname.substring(pathname.lastIndexOf('/')+1);

    let activeLink = document.querySelector('.nav-link.active');
    if (activeLink) {
        activeLink.classList.remove('active');
    }
    const navItems = document.querySelectorAll('.nav-link');

    Array.from(navItems).forEach(elem => {
        let href = elem.href;
        let linkPage = href.substring(href.lastIndexOf('/')+1);

        if (linkPage === page) {
            elem.classList.add('active');
        }
    })

});