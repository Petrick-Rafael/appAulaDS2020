$(document).ready(function() {

    $('.categoria').click(function(e) {
        e.preventDefault()
        $('#conteudo').empty()
        $('#conteudo').load('src/categories/view/list-categoria.html')
    })
})