const header = document.querySelector('#header');
const btnSenha = document.querySelector('#mostrar');
const inputSenha = document.querySelector('#senha');
const iconSenha = document.querySelector('#iconSenha');

window.addEventListener('scroll', () => {
    if(window.scrollY >= 20){
        header.style.backgroundColor = '#00050d';
    }else {
        header.style.backgroundColor = 'transparent';
    }
});

inputSenha.addEventListener('input', () => {
    if(inputSenha.value.length > 0){
        btnSenha.classList.remove('hidden');
        inputSenha.classList.remove('rounded-xl');
        inputSenha.classList.add('rounded-s-xl');
    }else{
        btnSenha.classList.add('hidden');
        inputSenha.classList.remove('rounded-s-xl');
        inputSenha.classList.add('rounded-xl');
        if(inputSenha.type == 'text'){
            iconSenha.classList.remove('fa-eye-slash');
            iconSenha.classList.add('fa-eye');
            inputSenha.type = 'password';
        }
    }
});

btnSenha.addEventListener('click', () => {
    if(iconSenha.classList.contains('fa-eye')){
        iconSenha.classList.remove('fa-eye');
        iconSenha.classList.add('fa-eye-slash');
        inputSenha.type = 'text';
    }else if(iconSenha.classList.contains('fa-eye-slash')){
        iconSenha.classList.remove('fa-eye-slash');
        iconSenha.classList.add('fa-eye');
        inputSenha.type = 'password';
    }
});
