
$(document).ready(function () {
    $.ajax({
        url: '../../model/components/manejadores/ManejadorConsultarComputadora.php',
        type: 'post',
        data: {tag: 'getData'},
        dataType: 'json',
        success: function (data) {
            if (data.success) {
                $.each(data, function (index, record) {
                    if ($.isNumeric(index)) {
                        var row = $("<tr />");
                        $("<td />").text(record.placa).appendTo(row);
                        $("<td />").text(record.marca).appendTo(row);
                        $("<td />").text(record.modelo).appendTo(row);
                        $("<td />").text(record.serie).appendTo(row);
                        $("<td />").text(record.tipo).appendTo(row);
                        $("<td />").text(record.oficina).appendTo(row);
                        $("<td />").text(record.estado).appendTo(row);
                        row.appendTo("#tbConsultarComputadora");
                    }
                })
            }

            $('#tbConsultarComputadora').dataTable({
                "bJQueryUI": true,
                "sPaginationType": "full_numbers"
            })
        }
    });
});
