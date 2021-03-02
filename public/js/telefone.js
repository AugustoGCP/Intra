
// let count = $('i').length

$('#add_edit').click(function(){
    addTelephoneField('#insert_edit')
})

$('#add').click(function(){

    addTelephoneField('#insert')

}) 

$(document).on('click', '#remove', function() {

    const id = $(this).parent().attr('id')
    $('#'+id).remove()

})

// $(document).ready(function() { 

    // $('.validate').mask('(00)0000-0000');

// });

$(document).on('change', '[type=tel]', function(){

    let insert = $(this).val()
    let size = insert.length

    if(size===10 || size===13)
        $(this).mask('(00)0000-0000');
    else if(size===11 || size===15)
        $(this).mask('(00)00000-0000');
    else
        alert('Campo telefone preenchido incorretamente.')

})

// $(document).on('click','#add', function() {

    // let count = ($('i').length)-1

    // var valor = $('[name=telefone[]]').val();
    // $('[name=telefone[]]').val(valor);    
    // $('[name=telefone[]]').val('')

// });




