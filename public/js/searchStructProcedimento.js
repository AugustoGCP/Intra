var jsonValue

$(document).on('change', '#cod_procedimento', function(){

    let valor = $(this).val()

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: '/dashboard/procedimento/edit',
        type: 'POST',
        data: {valor},
        success: function(response){
            
            $('#nome_procedimento_edit').val(response[0]['nome_procedimento'])
            $('#cabecalho_procedimento_edit').val(response[0]['cabecalho_procedimento']) 

            $('#alter').val(quillBox.setContents(JSON.parse(response[0]['corpo_procedimento'])))   
        }
    })
})


