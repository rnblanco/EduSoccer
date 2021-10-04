// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable({
    "language": {
      "sProcessing":     "Procesando...",
      "sLengthMenu":     "Mostrar _MENU_ pagos",
      "sZeroRecords":    "No se encontraron pagos",
      "sEmptyTable":     "No se encontraron pagos",
      "sInfo":           "Mostrando pagos del _START_ al _END_ de un total de _TOTAL_ pagos",
      "sInfoEmpty":      "Mostrando pagos del 0 al 0 de un total de 0 pagos",
      "sInfoFiltered":   "(filtrado de un total de _MAX_ pagos)",
      "sInfoPostFix":    "",
      "sSearch":         "Buscar:",
      "sUrl":            "",
      "sInfoThousands":  ",",
      "sLoadingRecords": "Cargando...",
      "oPaginate": {
        "sFirst":    "Primera",
        "sLast":     "Última",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
      },
      "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      },
      "buttons": {
        "copy": "Copiar",
        "colvis": "Visibilidad"
      }
    }

  });
});
