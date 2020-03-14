function validaProdutos() {

    if( document.getElementById("nome").value == "" ) {
        alert("Digite o campo nome") ;
        return false ;
    } 

    if( document.getElementById("preco").value == "0,00" ) {
        alert("Digite o campo Preço") ;
        return false ;
    }

    if( document.getElementById("id_tipo_produtos").value == "" ) {
        alert("Selecione o tipo de produto") ;
        return false ;
    }

    return true ;

}