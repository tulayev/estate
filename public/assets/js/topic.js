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

document.addEventListener("DOMContentLoaded", function () {
  const slider = document.querySelector(".topics-slider");
  const prevButton = document.getElementById("previous-button");
  const nextButton = document.getElementById("next-button");

  const scrollAmount = 280 + 16; // card width + gap

  nextButton.addEventListener("click", () => {
    slider.scrollBy({ left: scrollAmount, behavior: "smooth" });
  });

  prevButton.addEventListener("click", () => {
    slider.scrollBy({ left: -scrollAmount, behavior: "smooth" });
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
