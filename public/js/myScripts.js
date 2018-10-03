function filtrar() {
    var sn_jacuzi = $("#chkJacuzi").is(":checked");
    var sn_piscina = $("#chkPiscina").is(":checked");
    var via_id = $("input:radio[name=optVia]:checked").val();
    var habitaciones = $("#txtHabitaciones").val();
    var banios = $("#txtBanios").val();

    var prueba = [sn_jacuzi, sn_piscina, via_id, habitaciones, banios];

    $.get(
        "filtrarFincas?snJacuzi=" +
            sn_jacuzi +
            "&snPiscina=" +
            sn_piscina +
            "&via=" +
            via_id +
            "&habitaciones=" +
            habitaciones +
            "&banios=" +
            banios,
        function(result) {
            $("#contFincas").html(result);
        }
    );
}

function detailFarm(id) {
    alert(id);
}

// $(document).on("click", "", function(e) {});

$(document).on("click", ".pagination a", function(e) {
    if (
        $(this)
            .attr("href")
            .indexOf("filtrarFincas") != -1
    ) {
        e.preventDefault();

        var page = $(this)
            .attr("href")
            .split("page=")[1];

        getFarmsWithFilter(page);

        return;
    }

    if (
        $(this)
            .attr("href")
            .indexOf("fincas") != -1
    ) {
        e.preventDefault();

        var page = $(this)
            .attr("href")
            .split("page=")[1];

        if (
            $(this)
                .attr("href")
                .indexOf("p=true") != -1
        ) {
            getFarms(page, true);
        } else {
            getFarms(page);
        }

        return;
    }
});

function getFarms(page, post = false) {
    if (post) {
        $.ajax({ url: "fincas?p=true&page=" + page }).done(function(data) {
            $("#contFincas").html(data);
        });
    } else {
        $.ajax({ url: "fincas?page=" + page }).done(function(data) {
            $("#contFincas").html(data);
        });
    }
}

function getFarmsWithFilter(page) {
    $.ajax({ url: "filtrarFincas?page=" + page }).done(function(data) {
        $("#contFincas").html(data);
    });
}

function validaFecha(fecDesde, fecHasta) {
    document.querySelector("#dpEntradaModal").value = fecDesde;
    document.querySelector("#dpSalidaModal").value = fecHasta;
}

function clonarFecha(fecha, diaAdicional = 0) {
    var fecha = new Date(
        fecha.getFullYear(),
        fecha.getMonth(),
        fecha.getDate() + diaAdicional,
        0,
        0,
        0,
        0
    );
    fecha.setMinutes(fecha.getMinutes() + fecha.getTimezoneOffset()); // corrige el dia que se descontaba por zona horaria
    return fecha;
}

function dateToStringValido(date) {
    var curr_date1 = date.getDate();
    var curr_month1 = date.getMonth() + 1; //Months are zero based
    var curr_year1 = date.getFullYear();
    return (
        (curr_date1.toString().length == 1 ? "0" + curr_date1 : curr_date1) +
        "/" +
        (curr_month1.toString().length == 1 ? "0" + curr_month1 : curr_month1) +
        "/" +
        curr_year1
    );
}
