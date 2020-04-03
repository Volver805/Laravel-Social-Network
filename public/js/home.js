document.querySelector('#login-button').addEventListener("click",()=> {
    const formDOM = document.querySelector('.login-form');
    if(!formDOM.classList.contains('login-form-toggle'))
        formDOM.classList.add('login-form-toggle');
    else 
        formDOM.classList.remove('login-form-toggle');
})