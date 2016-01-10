
$(document).ready(function () {
    $.ajax({
        url: '../../model/components/manejadores/ManejadorConsultarImpresora.php',
        type: 'post',
        data: {tag: 'getData'},
        dataType: 'json',
        success: function (data) {
            if (data.success) {
                $.each(data, function (index, record) {
                    if ($.isNumeric(index)) {
                        
                        switch (record.estado) {
                            case 'DESECHO':
                                var row = $("<tr class='danger' />");
                                break;
                            case 'MALO':
                                var row = $("<tr class='warning' />");
                                break;
                            case 'OFICIAL':
                                var row = $("<tr class='success' />");
                                break;
                            case 'REPARACION':
                                var row = $("<tr class='info' />");
                                break;
                            case 'GARANTIA':
                                var row = $("<tr class='info' />");
                                break;
                        }

                        $("<td />").text(record.placa).appendTo(row);
                        $("<td />").text(record.marca).appendTo(row);
                        $("<td />").text(record.modelo).appendTo(row);
                        $("<td />").text(record.serie).appendTo(row);
                        $("<td />").text(record.tipo).appendTo(row);
                        $("<td />").text(record.consumible).appendTo(row);
                        $("<td />").text(record.oficina).appendTo(row);
                        $("<td />").text(record.estado).appendTo(row);
                        row.appendTo("#tbConsultarImpresora");
                    }
                })
            }

            $('#tbConsultarImpresora').dataTable({
                "bJQueryUI": true,
                "sPaginationType": "full_numbers"
            })
        }
    });
});
