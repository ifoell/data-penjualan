var dataToko;
var form = $(".needs-validation")[0];

$(document).ready(function () {

    dataToko = $("#dataToko").DataTable({
        "ajax": "toko/retrieve.php",
        "order": []
    });

    $("#addTokoModalBtn").on('click', function () {

        setTimeout(function () {
            $('.alert').hide();
            form.classList.remove('was-validated');
            form.reset();
        });

        $("#createTokoForm").unbind('submit').bind('submit', function () {

            var isValid = form.checkValidity();
            form.classList.add('was-validated');

            if (!isValid) {
                event.preventDefault();
                event.stopPropagation();
            } else {

                $.ajax({
                    type: "POST",
                    url: "toko/create.php",
                    data: $('#createTokoForm').serialize(),
                    dataType: "json",
                    success: function (response) {

                        form.classList.remove('was-validated');

                        if (response.success == true) {
                            $(".messages").html('<div class="alert alert-success alert-dismissible" role="alert">' +
                                '<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>' + '<strong> <span class="fa fa-check-circle"></span> Berhasil Menambahkan Data</strong>' +
                                '</div>');

                            form.reset();

                            dataToko.ajax.reload(null, false);

                        } else {
                            $(".messages").html('<div class="alert alert-warning alert-dismissible" role="alert">' +
                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                                '<strong> <span class="fa fa-stripe"></span> Gagal Menambahkan Data</strong>' +
                                '</div>');
                        }
                    }
                });
            }
            return false;
        });
    });
});

function removeToko(id = null) {
    if (id) {
        $("#removeBtn").unbind('click').bind('click', function () {
            $.ajax({
                type: "POST",
                url: "toko/remove.php",
                data: {toko_id: id},
                dataType: "JSON",
                success: function (response) {
                    if (response.success == true) {
                        $(".removeMessages").html('<div class="alert alert-success alert-dismissible" role="alert">' +
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                            '<strong> <span class="fa fa-check-circle"></span> Data Berhasil Dihapus</strong>' +
                            '</div>');

                        // refresh the table
                        dataToko.ajax.reload(null, false);

                        // close the modal
                        $("#removeTokoModal").modal('hide');

                    } else {
                        $(".removeMessages").html('<div class="alert alert-warning alert-dismissible" role="alert">' +
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                            '<strong> <span class="fa fa-cross"></span> Data tidak berhasil dihapus</strong>' +
                            '</div>');
                    }
                }
            });
        });
    } else {
        alert('Error: Reload the page!');
    }
}

function editToko(id = null) {
    if (id) {
        setTimeout(function () {
            $('.alert').hide();
            form.classList.remove('was-validated');
        });
        $("#toko_id").remove();

        $.ajax({
            type: "POST",
            url: "toko/getData.php",
            data: {toko_id: id},
            dataType: "JSON",
            success: function (response) {

                $("#editKdToko").val(response.KdToko);

                $("#editNmToko").val(response.NmToko);

                $(".editTokoModal").append('<input type="hidden" name="toko_id" id="toko_id" value="' + response.id + '"/>');

                $("#editTokoForm").unbind('submit').bind('submit', function () {
                    var form = $("#editTokoForm")[0];

                    var isValid = form.checkValidity();
                    form.classList.add('was-validated');

                    if (!isValid) {
                        event.preventDefault();
                        event.stopPropagation();
                    } else {
                        $.ajax({
                            type: "POST",
                            url: "toko/update.php",
                            data: $('#editTokoForm').serialize(),
                            dataType: "json",
                            success: function (response) {
                                if (response.success == true) {
                                    $(".editMessages").html('<div class="alert alert-success alert-dismissible" role="alert">' +
                                        '<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>' + '<strong> <span class="fa fa-check-circle"></span> Berhasil Mengubah Data</strong>' +
                                        '</div>');

                                    // form.reset();

                                    dataToko.ajax.reload(null, false);

                                } else {
                                    $(".editMessages").html('<div class="alert alert-warning alert-dismissible" role="alert">' +
                                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                                        '<strong> <span class="fa fa-stripe"></span> Gagal Mengubah Data</strong>' +
                                        '</div>');
                                }
                            }
                        });
                    }

                    return false;
                });
            }
        });
    } else {
        alert("Error : Reload the page!");
    }
}