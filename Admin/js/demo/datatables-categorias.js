// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable({
    "language": {
      "sProcessing":     "Procesando...",
      "sLengthMenu":     "Mostrar _MENU_ categorías",
      "sZeroRecords":    "No se encontraron categorías",
      "sEmptyTable":     "Aún no hay categorías",
      "sInfo":           "Mostrando categorías del _START_ al _END_ de un total de _TOTAL_ categorías",
      "sInfoEmpty":      "Mostrando categorías del 0 al 0 de un total de 0 categorías",
      "sInfoFiltered":   "(filtrado de un total de _MAX_ categorías)",
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
