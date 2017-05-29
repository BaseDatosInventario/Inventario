/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function() {
    function sumar()  {
    $('#example').DataTable( {
        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // Total over all pages
            total = api
                .column( 5 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 5, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            $( api.column( 5 ).footer() ).html(
                '$'+pageTotal +' ( $'+ total +' total)'
            );
        }
    } );
    }
  /*--------------------------- para eliminar una fila------------------------*/
    
    var table = $('#example').DataTable();
 
$('#example tbody').on( 'click', '.glyphicon.glyphicon-trash', function () {
    table
        .row( $(this).parents('tr') )
        .remove()
        .draw();
} );
    
    
    var t = $('#example').DataTable();
    var counter = 10;
 
    $('#addRow').on( 'click', function () {
        t.row.add( [
            '<input name="cantidad[]" type="number"/>',
            counter +'.2',
            counter +'.3',
            counter +'.4',
            counter +'.5',
            counter+1000,
            '<button class="btn btn-danger"><span class="glyphicon glyphicon-trash">Eliminar</span></button>'
        ] ).draw( false );
 
        counter++;
    } );
 
    // Automatically add a first row of data
   // $('#addRow').click();
} );
