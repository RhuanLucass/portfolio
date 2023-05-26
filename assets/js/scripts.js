const icon = document.querySelector('.icon-bars');
const bar = document.querySelector('.bar');
const barTop = document.querySelector('.bar-top');
const barBottom = document.querySelector('.bar-bottom');
const mobile = document.querySelector('header nav');
const links = document.querySelectorAll('header nav ul li a');
const overlay = document.querySelector('.overlay');
var heightMenu = 0;

icon.addEventListener('click', transformIcon);

function transformIcon(e) {
  e.preventDefault;
  !bar.classList.contains("rotate") ? showMenu() : hideMenu();
}

links.forEach((link) => {
  link.addEventListener("click", hideMenu);
});

overlay.addEventListener("click", hideMenu);

function hideMenu() {
  bar.classList.remove("rotate");
  barTop.classList.remove("rotate-top");
  barBottom.classList.remove("rotate-bottom");
  mobile.classList.remove("desktop-toggle");
  overlay.style.visibility = "hidden";
}

function showMenu() {
  bar.classList.add("rotate");
  barTop.classList.add("rotate-top");
  barBottom.classList.add("rotate-bottom");
  mobile.classList.add("desktop-toggle");
  overlay.style.visibility = "visible";
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

const linksMenu = document.querySelectorAll('header nav ul li a[href^="#"]');
let scrolled = false;

linksMenu.forEach((value) => value.addEventListener("click", scrollId));

function scrollId(e){
  e.preventDefault();

  if(scrolled === false){
    const element = e.target;
    const to = getScrollTop(element) - 50;

    smoothScrollTo(to, 2000);
    scrolled = true;
    setTimeout(() => {
      scrolled = false;
      
      document.querySelector('.current').classList.remove('current');
      element.classList.add('current');
    }, 1500);
  }

}

function getScrollTop(element){
  const id = element.getAttribute("href");
  return document.querySelector(id).offsetTop;
}

function smoothScrollTo(endY, duration) {
  const startY = window.scrollY || window.pageYOffset;
  const distanceY = endY - startY;
  const startTime = new Date().getTime();

  duration = typeof duration !== "undefined" ? duration : 400;

  const easeInOutQuart = (time, from, distance, duration) => {
    if ((time /= duration / 2) < 1)
      return (distance / 2) * time * time * time * time + from;
    return (-distance / 2) * ((time -= 2) * time * time * time - 2) + from;
  };

  const timer = setInterval(() => {
    const time = new Date().getTime() - startTime;
    const newY = easeInOutQuart(time, startY, distanceY, duration);
    if (time >= duration) {
      clearInterval(timer);
    }
    window.scroll(0, newY);
  }, 1000 / 60); // 60 fps
}
