function eliminarImagen(id, urlDel, idElement) {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");

    let data = {
        "_token ": CSRF_TOKEN,
        id: id
    };

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });

    $.ajax({
        type: "POST",
        url: urlDel,
        data: data,
        dataType: "json",
        success: function(data) {
            swal({
                position: "top-end",
                type: "success",
                title: "Imagen Eliminada"
            });

            var nodo = document.getElementById("imagePanel");
            var element = document.getElementById(idElement);
            nodo.removeChild(element);
        },
        error: function(data) {
            swal({
                type: "error",
                title: "Error",
                text: "Se Presento Error en el Proceso"
            });
        }
    });
}
