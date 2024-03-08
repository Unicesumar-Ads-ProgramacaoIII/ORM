(function(window, document,undefined){
    function excluir(event){
        const excluir = confirm("Tem Certeza que deseja excluir este jogador?");
        if(excluir){
            const id = document.getElementById('id').value;
            window.location.replace(`/backend/routes/deletePlayer.php/?id=${id}`);
        }
        event.preventDefault();
    }

    function init(){
        const form = document.getElementById('formExcluir');
        form.addEventListener("submit", excluir);
    }


    window.onload = init;
})(window, document, undefined)
