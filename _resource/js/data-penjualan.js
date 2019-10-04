var dataPenjualan;
var form = $(".needs-validation")[0];


$(document).ready(function () {


    dataPenjualan = $("#dataPenjualan").DataTable({
        "ajax": "penjualan/retrieve.php",
        "order": []        
    });

    $("#addPenjualanModalBtn").on('click', function () {

        setTimeout(function () {
            $('.alert').hide();
            form.classList.remove('was-validated');
            form.reset();
        });

        $("#createPenjualanForm").unbind('submit').bind('submit', function () {

            var isValid = form.checkValidity();
            form.classList.add('was-validated');

            if (!isValid) {
                event.preventDefault();
                event.stopPropagation();
            } else {

                $.ajax({
                    type: "POST",
                    url: "penjualan/create.php",
                    data: $('#createPenjualanForm').serialize(),
                    dataType: "json",
                    success: function (response) {

                        form.classList.remove('was-validated');

                        if (response.success == true) {
                            $(".messages").html('<div class="alert alert-success alert-dismissible" role="alert">' +
                                '<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>' + '<strong> <span class="fa fa-check-circle"></span> Berhasil Menambahkan Data</strong>' +
                                '</div>');

                            form.reset();

                            dataBarang.ajax.reload(null, false);

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

function removePenjualan(id = null) {
    if (id) {
        $("#removeBtn").unbind('click').bind('click', function () {
            $.ajax({
                type: "POST",
                url: "penjualan/remove.php",
                data: {
                    penjualan_id: id
                },
                dataType: "JSON",
                success: function (response) {
                    if (response.success == true) {
                        $(".removeMessages").html('<div class="alert alert-success alert-dismissible" role="alert">' +
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                            '<strong> <span class="fa fa-check-circle"></span> Data Berhasil Dihapus</strong>' +
                            '</div>');

                        // refresh the table
                        dataPenjualan.ajax.reload(null, false);

                        // close the modal
                        $("#removePenjualanModal").modal('hide');

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

function editPenjualan(id = null) {
    if (id) {
        setTimeout(function () {
            $('.alert').hide();
            form.classList.remove('was-validated');
            console.log('disini 1');
        });
        $("#penjualan_id").remove();

        $.ajax({
            type: "POST",
            url: "penjualan/getData.php",
            data: { penjualan_id: id },
            dataType: "JSON",
            success: function (response) {
                console.log('disini 2');

                $("#editNoFaktur").val(response.NoFaktur);
                $("#editKdBarang").val(response.KdBarang);
                $("#editQty").val(response.Qty);
                $("#editHargaSatuan").val(response.HargaSatuan);
                $("#editDiskon").val(response.Diskon);

                $(".editPenjualanModal").append('<input type="hidden" name="penjualan_id" id="penjualan_id" value="' + response.id + '"/>');

                $("#editPenjualanForm").unbind('submit').bind('submit', function () {
                    var form = $("#editPenjualanForm")[0];

                    var isValid = form.checkValidity();
                    form.classList.add('was-validated');

                    if (!isValid) {
                        event.preventDefault();
                        event.stopPropagation();
                    } else {
                        $.ajax({
                            type: "POST",
                            url: "penjualan/update.php",
                            data: $('#editPenjualanForm').serialize(),
                            dataType: "json",
                            success: function (response) {
                                if (response.success == true) {
                                    $(".editMessages").html('<div class="alert alert-success alert-dismissible" role="alert">' +
                                        '<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>' + '<strong> <span class="fa fa-check-circle"></span> Berhasil Mengubah Data</strong>' +
                                        '</div>');

                                    // form.reset();

                                    dataBarang.ajax.reload(null, false);

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

function editPenjualanHdr(id = null) {
    if (id) {
        setTimeout(function () {
            $('.alert').hide();
            form.classList.remove('was-validated');
            console.log('disini 1');
        });
        $("#penjualanhdr_id").remove();

        $.ajax({
            type: "POST",
            url: "penjualan/getDataHdr.php",
            data: {
                penjualanhdr_id: id
            },
            dataType: "JSON",
            success: function (response) {
                console.log('disini 2');

                $("#editNoFakturHdr").val(response.NoFaktur);
                $("#editTglHdr").val(response.KdTanggal.format(dd-mm-yyyy));
                $("#editKdTokoHdr").val(response.KdToko);

                $(".editPenjualanHdrModal").append('<input type="hidden" name="penjualanhdr_id" id="penjualanhdr_id" value="' + response.id + '"/>');

                $("#editPenjualanForm").unbind('submit').bind('submit', function () {
                    var form = $("#editPenjualanForm")[0];

                    var isValid = form.checkValidity();
                    form.classList.add('was-validated');

                    if (!isValid) {
                        event.preventDefault();
                        event.stopPropagation();
                    } else {
                        $.ajax({
                            type: "POST",
                            url: "penjualan/updateHdr.php",
                            data: $('#editPenjualanHdrForm').serialize(),
                            dataType: "json",
                            success: function (response) {
                                if (response.success == true) {
                                    $(".editMessages").html('<div class="alert alert-success alert-dismissible" role="alert">' +
                                        '<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>' + '<strong> <span class="fa fa-check-circle"></span> Berhasil Mengubah Data</strong>' +
                                        '</div>');

                                    // form.reset();

                                    dataBarang.ajax.reload(null, false);

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

function showPenjualan(id = null) {
    if (id) {
        setTimeout(function () {
            $('.alert').hide();
            form.classList.remove('was-validated');
            console.log('disini 1');
        });
        $("#penjualan_id").remove();

        $.ajax({
            type: "POST",
            url: "penjualan/getPenjualan.php",
            data: {
                // noFaktur: noFaktur,
                id: id
            },
            dataType: "JSON",
            success: function (response) {
                console.log('disini 2');

                $("#showNoFaktur").val(response.NoFaktur);
                $("#showKdBarang").val(response.KodeBarang);
                $("#showQty").val(response.Qty);
                $("#showHrgSatuan").val(response.HargaSatuan);
                $("#showDiskon").val(response.Diskon);

                $(".showPenjualanModal").append('<input type="hidden" name="penjualan_id" id="penjualan_id" value="' + response.id + '"/>');
                
            }
        });
    } else {
        alert("Error : Reload the page!");
    }
}

/* function cetakPenjualan(id = null) {
    if (id) {
        // var id = $(this).val();
        window.location = "penjualan/print.php?id=" + id;
        /* setTimeout(function () {
            $('.alert').hide();
            form.classList.remove('was-validated');
            console.log('disini 1');
        });
        $("#penjualan_id").remove();

        $.ajax({
            type: "POST",
            url: "penjualan/getPenjualan.php",
            data: {
                // noFaktur: noFaktur,
                id: id
            },
            dataType: "JSON",
            success: function (response) {
                console.log('disini 2');

                $("#showNoFaktur").val(response.NoFaktur);
                $("#showKdBarang").val(response.KodeBarang);
                $("#showQty").val(response.Qty);
                $("#showHrgSatuan").val(response.HargaSatuan);
                $("#showDiskon").val(response.Diskon);

                $(".showPenjualanModal").append('<input type="hidden" name="penjualan_id" id="penjualan_id" value="' + response.id + '"/>');

            }
        }); 
    } else {
        alert("Error : Reload the page!");
    }
} */