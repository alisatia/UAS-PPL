var dashboardIcon = document.getElementById("dashboardIcon");
var biayaIcon = document.getElementById("biayaIcon");
var statusIcon = document.getElementById("statusIcon");
var naskahIcon = document.getElementById("naskahIcon");
var guidelinesIcon = document.getElementById("guidelinesIcon");
var dashbaordText = document.getElementById("dashbaordText");
var biayaText = document.getElementById("biayaText");
var statusText = document.getElementById("statusText");
var naskahText = document.getElementById("naskahText");
var guidelinesText = document.getElementById("guidelinesText");

function navDashboard() {
  setTimeout(() => {
    dashboardIcon.style.backgroundImage = "url(../assets/xdashboard.png)";
  }, 100);
  dashbaordText.style.fontWeight = "bold";
  setTimeout(() => {
    biayaIcon.style.backgroundImage = "url(../assets/biaya.png)";
  }, 100);
  biayaText.style.fontWeight = "normal";
  setTimeout(() => {
    statusIcon.style.backgroundImage = "url(../assets/status.png)";
  }, 100);
  statusText.style.fontWeight = "normal";
  setTimeout(() => {
    naskahIcon.style.backgroundImage = "url(../assets/naskah.png)";
  }, 100);
  naskahText.style.fontWeight = "normal";
  setTimeout(() => {
    guidelinesIcon.style.backgroundImage = "url(../assets/guidelines.png)";
  }, 100);
  guidelinesText.style.fontWeight = "normal";
}
function navBiaya() {
  setTimeout(() => {
    dashboardIcon.style.backgroundImage = "url(../assets/dashboard.png)";
  }, 100);
  dashbaordText.style.fontWeight = "normal";
  setTimeout(() => {
    biayaIcon.style.backgroundImage = "url(../assets/xbiaya.png)";
  }, 100);
  biayaText.style.fontWeight = "bold";
  setTimeout(() => {
    statusIcon.style.backgroundImage = "url(../assets/status.png)";
  }, 100);
  statusText.style.fontWeight = "normal";
  setTimeout(() => {
    naskahIcon.style.backgroundImage = "url(../assets/naskah.png)";
  }, 100);
  naskahText.style.fontWeight = "normal";
  setTimeout(() => {
    guidelinesIcon.style.backgroundImage = "url(../assets/guidelines.png)";
  }, 100);
  guidelinesText.style.fontWeight = "normal";
}
function navStatus() {
  setTimeout(() => {
    dashboardIcon.style.backgroundImage = "url(../assets/dashboard.png)";
  }, 100);
  dashbaordText.style.fontWeight = "normal";
  setTimeout(() => {
    biayaIcon.style.backgroundImage = "url(../assets/biaya.png)";
  }, 100);
  biayaText.style.fontWeight = "normal";
  setTimeout(() => {
    statusIcon.style.backgroundImage = "url(../assets/xstatus.png)";
  }, 100);
  statusText.style.fontWeight = "bold";
  setTimeout(() => {
    naskahIcon.style.backgroundImage = "url(../assets/naskah.png)";
  }, 100);
  naskahText.style.fontWeight = "normal";
  setTimeout(() => {
    guidelinesIcon.style.backgroundImage = "url(../assets/guidelines.png)";
  }, 100);
  guidelinesText.style.fontWeight = "normal";
}
function navNaskah() {
  setTimeout(() => {
    dashboardIcon.style.backgroundImage = "url(../assets/dashboard.png)";
  }, 100);
  dashbaordText.style.fontWeight = "normal";
  setTimeout(() => {
    biayaIcon.style.backgroundImage = "url(../assets/biaya.png)";
  }, 100);
  biayaText.style.fontWeight = "normal";
  setTimeout(() => {
    statusIcon.style.backgroundImage = "url(../assets/status.png)";
  }, 100);
  statusText.style.fontWeight = "normal";
  setTimeout(() => {
    naskahIcon.style.backgroundImage = "url(../assets/xnaskah.png)";
  }, 100);
  naskahText.style.fontWeight = "bold";
  setTimeout(() => {
    guidelinesIcon.style.backgroundImage = "url(../assets/guidelines.png)";
  }, 100);
  guidelinesText.style.fontWeight = "normal";
}
function navGuidelines() {
  setTimeout(() => {
    dashboardIcon.style.backgroundImage = "url(../assets/dashboard.png)";
  }, 100);
  dashbaordText.style.fontWeight = "normal";
  setTimeout(() => {
    biayaIcon.style.backgroundImage = "url(../assets/biaya.png)";
  }, 100);
  biayaText.style.fontWeight = "normal";
  setTimeout(() => {
    statusIcon.style.backgroundImage = "url(../assets/status.png)";
  }, 100);
  statusText.style.fontWeight = "normal";
  setTimeout(() => {
    naskahIcon.style.backgroundImage = "url(../assets/naskah.png)";
  }, 100);
  naskahText.style.fontWeight = "normal";
  setTimeout(() => {
    guidelinesIcon.style.backgroundImage = "url(../assets/xguidelines.png)";
  }, 100);
  guidelinesText.style.fontWeight = "bold";
}

var childDashboard = document.getElementById("childDashboard");
var childBiaya = document.getElementById("childBiaya");
var childStatus = document.getElementById("childStatus");
var childNaskah = document.getElementById("childNaskah");
var childGuidelines = document.getElementById("childGuidelines");
var childGuidelines2x = document.getElementById("childGuidelines2x");
var panduanGanda = document.getElementById("panduanGanda");

function funcChildDashboard() {
  childDashboard.style.display = "grid";
  childBiaya.style.display = "none";
  childStatus.style.display = "none";
  childNaskah.style.display = "none";
  childGuidelines.style.display = "none";
  childGuidelines2x.style.display = "none";
  panduanGanda.style.display = "none";
}

function funcChildBiaya() {
  childDashboard.style.display = "none";
  childBiaya.style.display = "grid";
  childStatus.style.display = "none";
  childNaskah.style.display = "none";
  childGuidelines.style.display = "none";
  childGuidelines2x.style.display = "none";
  panduanGanda.style.display = "none";
}

function funcchildBiaya() {
  childDashboard.style.display = "none";
  childBiaya.style.display = "none";
  childStatus.style.display = "grid";
  childNaskah.style.display = "none";
  childGuidelines.style.display = "none";
  childGuidelines2x.style.display = "none";
  panduanGanda.style.display = "none";
}

function funcChildNaskah() {
  childDashboard.style.display = "none";
  childBiaya.style.display = "none";
  childStatus.style.display = "none";
  childNaskah.style.display = "grid";
  childGuidelines.style.display = "none";
  childGuidelines2x.style.display = "none";
  panduanGanda.style.display = "none";
}

function funcChildGuidelines() {
  childDashboard.style.display = "none";
  childBiaya.style.display = "none";
  childStatus.style.display = "none";
  childNaskah.style.display = "none";
  childGuidelines.style.display = "grid";
  childGuidelines2x.style.display = "none";
  panduanGanda.style.display = "grid";
}

var navbarDashboard = document.getElementById("navbarDashboard");
var navbarBiaya = document.getElementById("navbarBiaya");
var navbarStatus = document.getElementById("navbarStatus");
var navbarNaskah = document.getElementById("navbarNaskah");
var navbarGuidelines = document.getElementById("navbarGuidelines");
var tambahanBackground = document.getElementById("tambahanBackground");

navbarDashboard.addEventListener("click", function () {
  navDashboard();
  tambahanBackground.style.top = "calc(25px)";
  funcChildDashboard();
});
navbarBiaya.addEventListener("click", function () {
  navBiaya();
  tambahanBackground.style.top = "calc(25px + 70px)";
  funcChildBiaya();
});
navbarStatus.addEventListener("click", function () {
  navStatus();
  tambahanBackground.style.top = "calc(25px + 70px * 2)";
  funcchildBiaya();
});
navbarNaskah.addEventListener("click", function () {
  navNaskah();
  tambahanBackground.style.top = "calc(25px + 70px * 3)";
  funcChildNaskah();
});
navbarGuidelines.addEventListener("click", function () {
  navGuidelines();
  tambahanBackground.style.top = "calc(25px + 70px * 4)";
  funcChildGuidelines();
});

var container = document.getElementById("container");
var sidebarPress = document.getElementById("sidebarPress");
var tambahanSidebar = document.getElementById("tambahanSidebar");
var tambahanBurger = document.getElementById("tambahanBurger");
var titleImg = document.getElementById("titleImg");
var contentPress = document.getElementById("contentPress");
var dot1 = document.getElementById("dot1");
var dot2 = document.getElementById("dot2");
var dot3 = document.getElementById("dot3");
tambahanBurger.addEventListener("change", function () {
  if (tambahanBurger.checked) {
    burgerShow();
  } else {
    burgerHide();
  }
});
function burgerShow() {
  dot1.style.transform = "rotate(45deg)";
  dot1.style.marginLeft = "8px";
  dot2.style.transform = "rotate(-45deg)";
  dot3.style.transform = "rotate(45deg)";
  dot3.style.marginRight = "8px";
  contentPress.style.width = "calc(100% - 210px)";
  container.style.backgroundImage = "url(../assets/sidebar.png)";
  tambahanSidebar.style.display = "block";
  sidebarPress.style.left = "30px";
  sidebarPress.style.width = "150px";
  titleImg.style.backgroundImage = "url(../assets/itbpress.png)";
  titleImg.style.backgroundPosition = "left;";
  dashbaordText.classList.add("tablet-burger");
  biayaText.classList.add("tablet-burger");
  statusText.classList.add("tablet-burger");
  naskahText.classList.add("tablet-burger");
  guidelinesText.classList.add("tablet-burger");
}
function burgerHide() {
  dot1.style.transform = "rotate(0)";
  dot1.style.marginLeft = "0";
  dot2.style.transform = "rotate(0)";
  dot3.style.transform = "rotate(0)";
  dot3.style.marginRight = "0";
  contentPress.style.width = "calc(100% - 100px)";
  container.style.backgroundImage = "none";
  tambahanSidebar.style.display = "none";
  sidebarPress.style.left = "10px";
  sidebarPress.style.width = "70px";
  titleImg.style.backgroundImage = "url(../assets/logo.png)";
  titleImg.style.backgroundPosition = "center;";
  dashbaordText.classList.remove("tablet-burger");
  biayaText.classList.remove("tablet-burger");
  statusText.classList.remove("tablet-burger");
  naskahText.classList.remove("tablet-burger");
  guidelinesText.classList.remove("tablet-burger");
}

dashboardIcon.addEventListener("mouseenter", function () {
  dashbaordText.classList.add("tablet-show");
});
dashboardIcon.addEventListener("mouseleave", function () {
  dashbaordText.classList.remove("tablet-show");
});
biayaIcon.addEventListener("mouseenter", function () {
  biayaText.classList.add("tablet-show");
});
biayaIcon.addEventListener("mouseleave", function () {
  biayaText.classList.remove("tablet-show");
});
statusIcon.addEventListener("mouseenter", function () {
  statusText.classList.add("tablet-show");
});
statusIcon.addEventListener("mouseleave", function () {
  statusText.classList.remove("tablet-show");
});
naskahIcon.addEventListener("mouseenter", function () {
  naskahText.classList.add("tablet-show");
});
naskahIcon.addEventListener("mouseleave", function () {
  naskahText.classList.remove("tablet-show");
});
guidelinesIcon.addEventListener("mouseenter", function () {
  guidelinesText.classList.add("tablet-show");
});
guidelinesIcon.addEventListener("mouseleave", function () {
  guidelinesText.classList.remove("tablet-show");
});

const fotoPress = document.getElementById("fotoPress");
const detailProfil = document.getElementById("detailProfil");
const innerProfil = document.getElementById("innerProfil");
let iProfil = innerProfil.textContent;

fotoPress.addEventListener("click", function () {
  if (iProfil == "1") {
    detailProfil.style.display = "block";
    iProfil = 0;
    console.log(iProfil);
  } else {
    detailProfil.style.display = "none";
    iProfil = 1;
    console.log(iProfil);
  }
});

const textProfil = document.getElementById("textProfil");
const profilUser = document.getElementById("profilUser");
const closeUser = document.getElementById("closeUser");

textProfil.addEventListener("click", function () {
  profilUser.style.bottom = "0";
});

closeUser.addEventListener("click", function () {
  profilUser.style.bottom = "100vh";
});

const uploadKategori = document.getElementById("uploadKategori");
const uploadTambahKategori = document.getElementById("uploadTambahKategori");

uploadKategori.addEventListener("change", function () {
  uploadKategori.style.color = "black";
  if (uploadKategori.value == "Lainnya") {
    uploadTambahKategori.style.display = "grid";
  } else {
    uploadTambahKategori.style.display = "none";
  }
});

const iconTambah = document.getElementById("iconTambah");
const textareaPenulis = document.getElementById("textareaPenulis");

iconTambah.addEventListener("click", function () {
  textareaPenulis.style.display = "grid";
});

const iconTextarea = document.getElementById("iconTextarea");

iconTextarea.addEventListener("click", function () {
  textareaPenulis.style.display = "none";
});

const closeUpload = document.getElementById("closeUpload");
const uploadPress = document.getElementById("uploadPress");

closeUpload.addEventListener("click", function () {
  uploadPress.style.bottom = "100vh";
});

const iconUnggah = document.getElementById("iconUnggah");
iconUnggah.addEventListener("click", function () {
  uploadPress.style.bottom = "0";
});

const target = document.getElementById("hoverRoyalti");
const cekbox = document.getElementById("tombolRoyalti");
const display = document.getElementById("text-royalti");
const totalRoyalti = document.getElementById("totalRoyalti");
const filterRoyalti = document.getElementById("formRoyalti");

target.addEventListener("mouseenter", () => {
  if (cekbox.checked == true) {
    display.innerText = "Total Royalti";
    display.style.transform = "scale(1)";
  } else {
    display.innerText = "Filter Royalti";
    display.style.transform = "scale(1)";
  }
});

target.addEventListener("mouseleave", () => {
  display.style.transform = "scale(0)";
});

cekbox.addEventListener("click", function () {
  if (cekbox.checked == true) {
    filterRoyalti.style.display = "grid";
    totalRoyalti.style.display = "none";
  } else {
    filterRoyalti.style.display = "none";
    totalRoyalti.style.display = "grid";
  }
});


const gandaUmum = document.getElementById("gandaUmum");
const gandaKhusus = document.getElementById("gandaKhusus");

gandaUmum.addEventListener("click", function () {
  childGuidelines.style.display = "grid";
  childGuidelines2x.style.display = "none";

  gandaUmum.style.backgroundColor = "#0054a3";
  gandaUmum.style.color = "#fdfdfd";
  gandaKhusus.style.backgroundColor = "#fdfdfd";
  gandaKhusus.style.color = "#0054a3";
});

gandaKhusus.addEventListener("click", function () {
  childGuidelines.style.display = "none";
  childGuidelines2x.style.display = "grid";

  gandaUmum.style.backgroundColor = "#fdfdfd";
  gandaUmum.style.color = "#0054a3";
  gandaKhusus.style.backgroundColor = "#0054a3";
  gandaKhusus.style.color = "#fdfdfd";
});


var tombolAjukan = document.getElementById("tombolAjukan");
var closePengajuan = document.getElementById("closePengajuan");
var pengajuan = document.getElementById("boxPengajuan");

tombolAjukan.addEventListener("click", function () {
//   pengajuan.style.display = "grid";
  
});

closePengajuan.addEventListener("click", function () {
  pengajuan.style.display = "none";
});