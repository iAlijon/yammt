$(document).ready(function (){

    $('.summernote').summernote({
        height: 300,
        focus: true
    });

    $('.combodate').combodate({
        value: new Date(),
        minYear: 2012,
        maxYear: moment().format('YYYY'),
        template: 'DD MM YYYY',
    })

    $('#changeImage').click(function (e){
        e.preventDefault();
        $('#imageBox').slideUp();
        $('#imageInput').slideDown();
    })
    $('#cancelChangeImage').click(function (e){
        e.preventDefault();
        $('#imageBox').slideDown();
        $('#imageInput').slideUp();
    })
})
