const icon = document.querySelector('.icon-bars');
const bar = document.querySelector('.bar');
const barTop = document.querySelector('.bar-top');
const barBottom = document.querySelector('.bar-bottom');
const mobile = document.querySelector('header nav');
const links = document.querySelectorAll('header nav ul li a');
var heightMenu = 0;

icon.addEventListener('click', transformIcon);

function transformIcon(e) {
  e.preventDefault;
  !bar.classList.contains("rotate") ? showMenu() : hideMenu();
}

links.forEach((link) => {
  link.addEventListener("click", hideMenu);
});

// overlay.addEventListener("click", hideMenu);

function hideMenu() {
  bar.classList.remove("rotate");
  barTop.classList.remove("rotate-top");
  barBottom.classList.remove("rotate-bottom");
  mobile.classList.toggle("desktop-toggle");
  // overlay.style.display = "none";
}

function showMenu() {
  bar.classList.add("rotate");
  barTop.classList.add("rotate-top");
  barBottom.classList.add("rotate-bottom");
  mobile.classList.toggle("desktop-toggle");
  // overlay.style.display = "block";
}

const html = document.querySelector('html');
const btnMode = document.querySelector('#mode label input');
const animateBg = document.querySelector('#mode label .animate-bg');

btnMode.addEventListener('click', switchMode);

function switchMode(){
  btnMode.checked === true ?
  html.setAttribute('data-theme', 'dark-mode') : 
  html.removeAttribute('data-theme');
}