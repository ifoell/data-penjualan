
var dataBarang;
var form = $(".needs-validation")[0];

$(document).ready(function() {

    dataBarang = $("#dataBarang").DataTable({
        "ajax": "barang/retrieve.php",
        "order": []
    });
    
    $("#addBarangModalBtn").on('click', function() {
        
        // var form = $(".needs-validation")[0];

        setTimeout(function () {
            $('.alert').hide();
            form.classList.remove('was-validated');
            form.reset();
        });
        
        $("#createBarangForm").unbind('submit').bind('submit', function() {

            var isValid = form.checkValidity();
            form.classList.add('was-validated');

            if(!isValid) {
                event.preventDefault();
                event.stopPropagation();
            } else {

                $.ajax({
                    type : "POST",
                    url : "barang/create.php",
                    data : $('#createBarangForm').serialize(),
                    dataType : "json",
                    success:function(response) {

                        form.classList.remove('was-validated');

                        if(response.success == true) {
                            $(".messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
                                '<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>'+'<strong> <span class="fa fa-check-circle"></span> Berhasil Menambahkan Data</strong>'+
                            '</div>');

                            form.reset();

                            dataBarang.ajax.reload(null, false);

                        } else {
                            $(".messages").html('<div class="alert alert-warning alert-dismissible" role="alert">' +
                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                                '<strong> <span class="fa fa-stripe"></span> Gagal Menambahkan Data</strong>'+
                            '</div>');
                        }
                    }
                });
            }
            return false;
        });
    });
});

function removeBarang(id = null) {
    if(id) {
        $("#removeBtn").unbind('click').bind('click', function() {
            $.ajax({
                type: "POST",
                url: "barang/remove.php",
                data: {barang_id : id},
                dataType: "JSON",
                success: function (response) {
                    if (response.success == true) {
                        $(".removeMessages").html('<div class="alert alert-success alert-dismissible" role="alert">' +
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                            '<strong> <span class="fa fa-check-circle"></span> Data Berhasil Dihapus</strong>'+
                            '</div>');

                        // refresh the table
                        dataBarang.ajax.reload(null, false);

                        // close the modal
                        $("#removeBarangModal").modal('hide');

                    } else {
                        $(".removeMessages").html('<div class="alert alert-warning alert-dismissible" role="alert">' +
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                            '<strong> <span class="fa fa-cross"></span> Data tidak berhasil dihapus</strong>'+
                            '</div>');
                    }
                }
            });
        });
    } else {
        alert('Error: Reload the page!');
    }
}

function editBarang(id = null) {
    if(id) {
        setTimeout(function () {
            $('.alert').hide();
            form.classList.remove('was-validated');
            // form.reset();
        });
        $("#barang_id").remove();

        $.ajax({
            type: "POST",
            url: "barang/getData.php",
            data: {barang_id : id},
            dataType: "JSON",
            success: function (response) {

                $("#editKdBarang").val(response.KdBarang);

                $("#editNmBarang").val(response.NmBarang);

                $(".editBarangModal").append('<input type="hidden" name="barang_id" id="barang_id" value="'+response.id+'"/>');

                $("#editBarangForm").unbind('submit').bind('submit', function() {
                    var form = $("#editBarangForm")[0];

                    var isValid = form.checkValidity();
                    form.classList.add('was-validated');

                    if (!isValid) {
                        event.preventDefault();
                        event.stopPropagation();
                    } else {
                        $.ajax({
                            type: "POST",
                            url: "barang/update.php",
                            data: $('#editBarangForm').serialize(),
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