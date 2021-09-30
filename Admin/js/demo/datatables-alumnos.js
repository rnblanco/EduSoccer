// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable({
    "language": {
      "sProcessing":     "Procesando...",
      "sLengthMenu":     "Mostrar _MENU_ alumnos",
      "sZeroRecords":    "No se encontraron alumnos",
      "sEmptyTable":     "Aún no hay alumnos",
      "sInfo":           "Mostrando alumnos del _START_ al _END_ de un total de _TOTAL_ alumnos",
      "sInfoEmpty":      "Mostrando alumnos del 0 al 0 de un total de 0 alumnos",
      "sInfoFiltered":   "(filtrado de un total de _MAX_ alumnos)",
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
