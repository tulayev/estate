// OpenMap
document.addEventListener("DOMContentLoaded", function () {
  // Map configurations
  const mapsConfig = [
    {
      target: "map",
      center: [99.533, 7.467],
      zoom: 10,
      markers: [{ coordinates: [99.533, 7.467], label: "Main Location" }],
    },
    {
      target: "map-filter",
      center: [98.2938, 8.0016],
      zoom: 10,
      markers: [{ coordinates: [98.2938, 8.0016], label: "Filter Location" }],
    },
  ];

  // Initialize each map
  mapsConfig.forEach((config) => {
    const map = new ol.Map({
      target: config.target,
      layers: [
        new ol.layer.Tile({
          source: new ol.source.XYZ({
            url: "https://{1-4}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png",
            attributions: "© OpenStreetMap contributors & CARTO",
          }),
        }),
      ],
      view: new ol.View({
        center: ol.proj.fromLonLat(config.center),
        zoom: config.zoom,
      }),
    });

    // Add markers if any are defined
    if (config.markers.length > 0) {
      config.markers.forEach((marker) => {
        const markerFeature = new ol.Feature({
          geometry: new ol.geom.Point(ol.proj.fromLonLat(marker.coordinates)),
        });

        const markerStyle = new ol.style.Style({
          image: new ol.style.Icon({
            anchor: [0.5, 1],
            src: "../assets/home/locationicon.svg",
            scale: 0.5,
          }),
        });

        markerFeature.setStyle(markerStyle);

        const vectorSource = new ol.source.Vector({
          features: [markerFeature],
        });

        const markerLayer = new ol.layer.Vector({
          source: vectorSource,
        });

        map.addLayer(markerLayer);
      });
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

// Bed Counter Functionality
document.addEventListener("DOMContentLoaded", function () {
  let bedCount = 1;

  function updateBedCounter() {
    document.getElementById(
      "bedCounterDropDown"
    ).textContent = `From ${bedCount}`;
    document.getElementById("bedCounterSearchBar").textContent = `${bedCount}`;
  }

  // Increase Beds
  window.increaseBeds = function () {
    bedCount++;
    updateBedCounter();
  };

  // Decrease Beds
  window.decreaseBeds = function () {
    if (bedCount > 1) {
      bedCount--;
      updateBedCounter();
    }
  };
});

//Price range slider
document.addEventListener("DOMContentLoaded", function () {
  // Original price range slider
  setupPriceRange(
    ".range-input .range-min",
    ".range-input .range-max",
    ".price-inputs .input-min",
    ".price-inputs .input-max",
    ".progress"
  );

  // Popup price range slider
  setupPriceRange(
    ".range-input-popup .range-min-popup",
    ".range-input-popup .range-max-popup",
    ".from-price-input",
    ".to-price-input",
    ".progress-popup"
  );
});

function setupPriceRange(
  rangeMinSelector,
  rangeMaxSelector,
  inputMinSelector,
  inputMaxSelector,
  progressSelector
) {
  const rangeMin = document.querySelector(rangeMinSelector);
  const rangeMax = document.querySelector(rangeMaxSelector);
  const inputMin = document.querySelector(inputMinSelector);
  const inputMax = document.querySelector(inputMaxSelector);
  const progress = document.querySelector(progressSelector);

  if (!rangeMin || !rangeMax || !inputMin || !inputMax || !progress) {
    console.warn("Some price range elements are missing from the DOM");
    return;
  }

  function updateProgress() {
    const minVal = parseInt(rangeMin.value);
    const maxVal = parseInt(rangeMax.value);

    // Update input values
    inputMin.value = minVal;
    inputMax.value = maxVal;

    // Add slider-active class when slider is being used
    inputMin.classList.add("slider-active");
    inputMax.classList.add("slider-active");

    // Prevent crossing
    if (minVal > maxVal) {
      [rangeMin.value, rangeMax.value] = [maxVal, minVal];
      return;
    }

    // Calculate progress position and width
    const percent = (minVal / rangeMin.max) * 100;
    const percent2 = 100 - (maxVal / rangeMax.max) * 100;
    progress.style.left = `${percent}%`;
    progress.style.width = `${100 - percent - percent2}%`;
  }

  // Remove slider-active class when user stops using the slider
  function handleSliderEnd() {
    if (inputMin.value === "") {
      inputMin.classList.remove("slider-active");
    }
    if (inputMax.value === "") {
      inputMax.classList.remove("slider-active");
    }
  }

  // Update when range inputs change
  rangeMin.addEventListener("input", updateProgress);
  rangeMax.addEventListener("input", updateProgress);

  // Add mouseup and touchend events to detect when user stops using the slider
  rangeMin.addEventListener("mouseup", handleSliderEnd);
  rangeMax.addEventListener("mouseup", handleSliderEnd);
  rangeMin.addEventListener("touchend", handleSliderEnd);
  rangeMax.addEventListener("touchend", handleSliderEnd);

  // Update when number inputs change
  inputMin.addEventListener("input", () => {
    let val = parseInt(inputMin.value) || 0;
    if (val < 0) val = 0;
    if (val > parseInt(rangeMax.value)) val = parseInt(rangeMax.value);
    rangeMin.value = val;
    updateProgress();
  });

  inputMax.addEventListener("input", () => {
    let val = parseInt(inputMax.value) || 10000000;
    if (val > 10000000) val = 10000000;
    if (val < parseInt(rangeMin.value)) val = parseInt(rangeMin.value);
    rangeMax.value = val;
    updateProgress();
  });

  // Initial update
  updateProgress();
  handleSliderEnd(); // Initialize placeholder visibility
}

//Advanced Filter pop up
function toggleAdvancedSearch() {
  const popup = document.getElementById("advancedSearchPopup");
  popup.classList.toggle("hidden");
}

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
