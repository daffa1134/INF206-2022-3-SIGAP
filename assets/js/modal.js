var addDoc = document.getElementById("modalAddDokter");
var inputDocName = document.getElementById("namaDokter");

addDoc.addEventListener("shown.bs.modal", function () {
    inputDocName.focus();
});

