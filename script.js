const logIn = document.querySelector(".modal");
const openModal = document.querySelector("#login");
const closeModal = document.querySelector(".close-modal");
const openRegister = document.querySelector("#register-btn");
const registerModal = document.querySelector(".register-modal");

const modal = function () {
  logIn.classList.remove("hidden");
  logIn.classList.add("visible");
};

const close = function () {
  logIn.classList.add("hidden");
  logIn.classList.remove("visible");
};

openModal.addEventListener("click", modal);
closeModal.addEventListener("click", close);

openRegister.addEventListener("click", () => {
  registerModal.classList.remove("hidden");
  registerModal.classList.add("flex");
});
