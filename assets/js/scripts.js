const icon = document.querySelector('.icon-bars');
const bar = document.querySelector('.bar');
const barTop = document.querySelector('.bar-top');
const barBottom = document.querySelector('.bar-bottom');
const mobile = document.querySelector('header nav');
const links = document.querySelectorAll('header nav ul li a');
const overlay = document.querySelector('.overlay');

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
  overlay.style.display = "none";
}

function showMenu() {
  bar.classList.add("rotate");
  barTop.classList.add("rotate-top");
  barBottom.classList.add("rotate-bottom");
  mobile.classList.add("desktop-toggle");
  overlay.style.display = "block";
}



const html = document.querySelector('html');
const mode = document.querySelector('#mode label');
const btnMode = mode.querySelector('input');

btnMode.addEventListener('click', switchMode);

function switchMode(){
  btnMode.checked === true ? (() =>{
    html.setAttribute('data-theme', 'dark-mode');
    mode.setAttribute('data-ballon', 'Light Mode');
  })() : (() => {
    html.removeAttribute('data-theme');
    mode.setAttribute('data-ballon', 'Dark Mode');
  })()
}

const linksMenu = document.querySelectorAll('header nav ul li a[href^="#"]');
let scrolled = false;

linksMenu.forEach((value) => value.addEventListener("click", scrollId));

function scrollId(e){
  e.preventDefault();

  if(scrolled === false){
    const element = e.target;
    const to = getScrollTop(element) - 20;

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
  const startY = window.scrollY;
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

const sections = document.querySelectorAll('[data-animation]');

window.addEventListener("scroll", scrollToPosition);

function scrollToPosition(e){
  e.preventDefault();
  const windowTop = window.scrollY + window.innerHeight * 0.85;
  const scrollTop = window.scrollY + window.innerHeight * 0.5;
  
  sections.forEach((element) => {
    if(windowTop > element.offsetTop){
      element.classList.add("animation");
      sectionMenu(scrollTop);
    }
  })
  
}

function sectionMenu(scrollTop){
  links.forEach((link) => {
    const href = link.getAttribute("href");
    const element = document.querySelector(href);
    const posSection = element.offsetTop;
    const height = element.clientHeight;

    if(scrolled === false && posSection <= scrollTop && posSection + height > scrollTop){
      document.querySelector('.current').classList.remove('current');
      link.classList.add('current');
    }
  })
}


splitLetters();
function splitLetters() {
  const text = document.querySelector("#preload .name");
  const letters = text.innerHTML.split("");
  setTimeout(() => {
    text.classList.add('animation-name');
  }, 500);
  text.innerHTML = "";

  let countSpace = 0;
  letters.forEach((letter) => {
    if(letter === " ") countSpace++;

    if(letter !== " ")(text.innerHTML += `<span>${letter}</span>`)
    else{
      window.innerWidth <= 764 ? text.innerHTML += "<br/>" : (() => {
        countSpace === 2 ? (text.innerHTML += "<br/>") : (text.innerHTML += "<span>&nbsp;</span>");
      })()
    }
  });
}


smoky();
function smoky(){
  const spans = document.querySelectorAll('#preload .name span');
  spans.forEach((span, index) => {
    let delay = (index/10);
    span.style.animationDelay = delay + 's';
  })
}


function write(){
  const text = document.querySelector('main h1 .name');
  const time = 150;
  const textSplit = text.innerHTML.split('');
  text.style.opacity = '1';
  text.innerHTML = '';
  falseText = ['y', 'b', 'a', ''];
  length = falseText.length - 1;

  const position = textSplit.indexOf('L') + 1;
  
  
  textSplit.splice(position, 0, ...falseText);

  const newPosition = position + length;
  
  textSplit.forEach((letter, index) => {
    if(index < newPosition){
      setTimeout(() => {
        text.innerHTML += letter;
      }, index * time);
    }
    else if( index === newPosition){
      let newIndex = index;
      for(let i = newPosition; i > position; i--){
        setTimeout(() => {
          let newText = text.innerHTML.slice(0, -1)
          text.innerHTML = newText;
        }, newIndex++ * time);
      }
    }
    else{
      index+= length - 1;
      setTimeout(() => {
        text.innerHTML += letter;
      }, index * time);
    }

  })
}

function animation(){
  const animationMain = document.querySelectorAll('main [data-animation]');
  
  animationMain.forEach((div) => setTimeout(() => div.classList.add("animation"), 1500));
}

function load(){
  ajax();
  const loaded = document.getElementById('load');
  loaded.style.display = 'block';
  setTimeout(() => {
    const preload = document.getElementById('preload');
    const body = document.querySelector('body');
    setTimeout(() => preload.style.display = 'none', 500);
    body.style.overflowY = 'visible';
    write();
  }, 2500);
  animation();
}

function switchAnimation(){
  const preload = document.getElementById('preload');
  
  preload.classList.add('opacity');
  load();
}

var startTime = performance.now();
function preload(){
    timeLoad = 3700;
  var endTime = performance.now();
  var totalTime = endTime - startTime;
  
  
  totalTime < timeLoad ? setTimeout(() => switchAnimation(), timeLoad - totalTime) : switchAnimation();
}

var data;
var i = 0;
var count = 1;
const btnMore = document.querySelector('.more');
btnMore.addEventListener('click', addMore);
function addMore(){
  const projectsWrapper = document.querySelector('#portfolio .projects-wrapper');
  var content = [];
  var newContent;
  
  data.forEach((project,key)=> {
    content[key] = `
    <img data-animation="left" src="assets/images/main/Google_web_search.png" alt="Miniatura referente ao site">
    <div data-animation="right" class="description-project">
    <h4>${project['name']}</h4>
    <p>${project['description']}</p>
    <div class="access">
      <a data-ballon="Acessar"  target="_blank" href="${project['link_site']}"><i class="fa-solid fa-globe"></i> Acessar</a>
      <a data-ballon="Repositório"  target="_blank" href="${project['link_repository']}"><i class="fa-brands fa-github"></i> Repositório</a>
    </div>
  </div>`;
  });

  for(i; i < 2*count; i++){
      if(i >= data.length){
        btnMore.style.display = 'none';
        return;
      } 
      newContent = document.createElement('div');
      newContent.className = 'project-single';
      
      if(projectsWrapper.children.length % 2 === 0)
      newContent.classList.add('reverse');
      
      newContent.innerHTML = content[i];
      
      projectsWrapper.appendChild(newContent);
      
      let element = document.querySelectorAll('.project-single [data-animation]');
      element.forEach((div) => setTimeout(() => div.classList.add("animation"), 250));
    }
    count++;
}

function ajax(){
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'assets/php/projects.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        var response = JSON.parse(xhr.responseText);
        data = response;
      }
    };
    xhr.send();
  }