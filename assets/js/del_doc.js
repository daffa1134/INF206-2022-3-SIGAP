var id;
// Hapus
hapus();


function hapus() {
    $(".hapus").click(function () {
        id = $(this).parents("tr").attr("id");
    });
    
    $(".confirmhapus").click(function () {
        $.ajax({
            url: "./AdminController.php",
            type: "GET",
            data: {
                call: 'hapusDokter', id: id,
            },
            success: function (data) {
                $("#" + id).remove();
                document.location.href = "../web/AdminDoc.php";
            },
        });
    });
}