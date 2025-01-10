// const locoScroll = new LocomotiveScroll({
//   el: document.querySelector(".main"),
//   smooth: true,
// });
document.querySelector(".close").addEventListener("click", () => {
  gsap.to(".page1-part1", {
    top: "-105vh",
    duration: 1.05,
    overflow: "hidden",
    ease: "elastic.out(0.5,1)",
  });
});
document.querySelector(".open").addEventListener("click", () => {
  gsap.to(images, {
    opacity: 1,
    //  duration:2,
    //  delay:2
  });

  gsap.to(".page1-part1", {
    top: 0,
    overflow: "hidden",
    duration: 1.05,
    ease: "elastic.out(0.5,1)",
  });
  const headings = new SplitType(".animate-text");

  gsap.to(".char", {
    y: 0,
    // stagger: 0.05,
    // ease: "expoScale(10,2.5,power1.out)",
    // ease: "bounce.out",
    duration: 0.5,
    delay: 0.2,
    opacity: 1,
  });
});

document.querySelectorAll(".menu h1").forEach((heading, index) => {
  heading.addEventListener("mouseenter", () => {
    gsap.to(".menu h1", {
      opacity: 0.5,
      duration: 0.3,
      ease: "sine.out",
    });

    gsap.to(heading, {
      opacity: 1,
      duration: 0.3,
      ease: "sine.out",
    });
  });

  heading.addEventListener("mouseleave", () => {
    gsap.to(".menu h1", {
      opacity: 1,
      duration: 0.3,
    });
  });
});

const headings = document.querySelectorAll(".menu h1");
const images = document.querySelectorAll(".images img");
function hideAllImages() {
  images.forEach((img) => img.classList.remove("active"));
}
headings.forEach((heading) => {
  heading.addEventListener("mouseenter", () => {
    const index = heading.getAttribute("data-index") - 1;
    hideAllImages();
    if (images[index]) {
      images[index].classList.add("active");
    }
  });

  heading.addEventListener(
    "mouseleave",
    () => {
      gsap.to(images, {
        duration: 2,
        delay: 2,
      });
    },
    hideAllImages
  );
});
hideAllImages();
const signIn = document.querySelector(".signIn");
signIn.addEventListener("click", () => {
  gsap.to(".login", {
    right: 0,
    ease: "elastic.out(0.5,1)",
    duration: 1,
  });
});
const closeSignIn = document.querySelector(".closeSide");
closeSignIn.addEventListener("click", () => {
  gsap.to(".login", {
    right: "110%",
    ease: "elastic.out(0.5,1)",
  });
});

const signUp = document.querySelector(".sign");
signUp.addEventListener("click", () => {
  gsap.to(".signin", {
    right: 0,
    ease: "elastic.out(0.5,1)",
    duration: 1,
  });
});
const closeSignUp = document.querySelector(".signin-part1 .closeSide");
closeSignUp.addEventListener("click", () => {
  gsap.to(".signin", {
    right: "110%",
    ease: "elastic.out(0.5,1)",
  });
});

const lenis = new Lenis({
  duration: 1.2,
  easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
});

function raf(time) {
  lenis.raf(time);
  requestAnimationFrame(raf);
}

requestAnimationFrame(raf);

const tl = gsap
  .timeline({
    scrollTrigger: {
      trigger: ".img",
      scrub: true,
    },
  })
  .to(".img", {
    stagger: 0.9,
    y: -700,
    scrub: true,
    duration: 5,
    ease: "slow(0.7,0.7,false)",
  });
  var tp = gsap.timeline({scrollTrigger:{
    trigger:"#page6",
    // markers:true,
    start:"38% 50%",
    end:"100% 50%",
    scrub:2,
    pin:true
    
}});
tp
.to(".text",{
    top: "-7%",
},'a')
.to("#card-one",{
    top: "35%",
},'a')
.to("#card-two",{
    top: "130%"
},'a')
.to("#card-two",{
    top: "42%"
},'b')
.to("#card-one",{
    width: "65%",
    height: "65vh"
},'b')
.to("#card-three",{
    top: "130%"
}, 'b')
.to("#card-three",{
    top: "50%"
}, 'c')
.to("#card-two",{
    width: "70%",
    height: "70vh"
},'c')
function goToFirst() {
  window.location.href = "/html/orange county/The-May-Fair-Hotel.html";
}
function goToSecond() {
  window.location.href = "/html/orange county/Elizabeth-Home.html";
}
function goToThird() {
  window.location.href = "/html/orange county/Dawn-Ranch.html";
}
function goToforth() {
  window.location.href = "/html/new-york/Erin's-House.html";
}
function goTofifh() {
  window.location.href = "/html/new-york/long-bay-villas.html";
}
function goTosixth() {
  window.location.href = "/html/new-york/RamonasHouse.html";
}
function goToseventh() {
  window.location.href = "/html/Atlanta/W-Algarve.html";
}
function goToeight() {
  window.location.href = "/html/Atlanta/The-Kelly-Birmingham.html";
}
function goTonine() {
  window.location.href = "/html/Atlanta/Blue-Ridge-Chalet.html";
}

 