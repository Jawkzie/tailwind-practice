const logIn = document.querySelector('.modal-login');
const openModal = document.querySelector('#login')
const closeModal = document.querySelector('.close-modal')

const modal = function() {
    logIn.classList.remove("invisible");
}

const close = function() {
    logIn.classList.add("invisible");
}

openModal.addEventListener("click", modal);

closeModal.addEventListener("click", close)