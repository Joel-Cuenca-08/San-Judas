$(function () {
    /**Capturar Local Storage**/
    if (localStorage.getItem("capturarRango2") != null) {
      $("#daterange-btn2 .span").html(localStorage.getItem("capturarRango2"));
    } else {
      $("#daterange-btn2 span").html(
        '<i class="far fa-calendar-alt"></i> Rango de Fecha'
      );
    }
    //Date range as a button
  $("#daterange-btn2").daterangepicker(
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
      $("#daterange-btn2 span").html(
        start.format("MMMM D, YYYY") + " - " + end.format("MMMM D, YYYY")
      );

      var fechaInicial = start.format("YYYY-MM-DD");

      var fechaFinal = end.format("YYYY-MM-DD");

      var capturarRango = $("#daterange-btn2 span").html();

      localStorage.setItem("capturarRango2", capturarRango);

      window.location ="index.php?ruta=reporte&fechaInicial=" +
        fechaInicial +
        "&fechaFinal=" +
        fechaFinal;
    }
  );

  //CANCELAR RANGO DE FECHAS
  $(".daterangepicker .drp-buttons .cancelBtn").on("click", function () {
    localStorage.removeItem("capturarRango2");
    localStorage.clear();
    window.location = "reporte";
  });
});