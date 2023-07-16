function hide(){
    var detailTask = document.getElementById('detailTask');
    var taskOutput = document.getElementById('taskOutput');
    var isiTask = document.getElementById('isiTask');
    detailTask.style.zIndex = "-5";
    taskOutput.style.transform = "scale(0)";
    isiTask.style.display = "none";
}

function show1(){
    var detailTask = document.getElementById('detailTask');
    var taskOutput = document.getElementById('taskOutput');
    var isiTask = document.getElementById('isiTask');
    detailTask.style.zIndex = "3";
    taskOutput.style.transform = "scale(1)";
    isiTask.style.display = "grid";
}

function show2(){
    var detailTask = document.getElementById('detailTask');
    var taskOutput = document.getElementById('taskOutput');
    var penulisTask = document.getElementById('penulisTask');
    detailTask.style.zIndex = "3";
    taskOutput.style.transform = "scale(1)";
    penulisTask.style.display = "grid";
}

function show3(){
    var detailTask = document.getElementById('detailTask');
    var taskOutput = document.getElementById('taskOutput');
    var taskProgres = document.getElementById('taskProgres');
    detailTask.style.zIndex = "3";
    taskOutput.style.transform = "scale(1)";
    taskProgres.style.display = "grid";
}

function lihatRincian(test){
    var telaahTask = document.getElementById("telaahTask");
    var telaahMe = document.getElementById("telaahMe");
    var submitTelaah = document.getElementById("submitTelaah");
    var meetTask = document.getElementById("meetTask");
    var meetMe = document.getElementById("meetMe");
    var submitMeet = document.getElementById("submitMeet");
    var mouTask = document.getElementById("mouTask");
    var mouMe = document.getElementById("mouMe");
    var submitMou = document.getElementById("submitMou");
    var editTask = document.getElementById("editTask");
    var editMe = document.getElementById("editMe");
    var submitEdit = document.getElementById("submitEdit");
    var isbnTask = document.getElementById("isbnTask");
    var isbnMe = document.getElementById("isbnMe");
    var submitIsbn = document.getElementById("submitIsbn");
    var produksiTask = document.getElementById("produksiTask");
    var produksiMe = document.getElementById("produksiMe");
    var submitProduksi = document.getElementById("submitProduksi");

    switch (test){
        case 1:
            if (telaahTask.checked) {
                telaahMe.style.textDecoration = "line-through";
                submitTelaah.style.transform = "scale(1)";
            } else {
                telaahMe.style.textDecoration = "none";
                submitTelaah.style.transform = "scale(0)";
            }
        break;
        case 2:
            if (meetTask.checked) {
                telaahTask.checked = true;
                telaahMe.style.textDecoration = "line-through";
                meetMe.style.textDecoration = "line-through";
                submitTelaah.style.transform = "scale(1)";
                submitMeet.style.transform = "scale(1)";
            } else {
                meetMe.style.textDecoration = "none";
                submitMeet.style.transform = "scale(0)";
            }
        break;
        case 3:
            if (mouTask.checked) {
                telaahTask.checked = true;
                meetTask.checked = true;
                telaahMe.style.textDecoration = "line-through";
                meetMe.style.textDecoration = "line-through";
                mouMe.style.textDecoration = "line-through";
                submitTelaah.style.transform = "scale(1)";
                submitMeet.style.transform = "scale(1)";
                submitMou.style.transform = "scale(1)";
            } else {
                mouMe.style.textDecoration = "none";
                submitMou.style.transform = "scale(0)";
            }
        break;
        case 4:
            if (editTask.checked) {
                telaahTask.checked = true;
                meetTask.checked = true;
                mouTask.checked = true;
                telaahMe.style.textDecoration = "line-through";
                meetMe.style.textDecoration = "line-through";
                mouMe.style.textDecoration = "line-through";
                editMe.style.textDecoration = "line-through";
                submitTelaah.style.transform = "scale(1)";
                submitMeet.style.transform = "scale(1)";
                submitMou.style.transform = "scale(1)";
                submitEdit.style.transform = "scale(1)";
            } else {
                editMe.style.textDecoration = "none";
                submitEdit.style.transform = "scale(0)";
            }
        break;
        case 5:
            if (isbnTask.checked) {
                telaahTask.checked = true;
                meetTask.checked = true;
                mouTask.checked = true;
                editTask.checked = true;
                telaahMe.style.textDecoration = "line-through";
                meetMe.style.textDecoration = "line-through";
                mouMe.style.textDecoration = "line-through";
                editMe.style.textDecoration = "line-through";
                isbnMe.style.textDecoration = "line-through";
                submitTelaah.style.transform = "scale(1)";
                submitMeet.style.transform = "scale(1)";
                submitMou.style.transform = "scale(1)";
                submitEdit.style.transform = "scale(1)";
                submitIsbn.style.transform = "scale(1)";
            } else {
                isbnMe.style.textDecoration = "none";
                submitIsbn.style.transform = "scale(0)";
            }
        break;
        case 6:
            if (produksiTask.checked) {
                telaahTask.checked = true;
                meetTask.checked = true;
                mouTask.checked = true;
                editTask.checked = true;
                isbnTask.checked = true;
                telaahMe.style.textDecoration = "line-through";
                meetMe.style.textDecoration = "line-through";
                mouMe.style.textDecoration = "line-through";
                editMe.style.textDecoration = "line-through";
                isbnMe.style.textDecoration = "line-through";
                produksiMe.style.textDecoration = "line-through";
                submitTelaah.style.transform = "scale(1)";
                submitMeet.style.transform = "scale(1)";
                submitMou.style.transform = "scale(1)";
                submitEdit.style.transform = "scale(1)";
                submitIsbn.style.transform = "scale(1)";
                submitProduksi.style.transform = "scale(1)";
            } else {
                produksiMe.style.textDecoration = "none";
                submitProduksi.style.transform = "scale(0)";
            }
        break;
    }
}

function submitOke(test){
    var telaahOke = document.getElementById('telaahOke');
    var meetOke = document.getElementById('meetOke');
    var mouOke = document.getElementById('mouOke');
    var editOke = document.getElementById('editOke');
    var isbnOke = document.getElementById('isbnOke');
    var produksiOke = document.getElementById('produksiOke');

    switch (test){
        case 1:
            telaahOke.style.transform = "scale(1)";
            telaahOke.style.zIndex = "6";
        break;
        case 2: 
            meetOke.style.transform = "scale(1)";
            meetOke.style.zIndex = "6";
        break;
        case 3: 
            mouOke.style.transform = "scale(1)";
            mouOke.style.zIndex = "6";
        break;
        case 4: 
            editOke.style.transform = "scale(1)";
            editOke.style.zIndex = "6";
        break;
        case 5: 
            isbnOke.style.transform = "scale(1)";
            isbnOke.style.zIndex = "6";
        break;
        case 6: 
            produksiOke.style.transform = "scale(1)";
            produksiOke.style.zIndex = "6";
        break;
        default:
    }
}

function submitClose(test){
    var telaahOke = document.getElementById('telaahOke');
    var meetOke = document.getElementById('meetOke');
    var mouOke = document.getElementById('mouOke');
    var editOke = document.getElementById('editOke');
    var isbnOke = document.getElementById('isbnOke');
    var produksiOke = document.getElementById('produksiOke');

    switch (test){
        case 1:
            telaahOke.style.transform = "scale(0)";
            telaahOke.style.zIndex = "-11";
        break;
        case 2: 
            meetOke.style.transform = "scale(0)";
            meetOke.style.zIndex = "-11";
        break;
        case 3: 
            mouOke.style.transform = "scale(0)";
            mouOke.style.zIndex = "-11";
        break;
        case 4: 
            editOke.style.transform = "scale(0)";
            editOke.style.zIndex = "-11";
        break;
        case 5: 
            isbnOke.style.transform = "scale(0)";
            isbnOke.style.zIndex = "-11";
        break;
        case 6: 
            produksiOke.style.transform = "scale(0)";
            produksiOke.style.zIndex = "-11";
        break;
        default:
    }
}

function cekStatus(test){
    var telaahTask = document.getElementById("telaahTask");
    var telaahMe = document.getElementById("telaahMe");
    var submitTelaah = document.getElementById("submitTelaah");
    var meetTask = document.getElementById("meetTask");
    var meetMe = document.getElementById("meetMe");
    var submitMeet = document.getElementById("submitMeet");
    var mouTask = document.getElementById("mouTask");
    var mouMe = document.getElementById("mouMe");
    var submitMou = document.getElementById("submitMou");
    var editTask = document.getElementById("editTask");
    var editMe = document.getElementById("editMe");
    var submitEdit = document.getElementById("submitEdit");
    var isbnTask = document.getElementById("isbnTask");
    var isbnMe = document.getElementById("isbnMe");
    var submitIsbn = document.getElementById("submitIsbn");
    var produksiTask = document.getElementById("produksiTask");
    var produksiMe = document.getElementById("produksiMe");
    var submitProduksi = document.getElementById("submitProduksi");

    switch (test) {
        case "Meet":
            telaahTask.checked = true

            telaahMe.style.textDecoration = "line-through";
            submitTelaah.style.transform = "scale(1)";
        break;
        case "MoU":
            telaahTask.checked = true
            meetTask.checked = true
            
            telaahMe.style.textDecoration = "line-through";
            meetMe.style.textDecoration = "line-through";
            submitTelaah.style.transform = "scale(1)";
            submitMeet.style.transform = "scale(1)";
        break;
        case "Editing ":
            telaahTask.checked = true
            meetTask.checked = true
            mouTask.checked = true
            
            telaahMe.style.textDecoration = "line-through";
            meetMe.style.textDecoration = "line-through";
            mouMe.style.textDecoration = "line-through";
            submitTelaah.style.transform = "scale(1)";
            submitMeet.style.transform = "scale(1)";
            submitMou.style.transform = "scale(1)";
        break;
        case "Pendaftaran ISBN":
            telaahTask.checked = true
            meetTask.checked = true
            mouTask.checked = true
            editTask.checked = true

            telaahMe.style.textDecoration = "line-through";
            meetMe.style.textDecoration = "line-through";
            mouMe.style.textDecoration = "line-through";
            editMe.style.textDecoration = "line-through";
            submitTelaah.style.transform = "scale(1)";
            submitMeet.style.transform = "scale(1)";
            submitMou.style.transform = "scale(1)";
            submitEdit.style.transform = "scale(1)";
        break;
        case "Produksi":
            telaahTask.checked = true
            meetTask.checked = true
            mouTask.checked = true
            editTask.checked = true
            isbnTask.checked = true

            telaahMe.style.textDecoration = "line-through";
            meetMe.style.textDecoration = "line-through";
            mouMe.style.textDecoration = "line-through";
            editMe.style.textDecoration = "line-through";
            isbnMe.style.textDecoration = "line-through";
            submitTelaah.style.transform = "scale(1)";
            submitMeet.style.transform = "scale(1)";
            submitMou.style.transform = "scale(1)";
            submitEdit.style.transform = "scale(1)";
            submitIsbn.style.transform = "scale(1)";
        break;
        case "Publish":
            telaahTask.checked = true
            meetTask.checked = true
            mouTask.checked = true
            editTask.checked = true
            isbnTask.checked = true
            produksiTask.checked = true

            telaahMe.style.textDecoration = "line-through";
            meetMe.style.textDecoration = "line-through";
            mouMe.style.textDecoration = "line-through";
            editMe.style.textDecoration = "line-through";
            isbnMe.style.textDecoration = "line-through";
            produksiMe.style.textDecoration = "line-through";
            submitTelaah.style.transform = "scale(1)";
            submitMeet.style.transform = "scale(1)";
            submitMou.style.transform = "scale(1)";
            submitEdit.style.transform = "scale(1)";
            submitIsbn.style.transform = "scale(1)";
            submitProduksi.style.transform = "scale(1)";
        break;
        default:
    }
}

