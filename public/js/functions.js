function search(dados){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url:'/search/convenio/search',
        type: 'POST',
        data: {dados},
        beforeSend: function(){  
                
            $('.loading').empty()

            const html = '<div class="container"><div class="progress"><div class="indeterminate"></div></div></div>'

            $(html).appendTo('.loading')

        },

        success: function(result){
        
            //Utilize este console.log para verificar se o retorno
            //do back-end está correto.

            console.log(result)

            $('.insert').empty()
            $('.loading').empty()

            for(var i=0;i<result.length;i++){
                
                for(var a=0;a<result[i].length;a++){

                    const cardFull = '<div class="col s12 m7 margin-bottom-2"><div class="card horizontal"><div class="card-image"><img class="activator" src="https://picsum.photos/id/1043/5184/3456"></div><div class="card-stacked"><div class="card-content"><span class="card-title activator grey-text text-darken-4">'+result[i][a]['nome_convenio']+'</span><a href="/procedimento/'+result[i][a]['cod_convenio']+'/'+result[i][a]['cod_procedimento']+'" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a><p class="margin-bottom">'+result[i][a]['cabecalho_procedimento']+'</p><p id="telefones">Telefones: </p></div></div></div></div>'

                    //Utilize este console.log para verificar se o array
                    //está sendo preecnhido corretamente com os telefones.

                    // console.log(telefones)

                    $(cardFull).appendTo('.insert')

                    // for(var j=0;j<result[i][a]['telefones'].length;j++){
                    //     $('#telefones').val(result[i][a]['telefones'][j])
                    // } 

                }
                
            }                    
            
        },
        error: function(){
            
            $('.insert').empty()
            $('.loading').empty()

            const searchEmpty = '<h4 class="truncate center-align">Nenhum Convênio ou Procedimento encontrado.</h>'
            
            $(searchEmpty).appendTo('.insert')

        }
    })
}

function addTelephoneField(id){

    let count = $('i').length

    const htmlString = '<div id="telefone'+count+'" class="input-field col s2"><input maxlength="15" id="input-field col s3 icon_telephone" name="telefone[]" type="tel" class="validate"><a id="remove" class="btn-floating btn-small waves-effect waves-light red"><i class="material-icons">remove</i></a><label for="icon_telephone">Telefone</label></div>'

    $(htmlString).appendTo(id)

}

