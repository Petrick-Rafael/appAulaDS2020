$(document).ready(function() {
    $('#table-cliente').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "src/cliente/model/list-cliente.php",
            "type": "POST"
        },
        "language": {
            "url": "libs/DataTables/dataTables.brazil.json"
        },
        "columns": [{
                "data": "idcliente",
                "className": "text-center"
            },
            {
                "data": "nome",
                "className": "text-center"
            },
            {
                "data": "datamodificacao",
                "className": "text-center"
            },
            {
                "data": "ativo",
                "orderable": false,
                "serchable": false,
                "className": "text-center",
                "render": function(data, type, row, meta) {
                    return data == 'S' ? 'Ativo' : 'Não Ativo'
                }
            },
            {
                "data": "idcliente",
                "orderable": false,
                "serchable": false,
                "className": "text-center",
                "render": function(data, type, row, meta) {
                    return `
                    <button id="${data}" class="btn btn-info btn-sm btn-view"><i class="mdi mdi-eye"></i></button>
                    <button id="${data}" class="btn btn-primary btn-sm btn-edit"><i class="mdi mdi-pencil"></i></button>
                    <button id="${data}" class="btn btn-danger btn-sm btn-delete"><i class="mdi mdi-trash-can"></i></button>
                    `
                }
            }
        ]
    })
})