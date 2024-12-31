//Js to include OpenMap
document.addEventListener("DOMContentLoaded", function () {
  var map = new ol.Map({
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
