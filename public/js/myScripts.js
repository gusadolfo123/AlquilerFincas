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

        getFarm(page);
    }
});

function getFarm(page) {
    $.ajax({ url: "filtrarFincas?page=" + page }).done(function(data) {
        $("#contFincas").html(data);
    });
}
