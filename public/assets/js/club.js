//Js to include OpenMap
document.addEventListener("DOMContentLoaded", function () {
  const map = new ol.Map({
    target: "map",
    layers: [
      new ol.layer.Tile({
        source: new ol.source.XYZ({
          url: "https://{1-4}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png",
          attributions: "© OpenStreetMap contributors & CARTO",
        }),
      }),
    ],
    view: new ol.View({
      center: ol.proj.fromLonLat([98.2938, 8.0016]),
      zoom: 15,
    }),
  });
});

//Js to expand insights
document.addEventListener("DOMContentLoaded", function () {
  const expandButtons = document.querySelectorAll(".expand-btn");
  let currentlyOpen = null;

  expandButtons.forEach((button) => {
    button.addEventListener("click", function () {
      // Find the closest insights container and get its description
      const container = button.closest(".insights-container");
      const description = container.querySelector(".insights-description");

      // If clicking the currently open section, just close it
      if (currentlyOpen === description) {
        description.classList.add("hidden");
        button.textContent = "+";
        currentlyOpen = null;
        return;
      }

      // Close currently open section if exists
      if (currentlyOpen) {
        currentlyOpen.classList.add("hidden");
        const openButton = currentlyOpen.closest(".insights-container").querySelector(".expand-btn");
        openButton.textContent = "+";
      }

      // Open clicked section
      description.classList.remove("hidden");
      button.textContent = "-";
      currentlyOpen = description;
    });
  });
});

//JS to entry criteria faq
// Add this accordion functionality
const accordions = document.querySelectorAll(".accordion");

accordions.forEach((accordion) => {
  accordion.addEventListener("click", function () {
    // Close all other accordion items
    accordions.forEach((item) => {
      if (item !== this) {
        item.classList.remove("active");
        const panel = item.nextElementSibling;
        panel.style.maxHeight = null;
      }
    });

    // Toggle the clicked accordion
    this.classList.toggle("active");
    const panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    }
  });
});

// Scroll to top functionality
const scrollToTopBtn = document.getElementById("scrollToTopBtn");

// Show button when user scrolls down 100px from the top
window.onscroll = function () {
  if (
    document.body.scrollTop > 100 ||
    document.documentElement.scrollTop > 100
  ) {
    scrollToTopBtn.classList.add("visible");
  } else {
    scrollToTopBtn.classList.remove("visible");
  }
};

// Scroll to top when button is clicked
document.addEventListener("DOMContentLoaded", function () {
  const scrollToTopBtn = document.getElementById("scrollToTopBtn");

  window.onscroll = function () {
    if (
      document.body.scrollTop > 100 ||
      document.documentElement.scrollTop > 100
    ) {
      scrollToTopBtn.classList.add("visible");
    } else {
      scrollToTopBtn.classList.remove("visible");
    }
  };

  scrollToTopBtn.addEventListener("click", function () {
    window.scrollTo({
      top: 0,
      behavior: "smooth",
    });
  });
});

// Function to handle navbar scroll effect
function handleNavbarScroll() {
  const navbar = document.querySelector(".navbar");
  const subnavContents = document.querySelectorAll(".subnav-content");

  // Add scrolled class when page is scrolled past threshold
  window.addEventListener("scroll", () => {
    if (window.scrollY > 100) {
      navbar.classList.add("scrolled");
      // Apply scrolled class to all subnav-content elements
      subnavContents.forEach((content) => {
        content.classList.add("scrolled");
      });
    } else {
      navbar.classList.remove("scrolled");
      // Remove scrolled class from all subnav-content elements
      subnavContents.forEach((content) => {
        content.classList.remove("scrolled");
      });
    }
  });
}

// Initialize when DOM is loaded
document.addEventListener("DOMContentLoaded", handleNavbarScroll);
