function showLoading() {
  document.getElementById("loading").style.display = "block";
  setTimeout(hideLoading, 60000);
}

function hideLoading() {
  document.getElementById("loading").style.display = "none";
}

function barPersen(persen) {
  var barPersen = document.getElementById("barPersen");

  switch (persen) {
    case 15:
      barPersen.innerText = "15%";
      barPersen.style.marginLeft = "18%";
      break;
    case 30:
      barPersen.innerText = "30%";
      barPersen.style.marginLeft = "33%";
      break;
    case 45:
      barPersen.innerText = "45%";
      barPersen.style.marginLeft = "48%";
      break;
    case 85:
      barPersen.innerText = "85%";
      barPersen.style.marginLeft = "88%";
      break;
    case 100:
      barPersen.innerText = "";
      barPersen.style.display = "none";
      break;
    default:
      barPersen.innerHTML = "";
      barPersen.style.display = "none";
      break;
  }
}
