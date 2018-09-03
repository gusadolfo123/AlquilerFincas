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
