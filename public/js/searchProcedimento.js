$(document).on('change', '#cod_convenioEdit', function(){

    let valor = $(this).val()

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: '/dashboard/procedimento/find',
        type: 'POST',
        data: {valor},
        beforeSend: function(){

            $('#procedimentos').hide()
            $('#loader').show()

        },
        success: function(response){
            
            $('#loader').hide()
            $('#procedimentos').show()
            $('#cod_procedimento').empty()
            $('<option disabled selected>Escolha o Procedimento</option>').appendTo('#cod_procedimento')

            for(var i=0;i<response.length;i++){
            
                const tagHTML = '<option value="'+response[i]['cod_procedimento']+'">'+response[i]['nome_procedimento']+'</option>'
            
                $(tagHTML).appendTo('#cod_procedimento')
            
            }
        }
    })

    $(document).on('ready', function(){
        $('#cod_procedimento').select2()
    })
        
})


    