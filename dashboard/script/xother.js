window.addEventListener("orientationchange", function() {
  // Cek orientasi saat ini
  if (window.orientation === 90 || window.orientation === -90) {
    // Lanskap
    location.reload();
  } else {
    // Potret
    location.reload();
  }
});
