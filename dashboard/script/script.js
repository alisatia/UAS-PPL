var xdua = document.getElementById("xdua");
var slide = document.getElementById("slide");
var nav = document.getElementById("nav");
var dasi = document.getElementById("dasi");
var dast = document.getElementById("dast");
var biai = document.getElementById("biai");
var biat = document.getElementById("biat");
var stai = document.getElementById("stai");
var stat = document.getElementById("stat");
var nasi = document.getElementById("nasi");
var nast = document.getElementById("nast");
var guii = document.getElementById("guii");
var guit = document.getElementById("guit");
var guii2x = document.getElementById("guii2x");
var guit2x = document.getElementById("guit2x");
var x = window.matchMedia("(max-width: 1500px)");
var childDash = document.getElementById("child-dash");
var childBiaya = document.getElementById("child-biaya");
var childStatus = document.getElementById("child-status");
var childNaskah = document.getElementById("child-naskah");
var childGui = document.getElementById("child-guidelines");
var childGui2x = document.getElementById("child-guidelines2x");
var childungh = document.getElementById("child-unggah");

var sone = document.getElementById("sone");
var stwo = document.getElementById("stwo");
var sthree = document.getElementById("sthree");
var sfour = document.getElementById("sfour");
var sfive = document.getElementById("sfive");
var ione = document.getElementById("ione");
var itwo = document.getElementById("itwo");
var ithree = document.getElementById("ithree");
var ifour = document.getElementById("ifour");
var ifive = document.getElementById("ifive");

function ssone() {
  sone.style.color = "white";
  stwo.style.color = "#9d9d9d";
  sthree.style.color = "#9d9d9d";
  sfour.style.color = "#9d9d9d";
  sfive.style.color = "#9d9d9d";
  ione.style.display = "grid";
  itwo.style.display = "none";
  ithree.style.display = "none";
  ifour.style.display = "none";
  ifive.style.display = "none";
}
function sstwo() {
  sone.style.color = "#9d9d9d";
  stwo.style.color = "white";
  sthree.style.color = "#9d9d9d";
  sfour.style.color = "#9d9d9d";
  sfive.style.color = "#9d9d9d";
  ione.style.display = "none";
  itwo.style.display = "block";
  ithree.style.display = "none";
  ifour.style.display = "none";
  ifive.style.display = "none";
}
function ssthree() {
  sone.style.color = "#9d9d9d";
  stwo.style.color = "#9d9d9d";
  sthree.style.color = "white";
  sfour.style.color = "#9d9d9d";
  sfive.style.color = "#9d9d9d";
  ione.style.display = "none";
  itwo.style.display = "none";
  ithree.style.display = "block";
  ifour.style.display = "none";
  ifive.style.display = "none";
}
function ssfour() {
  sone.style.color = "#9d9d9d";
  stwo.style.color = "#9d9d9d";
  sthree.style.color = "#9d9d9d";
  sfour.style.color = "white";
  sfive.style.color = "#9d9d9d";
  ione.style.display = "none";
  itwo.style.display = "none";
  ithree.style.display = "none";
  ifour.style.display = "block";
  ifive.style.display = "none";
}
function ssfive() {
  sone.style.color = "#9d9d9d";
  stwo.style.color = "#9d9d9d";
  sthree.style.color = "#9d9d9d";
  sfour.style.color = "#9d9d9d";
  sfive.style.color = "white";
  ione.style.display = "none";
  itwo.style.display = "none";
  ithree.style.display = "none";
  ifour.style.display = "none";
  ifive.style.display = "block";
}

var childGuidelines = document.getElementById("childGuidelines");
var childGuidelines2x = document.getElementById("childGuidelines2x");

function ssseven() {
  childGuidelines.style.display = "none";
  childGuidelines2x.style.display = "grid";
}

var wone = document.getElementById("wone");
var wtwo = document.getElementById("wtwo");
var wthree = document.getElementById("wthree");
var wfour = document.getElementById("wfour");
var wfive = document.getElementById("wfive");
var vone = document.getElementById("vone");
var vtwo = document.getElementById("vtwo");
var vthree = document.getElementById("vthree");
var vfour = document.getElementById("vfour");
var vfive = document.getElementById("vfive");

function wwone() {
  wone.style.color = "white";
  wtwo.style.color = "#9d9d9d";
  wthree.style.color = "#9d9d9d";
  wfour.style.color = "#9d9d9d";
  wfive.style.color = "#9d9d9d";
  vone.style.display = "block";
  vtwo.style.display = "none";
  vthree.style.display = "none";
  vfour.style.display = "none";
  vfive.style.display = "none";
}
function wwtwo() {
  wone.style.color = "#9d9d9d";
  wtwo.style.color = "white";
  wthree.style.color = "#9d9d9d";
  wfour.style.color = "#9d9d9d";
  wfive.style.color = "#9d9d9d";
  vone.style.display = "none";
  vtwo.style.display = "block";
  vthree.style.display = "none";
  vfour.style.display = "none";
  vfive.style.display = "none";
}
function wwthree() {
  wone.style.color = "#9d9d9d";
  wtwo.style.color = "#9d9d9d";
  wthree.style.color = "white";
  wfour.style.color = "#9d9d9d";
  wfive.style.color = "#9d9d9d";
  vone.style.display = "none";
  vtwo.style.display = "none";
  vthree.style.display = "block";
  vfour.style.display = "none";
  vfive.style.display = "none";
}
function wwfour() {
  wone.style.color = "#9d9d9d";
  wtwo.style.color = "#9d9d9d";
  wthree.style.color = "#9d9d9d";
  wfour.style.color = "white";
  wfive.style.color = "#9d9d9d";
  vone.style.display = "none";
  vtwo.style.display = "none";
  vthree.style.display = "none";
  vfour.style.display = "block";
  vfive.style.display = "none";
}
function wwfive() {
  wone.style.color = "#9d9d9d";
  wtwo.style.color = "#9d9d9d";
  wthree.style.color = "#9d9d9d";
  wfour.style.color = "#9d9d9d";
  wfive.style.color = "white";
  vone.style.display = "none";
  vtwo.style.display = "none";
  vthree.style.display = "none";
  vfour.style.display = "none";
  vfive.style.display = "block";
}
function wwseven() {
  childGuidelines.style.display = "grid";
  childGuidelines2x.style.display = "none";
}

function bungh() {
  childungh.style.display = "grid";
}

var anreview = document.getElementById("anreview");
var anConfirm = document.getElementById("anConfirm");
var anmeet = document.getElementById("anmeet");
var anmou = document.getElementById("anmou");
var anedit = document.getElementById("anedit");
var anisbn = document.getElementById("anisbn");
var anproduksi = document.getElementById("anproduksi");
var anrej = document.getElementById("anrej");
var andone = document.getElementById("andone");
var riww = document.getElementById("riww");
var stepBarSatu = document.getElementById("stepBarSatu");
var stepBarDua = document.getElementById("stepBarDua");
var stepBarTiga = document.getElementById("stepBarTiga");
var stepBarEmpat = document.getElementById("stepBarEmpat");
var stepBarLima = document.getElementById("stepBarLima");
var stepBarEnam = document.getElementById("stepBarEnam");
var stepBarTujuh = document.getElementById("stepBarTujuh");
var stepLengSatu = document.getElementById("stepLengSatu");
var stepLengDua = document.getElementById("stepLengDua");
var stepLengTiga = document.getElementById("stepLengTiga");
var stepLengEmpat = document.getElementById("stepLengEmpat");
var stepLengLima = document.getElementById("stepLengLima");
var stepLengEnam = document.getElementById("stepLengEnam");

function seljud() {
  var selectedValue = barbar.options[barbar.selectedIndex].value;
  var selectedText = barbar.options[barbar.selectedIndex].text;
  var masukanSini = document.getElementById("masukanSini");
  var result = selectedValue.split("|");
  var valueBaru = result[1];
  var masukanNya = result[0];
  if (valueBaru == "Review") {
    anreview.style.display = "grid";
    anmeet.style.display = "none";
    anConfirm.style.display = "none";
    anmou.style.display = "none";
    anedit.style.display = "none";
    anisbn.style.display = "none";
    anproduksi.style.display = "none";
    andone.style.display = "none";
    anrej.style.display = "none";

    stepBarSatu.style.backgroundColor = "white";
    stepBarSatu.style.color = "black";
    stepBarSatu.style.border = "1px solid #9d9d9d";
    stepLengSatu.style.backgroundColor = "#9d9d9d";

    stepBarDua.style.backgroundColor = "white";
    stepBarDua.style.color = "black";
    stepBarDua.style.border = "1px solid #9d9d9d";
    stepLengDua.style.backgroundColor = "#9d9d9d";

    stepBarTiga.style.backgroundColor = "white";
    stepBarTiga.style.color = "black";
    stepBarTiga.style.border = "1px solid #9d9d9d";
    stepLengTiga.style.backgroundColor = "#9d9d9d";

    stepBarEmpat.style.backgroundColor = "white";
    stepBarEmpat.style.color = "black";
    stepBarEmpat.style.border = "1px solid #9d9d9d";
    stepLengEmpat.style.backgroundColor = "#9d9d9d";

    stepBarLima.style.backgroundColor = "white";
    stepBarLima.style.color = "black";
    stepBarLima.style.border = "1px solid #9d9d9d";
    stepLengLima.style.backgroundColor = "#9d9d9d";

    stepBarEnam.style.backgroundColor = "white";
    stepBarEnam.style.color = "black";
    stepBarEnam.style.border = "1px solid #9d9d9d";
    stepLengEnam.style.backgroundColor = "#9d9d9d";

    stepBarTujuh.style.backgroundColor = "white";
    stepBarTujuh.style.color = "black";
    stepBarTujuh.style.border = "1px solid #9d9d9d";
  }
  if (valueBaru == "Confirm") {
    anConfirm.style.display = "grid";
    anreview.style.display = "none";
    anmeet.style.display = "none";
    anmou.style.display = "none";
    anedit.style.display = "none";
    anisbn.style.display = "none";
    anproduksi.style.display = "none";
    andone.style.display = "none";
    anrej.style.display = "none";

    stepBarSatu.style.backgroundColor = "#0054a3";
    stepBarSatu.style.color = "white";
    stepBarSatu.style.border = "1px solid #0054a3";
    stepLengSatu.style.backgroundColor = "#0054a3";

    stepBarDua.style.backgroundColor = "white";
    stepBarDua.style.color = "black";
    stepBarDua.style.border = "1px solid #9d9d9d";
    stepLengDua.style.backgroundColor = "#9d9d9d";

    stepBarTiga.style.backgroundColor = "white";
    stepBarTiga.style.color = "black";
    stepBarTiga.style.border = "1px solid #9d9d9d";
    stepLengTiga.style.backgroundColor = "#9d9d9d";

    stepBarEmpat.style.backgroundColor = "white";
    stepBarEmpat.style.color = "black";
    stepBarEmpat.style.border = "1px solid #9d9d9d";
    stepLengEmpat.style.backgroundColor = "#9d9d9d";

    stepBarLima.style.backgroundColor = "white";
    stepBarLima.style.color = "black";
    stepBarLima.style.border = "1px solid #9d9d9d";
    stepLengLima.style.backgroundColor = "#9d9d9d";

    stepBarEnam.style.backgroundColor = "white";
    stepBarEnam.style.color = "black";
    stepBarEnam.style.border = "1px solid #9d9d9d";
    stepLengEnam.style.backgroundColor = "#9d9d9d";

    stepBarTujuh.style.backgroundColor = "white";
    stepBarTujuh.style.color = "black";
    stepBarTujuh.style.border = "1px solid #9d9d9d";
  }
  if (valueBaru == "Meet") {
    anreview.style.display = "none";
    anmeet.style.display = "grid";
    anmou.style.display = "none";
    anConfirm.style.display = "none";
    anedit.style.display = "none";
    anisbn.style.display = "none";
    anproduksi.style.display = "none";
    andone.style.display = "none";
    anrej.style.display = "none";

    stepBarSatu.style.backgroundColor = "#0054a3";
    stepBarSatu.style.color = "white";
    stepBarSatu.style.border = "1px solid #0054a3";
    stepLengSatu.style.backgroundColor = "#0054a3";

    stepBarDua.style.backgroundColor = "#0054a3";
    stepBarDua.style.color = "white";
    stepBarDua.style.border = "1px solid #0054a3";
    stepLengDua.style.backgroundColor = "#0054a3";

    stepBarTiga.style.backgroundColor = "white";
    stepBarTiga.style.color = "black";
    stepBarTiga.style.border = "1px solid #9d9d9d";
    stepLengTiga.style.backgroundColor = "#9d9d9d";

    stepBarEmpat.style.backgroundColor = "white";
    stepBarEmpat.style.color = "black";
    stepBarEmpat.style.border = "1px solid #9d9d9d";
    stepLengEmpat.style.backgroundColor = "#9d9d9d";

    stepBarLima.style.backgroundColor = "white";
    stepBarLima.style.color = "black";
    stepBarLima.style.border = "1px solid #9d9d9d";
    stepLengLima.style.backgroundColor = "#9d9d9d";

    stepBarEnam.style.backgroundColor = "white";
    stepBarEnam.style.color = "black";
    stepBarEnam.style.border = "1px solid #9d9d9d";
    stepLengEnam.style.backgroundColor = "#9d9d9d";

    stepBarTujuh.style.backgroundColor = "white";
    stepBarTujuh.style.color = "black";
    stepBarTujuh.style.border = "1px solid #9d9d9d";
  }
  if (valueBaru == "MoU") {
    anreview.style.display = "none";
    anmeet.style.display = "none";
    anmou.style.display = "grid";
    anedit.style.display = "none";
    anConfirm.style.display = "none";
    anisbn.style.display = "none";
    anproduksi.style.display = "none";
    andone.style.display = "none";
    anrej.style.display = "none";

    stepBarSatu.style.backgroundColor = "#0054a3";
    stepBarSatu.style.color = "white";
    stepBarSatu.style.border = "1px solid #0054a3";
    stepLengSatu.style.backgroundColor = "#0054a3";

    stepBarDua.style.backgroundColor = "#0054a3";
    stepBarDua.style.color = "white";
    stepBarDua.style.border = "1px solid #0054a3";
    stepLengDua.style.backgroundColor = "#0054a3";

    stepBarTiga.style.backgroundColor = "#0054a3";
    stepBarTiga.style.color = "white";
    stepBarTiga.style.border = "1px solid #0054a3";
    stepLengTiga.style.backgroundColor = "#0054a3";

    stepBarEmpat.style.backgroundColor = "white";
    stepBarEmpat.style.color = "black";
    stepBarEmpat.style.border = "1px solid #9d9d9d";
    stepLengEmpat.style.backgroundColor = "#9d9d9d";

    stepBarLima.style.backgroundColor = "white";
    stepBarLima.style.color = "black";
    stepBarLima.style.border = "1px solid #9d9d9d";
    stepLengLima.style.backgroundColor = "#9d9d9d";

    stepBarEnam.style.backgroundColor = "white";
    stepBarEnam.style.color = "black";
    stepBarEnam.style.border = "1px solid #9d9d9d";
    stepLengEnam.style.backgroundColor = "#9d9d9d";

    stepBarTujuh.style.backgroundColor = "white";
    stepBarTujuh.style.color = "black";
    stepBarTujuh.style.border = "1px solid #9d9d9d";

    masukanSini.value = masukanNya;
  }
  if (valueBaru == "Editing & Layouting") {
    anreview.style.display = "none";
    anmeet.style.display = "none";
    anmou.style.display = "none";
    anConfirm.style.display = "none";
    anedit.style.display = "grid";
    anisbn.style.display = "none";
    anproduksi.style.display = "none";
    andone.style.display = "none";
    anrej.style.display = "none";

    stepBarSatu.style.backgroundColor = "#0054a3";
    stepBarSatu.style.color = "white";
    stepBarSatu.style.border = "1px solid #0054a3";
    stepLengSatu.style.backgroundColor = "#0054a3";

    stepBarDua.style.backgroundColor = "#0054a3";
    stepBarDua.style.color = "white";
    stepBarDua.style.border = "1px solid #0054a3";
    stepLengDua.style.backgroundColor = "#0054a3";

    stepBarTiga.style.backgroundColor = "#0054a3";
    stepBarTiga.style.color = "white";
    stepBarTiga.style.border = "1px solid #0054a3";
    stepLengTiga.style.backgroundColor = "#0054a3";

    stepBarEmpat.style.backgroundColor = "#0054a3";
    stepBarEmpat.style.color = "white";
    stepBarEmpat.style.border = "1px solid #0054a3";
    stepLengEmpat.style.backgroundColor = "#0054a3";

    stepBarLima.style.backgroundColor = "white";
    stepBarLima.style.color = "black";
    stepBarLima.style.border = "1px solid #9d9d9d";
    stepLengLima.style.backgroundColor = "#9d9d9d";

    stepBarEnam.style.backgroundColor = "white";
    stepBarEnam.style.color = "black";
    stepBarEnam.style.border = "1px solid #9d9d9d";
    stepLengEnam.style.backgroundColor = "#9d9d9d";

    stepBarTujuh.style.backgroundColor = "white";
    stepBarTujuh.style.color = "black";
    stepBarTujuh.style.border = "1px solid #9d9d9d";
  }
  if (valueBaru == "Pendaftaran ISBN") {
    anreview.style.display = "none";
    anmeet.style.display = "none";
    anmou.style.display = "none";
    anConfirm.style.display = "none";
    anedit.style.display = "none";
    anisbn.style.display = "grid";
    anproduksi.style.display = "none";
    andone.style.display = "none";
    anrej.style.display = "none";

    stepBarSatu.style.backgroundColor = "#0054a3";
    stepBarSatu.style.color = "white";
    stepBarSatu.style.border = "1px solid #0054a3";
    stepLengSatu.style.backgroundColor = "#0054a3";

    stepBarDua.style.backgroundColor = "#0054a3";
    stepBarDua.style.color = "white";
    stepBarDua.style.border = "1px solid #0054a3";
    stepLengDua.style.backgroundColor = "#0054a3";

    stepBarTiga.style.backgroundColor = "#0054a3";
    stepBarTiga.style.color = "white";
    stepBarTiga.style.border = "1px solid #0054a3";
    stepLengTiga.style.backgroundColor = "#0054a3";

    stepBarEmpat.style.backgroundColor = "#0054a3";
    stepBarEmpat.style.color = "white";
    stepBarEmpat.style.border = "1px solid #0054a3";
    stepLengEmpat.style.backgroundColor = "#0054a3";

    stepBarLima.style.backgroundColor = "#0054a3";
    stepBarLima.style.color = "white";
    stepBarLima.style.border = "1px solid #0054a3";
    stepLengLima.style.backgroundColor = "#0054a3";

    stepBarEnam.style.backgroundColor = "white";
    stepBarEnam.style.color = "black";
    stepBarEnam.style.border = "1px solid #9d9d9d";
    stepLengEnam.style.backgroundColor = "#9d9d9d";

    stepBarTujuh.style.backgroundColor = "white";
    stepBarTujuh.style.color = "black";
    stepBarTujuh.style.border = "1px solid #9d9d9d";
  }
  if (valueBaru == "Produksi") {
    anreview.style.display = "none";
    anmeet.style.display = "none";
    anmou.style.display = "none";
    anConfirm.style.display = "none";
    anedit.style.display = "none";
    anisbn.style.display = "none";
    anproduksi.style.display = "grid";
    andone.style.display = "none";
    anrej.style.display = "none";

    stepBarSatu.style.backgroundColor = "#0054a3";
    stepBarSatu.style.color = "white";
    stepBarSatu.style.border = "1px solid #0054a3";
    stepLengSatu.style.backgroundColor = "#0054a3";

    stepBarDua.style.backgroundColor = "#0054a3";
    stepBarDua.style.color = "white";
    stepBarDua.style.border = "1px solid #0054a3";
    stepLengDua.style.backgroundColor = "#0054a3";

    stepBarTiga.style.backgroundColor = "#0054a3";
    stepBarTiga.style.color = "white";
    stepBarTiga.style.border = "1px solid #0054a3";
    stepLengTiga.style.backgroundColor = "#0054a3";

    stepBarEmpat.style.backgroundColor = "#0054a3";
    stepBarEmpat.style.color = "white";
    stepBarEmpat.style.border = "1px solid #0054a3";
    stepLengEmpat.style.backgroundColor = "#0054a3";

    stepBarLima.style.backgroundColor = "#0054a3";
    stepBarLima.style.color = "white";
    stepBarLima.style.border = "1px solid #0054a3";
    stepLengLima.style.backgroundColor = "#0054a3";

    stepBarEnam.style.backgroundColor = "#0054a3";
    stepBarEnam.style.color = "white";
    stepBarEnam.style.border = "1px solid #0054a3";
    stepLengEnam.style.backgroundColor = "#0054a3";

    stepBarTujuh.style.backgroundColor = "white";
    stepBarTujuh.style.color = "black";
    stepBarTujuh.style.border = "1px solid #9d9d9d";
  }
  if (valueBaru == "Publish") {
    anreview.style.display = "none";
    anmeet.style.display = "none";
    anmou.style.display = "none";
    anedit.style.display = "none";
    anConfirm.style.display = "none";
    anisbn.style.display = "none";
    anproduksi.style.display = "none";
    andone.style.display = "grid";
    anrej.style.display = "none";

    stepBarSatu.style.backgroundColor = "#0054a3";
    stepBarSatu.style.color = "white";
    stepBarSatu.style.border = "1px solid #0054a3";
    stepLengSatu.style.backgroundColor = "#0054a3";

    stepBarDua.style.backgroundColor = "#0054a3";
    stepBarDua.style.color = "white";
    stepBarDua.style.border = "1px solid #0054a3";
    stepLengDua.style.backgroundColor = "#0054a3";

    stepBarTiga.style.backgroundColor = "#0054a3";
    stepBarTiga.style.color = "white";
    stepBarTiga.style.border = "1px solid #0054a3";
    stepLengTiga.style.backgroundColor = "#0054a3";

    stepBarEmpat.style.backgroundColor = "#0054a3";
    stepBarEmpat.style.color = "white";
    stepBarEmpat.style.border = "1px solid #0054a3";
    stepLengEmpat.style.backgroundColor = "#0054a3";

    stepBarLima.style.backgroundColor = "#0054a3";
    stepBarLima.style.color = "white";
    stepBarLima.style.border = "1px solid #0054a3";
    stepLengLima.style.backgroundColor = "#0054a3";

    stepBarEnam.style.backgroundColor = "#0054a3";
    stepBarEnam.style.color = "white";
    stepBarEnam.style.border = "1px solid #0054a3";
    stepLengEnam.style.backgroundColor = "#0054a3";

    stepBarTujuh.style.backgroundColor = "#0054a3";
    stepBarTujuh.style.color = "white";
    stepBarTujuh.style.border = "1px solid #0054a3";
  }
  if (valueBaru == "Rejected") {
    anreview.style.display = "none";
    anmeet.style.display = "none";
    anmou.style.display = "none";
    anConfirm.style.display = "none";
    anedit.style.display = "none";
    anisbn.style.display = "none";
    anproduksi.style.display = "none";
    andone.style.display = "none";
    anrej.style.display = "grid";

    stepBarSatu.style.backgroundColor = "#FF626B";
    stepBarSatu.style.color = "white";
    stepBarSatu.style.border = "1px solid #FF626B";
    stepLengSatu.style.backgroundColor = "#FF626B";

    stepBarDua.style.backgroundColor = "#FF626B";
    stepBarDua.style.color = "white";
    stepBarDua.style.border = "1px solid #FF626B";
    stepLengDua.style.backgroundColor = "#FF626B";

    stepBarTiga.style.backgroundColor = "#FF626B";
    stepBarTiga.style.color = "white";
    stepBarTiga.style.border = "1px solid #FF626B";
    stepLengTiga.style.backgroundColor = "#FF626B";

    stepBarEmpat.style.backgroundColor = "#FF626B";
    stepBarEmpat.style.color = "white";
    stepBarEmpat.style.border = "1px solid #FF626B";
    stepLengEmpat.style.backgroundColor = "#FF626B";

    stepBarLima.style.backgroundColor = "#FF626B";
    stepBarLima.style.color = "white";
    stepBarLima.style.border = "1px solid #FF626B";
    stepLengLima.style.backgroundColor = "#FF626B";

    stepBarEnam.style.backgroundColor = "#FF626B";
    stepBarEnam.style.color = "white";
    stepBarEnam.style.border = "1px solid #FF626B";
    stepLengEnam.style.backgroundColor = "#FF626B";

    stepBarTujuh.style.backgroundColor = "#FF626B";
    stepBarTujuh.style.color = "white";
    stepBarTujuh.style.border = "1px solid #FF626B";
  }
}

var vblur = document.getElementById("iblur");
var vblur2 = document.getElementById("iblur2");
var upload = document.getElementById("iupload");
function fblur() {
  upload.style.display = "none";
  vblur.style.width = "0";
  vblur.style.height = "0";
  vblur2.style.transform = "scale(0)";
}
function fupload() {
  upload.style.display = "grid";
  vblur.style.width = "100%";
  vblur.style.height = "100vh";
  vblur2.style.transform = "scale(1)";
}

var upother = document.getElementById("upother");
var kate = document.getElementById("upkate");
var demo = document.getElementById("demo");
function fupkate(selectObject) {
  kate.style.color = "black";
  if (selectObject.value == "Lainnya") {
    upother.style.display = "grid";
  } else {
    upother.style.display = "none";
  }
}

var upkate = document.getElementById("upkate").options[0];
function fother() {
  var katlan = document.getElementById("upoth").value;
  upkate.value = katlan;
  upkate.text = katlan;
  upother.style.display = "none";
  const $select = document.querySelector("#upkate");
  const $option = $select.querySelector("#lainnya");
  $select.value = $option.value;
}

var tmbh1 = document.getElementById("tambah1");
var tmbh2 = document.getElementById("tambah2");
function ftambh() {
  tmbh1.style.display = "none";
  tmbh2.style.display = "grid";
}
function fkurng() {
  tmbh1.style.display = "grid";
  tmbh2.style.display = "none";
}

function uploadFile(target) {
  var fileInput = document.getElementById("upfile");
  var filePath = fileInput.value;
  var allowedExtensions = /(\.doc|\.docx|\.zip|\.rar)$/i;
  const oFile = document.getElementById("upfile").files[0];

  if (!allowedExtensions.exec(filePath)) {
    alert("Silahkan Upload File .docx atau isi link google drive");
    fileInput.value = "";
    return false;
  } else {
    if (oFile.size > 50000000) {
      alert("File .docx lebih dari 50 mb");
    } else {
      document.getElementById("textnama").innerHTML = target.files[0].name;
      document.getElementById("textnama").style.color = "black";
    }
  }
}

var hovfoto = document.getElementById("hovfoto");
var hov = 1;
function fhovfoto() {
  if (hov == 1) {
    hovfoto.style.width = "90px";
    hovfoto.style.height = "140px";
    hovfoto.style.transform = "scale(1)";
    hov = 0;
  } else {
    hovfoto.style.width = "0px";
    hovfoto.style.height = "0px";
    hovfoto.style.transform = "scale(0)";
    hov = 1;
  }
}

var jdlkate = 1;
function fjdlkate() {
  var isikate = document.getElementById("isikate");
  if (jdlkate == 1) {
    isikate.style.transform = "scale(1)";
    isikate.style.opacity = "1";
    jdlkate = 0;
  } else {
    isikate.style.transform = "scale(0)";
    isikate.style.opacity = "0";
    jdlkate = 1;
  }
}

function fkakate(kate) {
  var kates = document.getElementById("kates");
  var kateg = kate.textContent;
  kates.innerHTML = kateg;
}

function fqty() {
  var qtybuku = document.getElementById("qtybuku").value;
  var hitung = document.getElementById("hitung");
  if (qtybuku >= 1) {
    hitung.style.transform = "scale(1)";
  } else {
    hitung.style.transform = "scale(0)";
  }
}

document.addEventListener("DOMContentLoaded", function () {
  var form = document.getElementById("formUnggah");

  form.addEventListener("keydown", function (event) {
    if (event.key === "Enter") {
      event.preventDefault();
      return false;
    }
  });
});

document.addEventListener("DOMContentLoaded", function () {
  var form = document.getElementById("child-biaya");

  form.addEventListener("keydown", function (event) {
    if (event.key === "Enter") {
      event.preventDefault();
      return false;
    }
  });
});

var xprofil = document.getElementById("xprofil");
var profileUserBox = document.getElementById("profileUserBox");
var profileUser = document.getElementById("profileUser");

function onProfil() {
  profileUser.style.scale = "1";
}

function closeProfile() {
  profileUser.style.scale = "0";
}

function updateFoto() {
  const foto = document.getElementById("updateFoto");
  foto.addEventListener("submit", (event) => {
    event.preventDefault();
    foto.submit();
  });
}

const uvWarna = document.getElementById("uvWarna");
const finisWarna = document.getElementById("finisWarna");
const ukuranWarna = document.getElementById("ukuranWarna");
const isiWarna = document.getElementById("isiWarna");
const coverWarna = document.getElementById("coverWarna");
const jenisWarna = document.getElementById("jenisWarna");
const laminasiWarna = document.getElementById("laminasiWarna");

laminasiWarna.addEventListener("click", function () {
  laminasiWarna.style.color = "black";
});
jenisWarna.addEventListener("click", function () {
  jenisWarna.style.color = "black";
});
coverWarna.addEventListener("click", function () {
  coverWarna.style.color = "black";
});
isiWarna.addEventListener("click", function () {
  isiWarna.style.color = "black";
});
ukuranWarna.addEventListener("click", function () {
  ukuranWarna.style.color = "black";
});
finisWarna.addEventListener("click", function () {
  finisWarna.style.color = "black";
});
uvWarna.addEventListener("click", function () {
  uvWarna.style.color = "black";
});

const conf1 = document.getElementById("conf1");
var wow = document.getElementById("ids1");
var meetwow = document.getElementById("meetids1");
var dsnwow = document.getElementById("dsnids1");
wow.style.display = "grid";
meetwow.style.display = "grid";
dsnwow.style.display = "block";
conf1.style.display = "block";

function friww() {
  i = 1;
  while (i <= 10) {
    j = "ikj" + i;
    k = "ids" + i;
    l = "meetids" + i;
    m = "dsnids" + i;
    conf = "conf" + i;

    if (document.getElementById(j).selected == true) {
      var wdf = document.getElementById(k);
      var meetwdf = document.getElementById(l);
      var dsnwdf = document.getElementById(m);
      const confi = document.getElementById(conf);

      wdf.style.display = "grid";
      meetwdf.style.display = "grid";
      dsnwdf.style.display = "block";
      confi.style.display = "block";
    } else {
      var wdf = document.getElementById(k);
      var meetwdf = document.getElementById(l);
      var dsnwdf = document.getElementById(m);
      const confi = document.getElementById(conf);

      wdf.style.display = "none";
      meetwdf.style.display = "none";
      dsnwdf.style.display = "none";
      confi.style.display = "none";
    }
    i++;
  }
}
