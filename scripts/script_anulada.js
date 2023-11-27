var search = document.getElementById('pesquisar');
function searchData()
{
    window.location = 'listar_pergunta_anulada.php?search='+search.value;
}