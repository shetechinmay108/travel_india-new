function init() {
  gsap.registerPlugin(ScrollTrigger);

  const locoScroll = new LocomotiveScroll({
    el: document.querySelector(".main"),
    smooth: true,
  });
  locoScroll.on("scroll", ScrollTrigger.update);

  ScrollTrigger.scrollerProxy(".main", {
    scrollTop(value) {
      return arguments.length
        ? locoScroll.scrollTo(value, 0, 0)
        : locoScroll.scroll.instance.scroll.y;
    },
    getBoundingClientRect() {
      return {
        top: 0,
        left: 0,
        width: window.innerWidth,
        height: window.innerHeight,
      };
    },
    pinType: document.querySelector(".main").style.transform
      ? "transform"
      : "fixed",
  });

  ScrollTrigger.addEventListener("refresh", () => locoScroll.update());

  ScrollTrigger.refresh();
}

init();
// const menuSection = document.querySelector(".menu-section")
const closeLogin = document.querySelector(".ri-close-line");
const signin = document.querySelector("#signin");
const signinClose = document.querySelector(".ri-close-circle-fill");
const cancelAll = document.querySelector(".signin-part1 #Cancel");
const loginSend = document.querySelector("#login_part12");
const signinSend = document.querySelector("#signin-part123");

function firstPage() {
  var tl = gsap.timeline();

  tl.from(".navbar", {
    y: "-10",
    opacity: 0,
    duration: 1,
    ease: Expo.easeInOut,
  });
  tl.to(".heading-part1 h1", {
    y:-10,
    opacity: 1,
    duration: 0.8,
  });
  tl.to(".heading-part2 h1", {
    // bottom: 0,
    y:-10,
    opacity: 1,
    duration: 0.8,
  });
  tl.to(".heading-part2 h3", {
    y:-10,
    // bottom: 0,
    opacity: 1,
    duration: 0.8,
  });
  tl.to(".bottom-part2 ", {
    bottom: 0,
    opacity: 1,
    duration: 0.8,
  });
}
firstPage();
const menu = document.querySelector("#menu");
menu.addEventListener("click", () => {
  curser.style.display="none";
  const tl = gsap.timeline();
  tl.to(".menu-section", {
    right: 0,
    duration: 0.8,
  });
  tl.from(".menu-part1 h2", {
    x: 150,
    duration: 0.5,
    stagger: 0.2,
    opacity: 0,
  });
  tl.from(".menu-part1 i", {
    x: 150,
    duration: 0.5,
    stagger: 0.2,
    opacity: 0,
  });
});
const closeIcon = document.querySelector(".menu-part1 i");
closeIcon.addEventListener("click", () => {
  curser.style.display="block";
  const tp = gsap.timeline();
  tp.to(".menu-section", {
    right: "-42%",
  });
});
const login = document.querySelector("#Login-part2");
login.addEventListener("click", () => {
  gsap.to(".login", {
    right: 0,
    duration: 1,
  });
});
closeLogin.addEventListener("click", () => {
  curser.style.display="block";
  gsap.to(".login", {
    right: "-100%",
    duration: 1,
  });
  gsap.to(".menu-section", {
    right: "-42%",
  });
});

signin.addEventListener("click", () => {
  gsap.to(".signin", {
    right: 0,
    duration: 0.5,
  });
});
signinClose.addEventListener("click", () => {
  curser.style.display="block";
  gsap.to(".signin", {
    right: "-100%",
    duration: 0.5,
  });
  gsap.to(".menu-section", {
    right: "-42%",
  });
});
cancelAll.addEventListener("click", () => {
  curser.style.display="block";
  gsap.to(".signin", {
    right: "-100%",
    duration: 0.5,
  });
  gsap.to(".login", {
    right: "-100%",
    duration: 1,
  });

  gsap.to(".menu-section", {
    right: "-42%",
  });
});
loginSend.addEventListener("click", () => {
  gsap.to(".login", {
    right: 0,
    duration: 1,
  });
  gsap.to(".signin", {
    right: "-100%",
    duration: 0.5,
  });
});
signinSend.addEventListener("click", () => {
  gsap.to(".signin", {
    right: 0,
    duration: 0.5,
  });
});
var main = document.querySelector(".main");
var curser = document.querySelector(".curser");
var image = document.querySelector(".image1")
image.addEventListener("click",()=>{
  window.location.href="./Lakshadweep/Lakshadweep.html"
})
main.addEventListener("mousemove", function (dets) {
  gsap.to(curser, {
    x: dets.x,
    y: dets.y,
    opacity: 1,
    duration: 0.8,
  });
});

gsap.to(".page3 h1", {
  transform: "translateX(-200%)",
  // opacity:0,
  scrollTrigger: {
    trigger: ".page3 h1",
    scroller: ".main",
    // markers:true,
    start: "top 0%",
    end: "top -200%",
    scrub: 1,
    pin: true,
  },
});
document.querySelectorAll(".elem").forEach(function (elem) {
  var rotate = 0;
  var diffrote = 0;

  elem.addEventListener("mouseleave", (dets) => {
    gsap.to(elem.querySelector("img"), {
      opacity: 0,
      ease: "none",
      // duration: 0.5,
    });
  });

  elem.addEventListener("mousemove", (dets) => {
    curser.style.display="none";
    var diff = dets.clientY - elem.getBoundingClientRect().top;
    diffrote = dets.clientX - rotate;
    rotate = dets.clientX;

    gsap.to(elem.querySelector("img"), {
      opacity: 10,
      ease: "none",
      top: diff,
      left: dets.clientX,
      rotate: gsap.utils.clamp(-20, 20, diffrote * 0.8),
    });
  });
});
