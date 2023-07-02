let tablaProductos = $("#tablaProductos");
let key;
$(document).ready(function () {
    listarProductos();
});
function listarProductos() {
    let tabla = tablaProductos
        .dataTable({
            aProcessing: true,
            aServerSide: true,
            responsive: true,
            ordering: false,
            //"scrollY": "350px",
            //scrollX: false,
            //"scrollCollapse": true,
            //"paging":false,
            ajax: {
                url: "/products",
                type: "get",
                dataType: "json",
                error: function (e) {
                    console.log(e.responseText);
                },
            },
            initComplete: function () {
                numeracion(tabla);
                //$('#global_filter').focus();
            },
            bDestroy: true,
            iDisplayLength: 25,
            order: [[0, "desc"]],
        })
        .DataTable();
    return false;
}
$("#btnNuevo").click(function (e) {
    e.preventDefault();
    listarCategorias();
});
$("#formulario").submit(function (e) {
    e.preventDefault();

    var formData = new FormData(this);

    $.ajax({
        url: $(this).attr("action"),
        type: $(this).attr("method"),
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            if (response === "success") {
                toastr.success("Operación exitosa");
                $("#formulario").trigger("reset");
                tablaProductos.DataTable().ajax.reload();
            } else {
                toastr.error("Ocurrió un error");
            }
        },
        error: function (xhr, status, error) {
            console.error(error);
        },
    });
});

$(document).on("click", ".btn-editar", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    listarCategorias();
    $.ajax({
        url: "/products/" + id,
        type: "get",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            $("#nameEdit").val(response["name"]);
            $("#descriptionEdit").val(response["description"]);
            $("#priceEdit").val(response["price"]);
            $("#stockEdit").val(response["stock"]);
            $("#categoryEdit").val(response["category_id"]);
            key = response["id"];
            $("#modalEdit").modal("show");
        },
        error: function (xhr, status, error) {
            console.error(error);
        },
    });
});

$('#formularioEdit').submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        url: '/products/' + key,
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            toastr.success(response["message"]);
            $("#formularioEdit").trigger("reset");
            tablaProductos.DataTable().ajax.reload();
            $('#modalEdit').modal('hide');
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
});

$(document).on("click", ".btn-eliminar", function (e) {
    e.preventDefault();
    let id = $(this).data("id");
    Swal.fire({
        title: "Advertencia",
        text: "¿Está seguro de eliminar este producto?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si",
        cancelButtonText: "No",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "/products/" + id,
                type: "delete",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                success: function (response) {
                    toastr.success(response["message"]);
                    tablaProductos.DataTable().ajax.reload();
                },
                error: function (xhr, status, error) {
                    console.error(error);
                },
            });
        }
    });
});
function listarCategorias() {
    $.ajax({
        url: "/categorias/listar",
        method: "GET",
        success: function (response) {
            $("#category").html('').append('<option value="0">Seleccionar</option>');
            response.forEach((element) => {
                $("#category").append(
                    '<option value="' +
                        element["id"] +
                        '">' +
                        element["name"] +
                        "</option>"
                );
                $("#categoryEdit").append(
                    '<option value="' +
                        element["id"] +
                        '">' +
                        element["name"] +
                        "</option>"
                );
            });
        },
        error: function (xhr, status, error) {
            console.error(error);
        },
    });
}
