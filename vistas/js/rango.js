$(function () {
  /**Capturar Local Storage**/
  if (localStorage.getItem("capturarRango") != null) {
    $("#daterange-btn span").html(localStorage.getItem("capturarRango"));
  } else {
    $("#daterange-btn span").html(
      '<i class="far fa-calendar-alt"></i> Rango de Fecha'
    );
  }

  //Date range as a button
  $("#daterange-btn").daterangepicker(
    {
      ranges: {
        "Hoy": [moment(), moment()],
        "Ayer": [moment().subtract(1, "days"), moment().subtract(1, "days")],
        "Últimos 7 días": [moment().subtract(6, "days"), moment()],
        "Últimos 30 días": [moment().subtract(29, "days"), moment()],
        "Este mes": [moment().startOf("month"), moment().endOf("month")],
        "Ultimo mes": [
          moment().subtract(1, "month").startOf("month"),
          moment().subtract(1, "month").endOf("month"),
        ],
      },
      startDate: moment(),
      endDate: moment(),
    },
    function (start, end) {
      $("#daterange-btn span").html(
        start.format("MMMM D, YYYY") + " - " + end.format("MMMM D, YYYY")
      );

      var fechaInicial = start.format("YYYY-MM-DD");

      var fechaFinal = end.format("YYYY-MM-DD");

      var capturarRango = $("#daterange-btn span").html();

      localStorage.setItem("capturarRango", capturarRango);

      window.location =
        "index.php?ruta=detalleRuta&fechaInicial=" +
        fechaInicial +
        "&fechaFinal=" +
        fechaFinal;
    }
  );

  //CANCELAR RANGO DE FECHAS
  $(".daterangepicker .drp-buttons .cancelBtn").on("click", function () {
    localStorage.removeItem("capturarRango");
    localStorage.clear();
    window.location = "detalleRuta";
  });
});
