$('#form_procedimento').submit(function(){

    let value = JSON.stringify(quill.getContents())
    
    $('[name=corpo_procedimento]').val(value)

    return true

})

$('#form_procedimento_edit').submit(function(){

    let value = JSON.stringify(quillBox.getContents())
    
    $('[name=corpo_procedimento_edit]').val(value)

    return true

})