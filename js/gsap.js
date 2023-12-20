// gsap.registerPlugin(ScrollTrigger);
   
// gsap.to(".image-text", {
//     scrollTrigger: {
//         pin: ".image-text",
//         // trigger: ".image-text",
//         // pin: true,
//         start: "top 30%",
//         // end: "bottom 30%",
//         // end : "bottom",
//         // end: "+=2000s",
//         // end: "+=3000s",
//         pinSpacing: true,
//         // markers: {
//         //     startColor : "black",
//         //     endColor : "black",
//         //     fontSize : "2rem"
//         // },
//         markers : false,
//     },
// });

// gsap.to(".image", {
//     scrollTrigger: {
//       trigger: ".image",
//       toggleActions: "play none play reverse",
//       //   end: "+=3000s",
//       start: "top 10%",
//       end: "bottom 50%",
//     //   end: "bottom 50%",
//       // start: "top 10%",
//     //   end: "+=0s",
//     //   end: "bottom 10%",
//       // markers: true,
//     markers : false,
//     // duration: 10,
// },
//     opacity: 0,
// });


gsap.registerPlugin(ScrollTrigger);

// if (window.innerWidth >= 1025) {
  gsap.to(".image-text", {
    scrollTrigger: {
      pin: ".image-text",
      start: "top 20%",
      pinSpacing: true,
      markers: false,
    },
  });

  gsap.to(".image", {
    scrollTrigger: {
      trigger: ".image",
      toggleActions: "play none play none",
      start: "top 10%",
      end: "bottom 50%",
      markers: false,
    },
    opacity: 0,
  });

  gsap.to(".text", {
    scrollTrigger: {
      trigger: ".text",
      toggleActions: "play none play none",
      start: "top 10%",
      end: "bottom 50%",
      markers: false,
    },
    opacity: 1,
  });
// }


 


// Get all elements with class 'circle-details'
var circleDetailsElements = document.querySelectorAll('.circle-details');


// Loop through each element
circleDetailsElements.forEach(function(element, index, array) {
    // Get the current and next year values
    var current = parseInt(element.querySelector('.year').textContent);
    var nextElement = (index === array.length - 1) ? null : array[index + 1];
    var next = nextElement ? parseInt(nextElement.querySelector('.year').textContent) : 0;

    // Calculate the gap year
    var gapYear = (nextElement !== null) ? (current - next) : 0;

    // Set the 'data-gaps' attribute for the current element
    element.setAttribute('data-gaps', Math.abs(gapYear));

    
   

    // Insert additional elements based on the gap year
    if( gapYear  == 0 || gapYear  == -15) {
      for (var i = 0; i < 7; i++) {
        var newElement = document.createElement('div');
        newElement.className = 'circle-details noCount';
        element.parentNode.insertBefore(newElement, nextElement);
      } 
 
    } else {
      for (var i = 0; i < Math.abs(gapYear); i++) {
        var newElement = document.createElement('div');
        newElement.className = 'circle-details noCount';
        element.parentNode.insertBefore(newElement, nextElement);
      } 
    }

   
    
});

document.addEventListener("DOMContentLoaded", function() {
  // Wait for the page to fully load
  const firstCircle = document.querySelector(".circle-details");

  // Check if the firstCircle element exists
  if (firstCircle) {
      // Add your desired class to the first element
      
      firstCircle.classList.add("active");
      jQuery(".year-1989").click()
  }
});


gsap.registerPlugin(MotionPathPlugin);

const circlePath = MotionPathPlugin.convertToPath("#holder", false)[0];
circlePath.id = "circlePath";
document.querySelector(".svg-image").prepend(circlePath);

let items_for_loop = gsap.utils.toArray(".circle-details:not(.noCount)");
let items = gsap.utils.toArray(".circle-details"),
  numItems = items.length,
  itemStep = 1 / numItems,
  wrapProgress = gsap.utils.wrap(0, 1),
  snap = gsap.utils.snap(itemStep),
  wrapTracker = gsap.utils.wrap(0, numItems),
  tracker = { item: 0 };

gsap.set(items, {
  motionPath: {
    path: circlePath,
    align: circlePath,
    alignOrigin: [0.5, 0.5],
    // end: (i) => i / items.length,
    // end: (i) => gsap.utils.wrap(0, 1, i / items.length + 0.25)
    end: (i) => {
      if (window.innerWidth <= 1024) {
        return gsap.utils.wrap(0, 1, i / items.length + 0.25);
      } else {
        return i / items.length;
      }
    },
  },
  scale: 0.9,
});

// let spacingFactor = 0.5;

// gsap.set(items, {
//   motionPath: {
//     path: circlePath,
//     align: circlePath,
//     alignOrigin: [0.5, 0.5],
//     end: (i) => (i / items.length) * spacingFactor, // Adjust spacingFactor
//   },
//   scale: 0.9,
// });


const tl = gsap.timeline({ paused: true, reversed: true });

tl.to(".wrapper", {
  rotation: 360,
  transformOrigin: "center",
  duration: 1,
  ease: "none",
});

tl.to(
  items,
  {
    rotation: "-=360",
    transformOrigin: "center",
    duration: 1,
    ease: "none",
  },
  0
);

tl.to(
  tracker,
  {
    item: numItems,
    duration: 1,
    ease: "none",
    modifiers: {
      item(value) {
        return wrapTracker(numItems - Math.round(value));
      },
    },
  },
  0
);



items.forEach(function (el, i) {
  el.addEventListener("click", function () {
    var current = tracker.item,
      activeItem = i;

    if (i === current) {
      return;
    }

    //set active item to the item that was clicked and remove active class from all items
    document.querySelector(".circle-details.active").classList.remove("active"); 
    items[activeItem].classList.add("active");

   

    var diff = current - i;

    if (Math.abs(diff) < numItems / 2) {
      moveWheel(diff * itemStep);
    } else {
      var amt = numItems - Math.abs(diff);

      if (current > i) {
        moveWheel(amt * -itemStep);
      } else {
        moveWheel(amt * itemStep);
      }
    }
    
  });
});

function moveWheel(amount, i, index) {
  let progress = tl.progress();
  tl.progress(wrapProgress(snap(tl.progress() + amount)));
  let next = tracker.item;
  tl.progress(progress);

  updateAngleClasses();

  document.querySelector(".circle-details.active").classList.remove("active");
  items[next].classList.add("active");

  gsap.to(tl, {
    progress: snap(tl.progress() + amount),
    modifiers: {
      progress: wrapProgress,
    },
  });
}

document.getElementById("next").addEventListener("click", function () {
  // return moveWheel(-itemStep);
  findNext();
});

document.getElementById("prev").addEventListener("click", function () {
  // return moveWheel(itemStep);
  findPrevious();
});

function findNext() {
  const activeElement = document.querySelector('.circle-details.active');
  let nextElement = activeElement.nextElementSibling;

  while (nextElement && nextElement.classList.contains('noCount') ) {
      nextElement = nextElement.nextElementSibling; 
  }
  if( nextElement instanceof SVGElement){
    // console.log('SVG detected');

    nextElement = nextElement.nextElementSibling;
    while (nextElement && nextElement.classList.contains('noCount') ) {
      nextElement = nextElement.nextElementSibling; 
  } 
  }
  if (!nextElement) {
    // If there is no next element, go to the first element without the "noCount" class
    nextElement = document.querySelector('.circle-details:not(.noCount):first-child');
  }

  // activeElement.classList.remove('active');
  nextElement.click(); // Trigger click event on the found element
}

function findPrevious() {
  const activeElement = document.querySelector('.circle-details.active');
  let previousElement = activeElement.previousElementSibling;

  while (previousElement && previousElement.classList.contains('noCount') ) {
      previousElement = previousElement.previousElementSibling;
  }
  if( previousElement instanceof SVGElement){
    // console.log('SVG detected');
    previousElement = previousElement.previousElementSibling;
  }

  if (!previousElement) {
    // If there is no previous element, go to the last element without the "noCount" class
    circleDetails = document.querySelectorAll('.circle-details:not(.noCount)');
    const lastElement = circleDetails[circleDetails.length - 1];
    if( previousElement == null){
      previousElement = lastElement;
    }  
  }

  // activeElement.classList.remove('active');
  previousElement.click(); // Trigger click event on the found element
}


function moveWheel(amount, i, index) {
  let progress = tl.progress();
  tl.progress(wrapProgress(snap(tl.progress() + amount)));
  let next = tracker.item;
  tl.progress(progress);

  document.querySelector(".circle-details.active").classList.remove("active");
  items[next].classList.add("active");

  gsap.to(tl, {
    progress: snap(tl.progress() + amount),
    modifiers: {
      progress: wrapProgress,
    },
  });
}



// Autoplay the slider
const autoplayInterval = 3500; // Set the interval in milliseconds
// const autoplaySpeedFactor = 0.5; // Decrease for slower speed, increase for faster speed
let autoplayTimer;

function startAutoplay() {
  autoplayTimer = setInterval(() => {
    moveWheel(-itemStep);
  }, autoplayInterval);
}

function stopAutoplay() {
  clearInterval(autoplayTimer);
}

// Add hover event listeners for the slider
const slider = document.querySelector('.elementor-shortcode .wrapper .reviews-list-wrap');

const item = document.querySelectorAll('.circle-details'); // Add your selector for the items to observe

// Store the original scales in a Map
const originalScales = new Map();

// Create a MutationObserver to watch for changes to the DOM
const observer = new MutationObserver(function (mutationsList) {
  for (const mutation of mutationsList) {
    if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
      const target = mutation.target;
      if (target.classList.contains('active')) {
        // Increase the scale by 10% (you can adjust this value)
        gsap.to(target, { scale: 1.5 });
      } else {
        // Reset the scale to its original size
        const originalScale = originalScales.get(target);
        if (originalScale) {
          gsap.to(target, { scale: originalScale });
        }
      }
    }
  }
});


// Add elements to observe
items.forEach(function (el) {
  observer.observe(el, { attributes: true, attributeFilter: ['class'] });
  originalScales.set(el, gsap.getProperty(el, 'scaleX')); // Store the original scale
});

slider.addEventListener('mouseenter', () => {
  stopAutoplay(); // Pause autoplay on hover
});

slider.addEventListener('mouseleave', () => {
  // startAutoplay(); // Resume autoplay on hover out
});

// startAutoplay(); // Start autoplay when the page loads



function updateElementClasses() {
  let currentPosition = tl.progress() % 1; // Get the current position as a value between 0 and 1

  // Remove the previous classes from all elements
  items.forEach((el) => {
    for (let i = 0; i < numItems; i++) {
      el.classList.remove(`position-${i}`);
    }
  });

  // Calculate the new classes for all elements based on the current position
  items.forEach((el, index) => {
    const newPosition = Math.round((currentPosition * numItems + index) % numItems); // Round to the nearest integer
    el.classList.add(`position-${newPosition}`);



     if (numItems > 45) {

      if (newPosition >= 40) { 
        el.classList.add(`position-top-right`);
        el.classList.remove(`position-top`);
        el.classList.remove(`position-middle-left`);
        el.classList.remove(`position-bottom-left`);
        el.classList.remove(`position-bottom`);
        el.classList.remove(`position-bottom-right`); 
        el.classList.remove(`position-top-left`);
      } 

      if (newPosition > 35 && newPosition < 40) { 
        el.classList.add(`position-top`);
        el.classList.remove(`position-top-right`);
        el.classList.remove(`position-middle-left`);
        el.classList.remove(`position-bottom-left`);
        el.classList.remove(`position-bottom`);
        el.classList.remove(`position-bottom-right`); 
        el.classList.remove(`position-top-left`);
      } 

     

    } else {

      if (newPosition > 35 && newPosition <= 45) { 
        el.classList.add(`position-top-right`);
        el.classList.remove(`position-top`);
        el.classList.remove(`position-middle-left`);
        el.classList.remove(`position-bottom-left`);
        el.classList.remove(`position-bottom`);
        el.classList.remove(`position-bottom-right`); 
        el.classList.remove(`position-top-left`);
      } 

      if (newPosition > 30 && newPosition <= 35) {
        el.classList.add(`position-top`);
        el.classList.remove(`position-top-right`);
        el.classList.remove(`position-middle-left`);
        el.classList.remove(`position-bottom-left`);
        el.classList.remove(`position-bottom`);
        el.classList.remove(`position-bottom-right`);
        el.classList.remove(`position-top-left`);
      }

    }

    if (newPosition > 40 && newPosition < 50) {
      el.classList.add(`position-top-right`);
      el.classList.remove(`position-top-left`);
      el.classList.remove(`position-middle-left`);
      el.classList.remove(`position-bottom-left`);
      el.classList.remove(`position-bottom`);
      el.classList.remove(`position-bottom-right`);
      el.classList.remove(`position-top`);
    }

 

    // if (newPosition > 30 && newPosition <= 35) {
    //   el.classList.add(`position-top-left`);
    //   el.classList.remove(`position-top-right`);
    //   el.classList.remove(`position-middle-left`);
    //   el.classList.remove(`position-bottom-left`);
    //   el.classList.remove(`position-bottom`);
    //   el.classList.remove(`position-bottom-right`);
    //   el.classList.remove(`position-top`);
    // }

    if (newPosition > 20  && newPosition <= 30) {
      el.classList.add(`position-middle-left`);
      el.classList.remove(`position-top-right`);
      el.classList.remove(`position-top-left`);
      el.classList.remove(`position-bottom-left`);
      el.classList.remove(`position-bottom`);
      el.classList.remove(`position-bottom-right`); 
      el.classList.remove(`position-top`);
    }

    if (newPosition > 15 && newPosition <= 20) {
      el.classList.add(`position-bottom-left`);
      el.classList.remove(`position-top-right`);
      el.classList.remove(`position-top-left`);
      el.classList.remove(`position-bottom`);
      el.classList.remove(`position-bottom-right`);
      el.classList.remove(`position-middle-left`);
      el.classList.remove(`position-top`);
    }

    if (newPosition > 10 && newPosition <= 15) {
      el.classList.add(`position-bottom`);
      el.classList.remove(`position-top-right`);
      el.classList.remove(`position-top-left`);
      el.classList.remove(`position-bottom-left`);
      el.classList.remove(`position-bottom-right`);
      el.classList.remove(`position-middle-left`);
      el.classList.remove(`position-top`);
    }


    if (newPosition <= 10 ) {
      el.classList.add(`position-bottom-right`);
      el.classList.remove(`position-top-right`);
      el.classList.remove(`position-top-left`);
      el.classList.remove(`position-bottom-left`);
      el.classList.remove(`position-middle-left`);
      el.classList.remove(`position-bottom`);
      el.classList.remove(`position-top`);
    }


    if (newPosition == 34) {
      el.classList.add(`position-top`);
      el.classList.remove(`position-top-right`);
      el.classList.remove(`position-middle-left`);
      el.classList.remove(`position-bottom-left`);
      el.classList.remove(`position-bottom`);
      el.classList.remove(`position-bottom-right`);
      el.classList.remove(`position-top-left`);
    }
    

  });
}

updateElementClasses();

tl.eventCallback("onUpdate", updateElementClasses);