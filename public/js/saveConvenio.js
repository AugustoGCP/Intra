$(document).ready(function(){

    $('#cadastrar_convenio').validate({
        rules: {
            nome_convenio: {
                required: true
            },
            rua_convenio: {
                required: true
            },
            bairro_convenio: {
                required: true
            },
            cidade_convenio: {
                required: true
            }
        }
    })

    $('#cadastrar_convenio').click(function(){

        var dados = $('#form_cadastro_convenio').serializeObject();

        var data = JSON.stringify(dados)

        console.log(dados.lenght)

        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });

        // $.ajax({
        //     url: '/dashboard/convenio/store',
        //     type: 'POST',
        //     data:{data},
        //     beforeSend: function(){
        //         M.toast({
        //                 html: 'Processando...', 
        //                 classes: 'rounded', 
        //                 inDuration: '150', 
        //                 activationPercent: '0.3'
        //             });
        //     },
        //     success: function(response){
        //         console.log(typeof(response))
        //         console.log(response)
        //         M.toast({
        //             html: 'Cadastrado com sucesso!', 
        //             classes: 'rounded green', 
        //             inDuration: '150', 
        //             activationPercent: '0.3'
        //         });
        //     },
        //     error: function(){
        //         M.toast({
        //             html: 'Falha ao processar.', 
        //             classes: 'rounded red', 
        //             inDuration: '150', 
        //             activationPercent: '0.3'
        //         });
        //     }
        // })
    })
})