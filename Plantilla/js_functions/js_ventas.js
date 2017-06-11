
$(document).ready(function () {

    var table = $('#example').DataTable();

    $('#example tbody').on('click', '.glyphicon.glyphicon-trash', function () {
        table
                .row($(this).parents('tr'))
                .remove()
                .draw();
    });


    var t = $('#example').DataTable();
    var counter = 1;

    $('#addRow').on('click', function () {
        t.row.add([
            counter + '.1',
            counter + '.2',
            counter + '.3',
            counter + '.4',
            counter + '.5',
            '<button class="btn btn-danger"><span class="glyphicon glyphicon-trash">Eliminar</span></button>'
        ]).draw(false);

        counter++;
    });

    // Automatically add a first row of data
    $('#addRow').click();
});
