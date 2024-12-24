// OpenMap
document.addEventListener("DOMContentLoaded", function () {
  // Map configurations
  const mapsConfig = [
    {
      target: "map",
      center: [98.2938, 8.0016],
      zoom: 15,
      markers: [], // No markers for this map
    },
    {
      target: "map-to-us",
      center: [98.4, 8.05],
      zoom: 3,
      markers: [{ coordinates: [98.4, 8.05], label: "Default Marker 1" }],
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
            src: "https://cdn-icons-png.flaticon.com/512/684/684908.png", // Default marker icon
            scale: 0.1,
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

        // Optional: Add click interaction or label handling
        markerFeature.on("click", () => {
          alert(marker.label); // Show marker label on click
        });
      });
    }
  });
});

//Show more button
document.addEventListener("DOMContentLoaded", function () {
  const button = document.getElementById("show-more-button");
  const hiddenContent = document.querySelector(".hidden-content");

  // Initially hide the content
  hiddenContent.style.display = "none";

  button.addEventListener("click", function () {
    if (hiddenContent.style.display === "none") {
      hiddenContent.style.display = "inline";
      button.textContent = "Show Less";
    } else {
      hiddenContent.style.display = "none";
      button.textContent = "Show More";
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
