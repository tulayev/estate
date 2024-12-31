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

// Function to create a single topic card
function createTopicCard() {
  return `
        <div class="topic-card">
            <div class="card-header">
                <div class="topic-tag">Research</div>
                <button class="like-btn"><i class="fas fa-heart"></i></button>
            </div>
            <h1 class="topic-title">
                How low can the bitcoin price go? <span>~7min</span>
            </h1>
        </div>
    `;
}

// Function to add new rows of topic cards
function addMoreTopics() {
  const gridContainer = document.querySelector(".for-sale-grid .grid");
  let newContent = "";

  // Create 9 new cards (3 rows × 3 columns)
  for (let i = 0; i < 9; i++) {
    newContent += createTopicCard();
  }

  gridContainer.insertAdjacentHTML("beforeend", newContent);
}

// Add click event listener to the "See more" button
document.getElementById("see-more").addEventListener("click", addMoreTopics);

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

//For-sale header controls

// Get the buttons and container
const listViewBtn = document.getElementById("list-view-btn");
const gridViewBtn = document.getElementById("gridViewBtn");
const viewContainer = document.getElementById("viewContainer");

// Add click event listener for list view
listViewBtn.addEventListener("click", () => {
  // Remove grid classes and add list classes
  viewContainer.classList.remove(
    "grid",
    "grid-cols-3",
    "grid-rows-3",
    "gap-4",
    "flex-wrap"
  );
  viewContainer.classList.add("flex", "flex-col", "space-y-4");

  // Highlight list view button (optional)
  listViewBtn.classList.add("active");
  gridViewBtn.classList.remove("active");
});

// Add click event listener for grid view
gridViewBtn.addEventListener("click", () => {
  // Remove list classes and add grid classes
  viewContainer.classList.remove("flex", "flex-col", "space-y-4");
  viewContainer.classList.add(
    "grid",
    "grid-cols-3",
    "grid-rows-3",
    "gap-4",
    "flex-wrap"
  );

  // Highlight grid view button (optional)
  gridViewBtn.classList.add("active");
  listViewBtn.classList.remove("active");
});
