$('.waves-effect').click(function(){

    let element = $('.active')

    $(this).removeClass('waves-effect').addClass('active')
    $(element).removeClass('active').addClass('waves-effect')

    const children = $(this).children()

    // console.log(children[0]['innerHTML'])
    search(children[0]['innerHTML'])

})