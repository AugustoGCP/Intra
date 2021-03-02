$(document).ready(function(){

    $('#cod_convneio').change(function(){  

        let cod = $(this).val()

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '/dashboard/convenio/find',
            type: 'POST',
            data: {cod},
            success: function(response){

                $('#insert_edit').empty()

                $('#nome_edit').val(response['nome_convenio'])
                $('#rua_edit').val(response['rua_convenio'])
                $('#bairro_edit').val(response['bairro_convenio'])
                $('#cidade_edit').val(response['cidade_convenio'])

                for(var i=0;i<response['telefones'].length;i++){

                    const htmlString = '<div id="telefone'+i+'" class="input-field col s2"><input maxlength="15" id="edit-'+i+'" name="telefone[]" type="tel" class="validate"><a id="remove" class="btn-floating btn-small waves-effect waves-light red"><i class="material-icons">remove</i></a><label for="icon_telephone">Telefone</label></div>'

                    $(htmlString).appendTo('#insert_edit')

                    $('#edit-'+i).val(response['telefones'][i]['numero_telefone'])

                }
            }
        })
    })
})



