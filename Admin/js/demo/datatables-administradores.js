// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable({
    "language": {
      "sProcessing":     "Procesando...",
      "sLengthMenu":     "Mostrar _MENU_ administradores",
      "sZeroRecords":    "No se encontraron administradores",
      "sEmptyTable":     "Aún no hay administradores",
      "sInfo":           "Mostrando administradores del _START_ al _END_ de un total de _TOTAL_ administradores",
      "sInfoEmpty":      "Mostrando administradores del 0 al 0 de un total de 0 administradores",
      "sInfoFiltered":   "(filtrado de un total de _MAX_ administradores)",
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
    },
    "columnDefs": [{                 
      "targets": [5],
      "width": "5%",
    }],
    "columnDefs": [{                 
      "targets": [6],
      "width": "7%",
    }]

  });
});
