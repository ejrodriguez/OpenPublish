<script type="text/javascript">
    jQuery(document).ready(function(){
        // dynamic table
        oTable = jQuery('#{{ $id }}').dataTable({

        @foreach ($options as $k => $o)
            {{ json_encode($k) }}: {{ json_encode($o) }},
        @endforeach

        @foreach ($callbacks as $k => $o)
            {{ json_encode($k) }}: {{ $o }},
        @endforeach

        // cambiar el idioma. 
                            
        "lengthMenu": [ 10, 20, 30, 60, 100 ],
        "language": {
                        "info": "Mostrando del _START_ a _END_ (Total: _TOTAL_ resultados)",
                        "paginate": {
                                            "next": "Siguiente",
                                            "previous": "Anterior",
                                            "sFirst": "Primero",
                                            "sLast": "Ultimo",
                                    },
                        "search": "Buscar:",
                        "infoEmpty": "No hay registros que mostrar",
                        "infoFiltered": " - filtrados en _MAX_ registros en total",
                        "emptyTable": "No hay registros en la tabla",
                        "lengthMenu": "Ver _MENU_ registros",
                        "loadingRecords": "Espere un momento - cargando...",
                        "zeroRecords": "No hay registros coincidentes encontrados",
                    },
        });
    });

    var sel = $('#datatable-1').DataTable();
 
    $('#datatable-1 tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            sel.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );

</script>
