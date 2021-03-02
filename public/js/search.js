
$('[name=search]').keyup(function(){
    
    let valor = $(this).val()

    let dados = {
        palavra: valor
    }

    if(dados['palavra'] === '')
        $('.insert').empty()
    else
        search(dados)  

})