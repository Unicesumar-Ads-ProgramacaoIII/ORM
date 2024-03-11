(function(window, document,undefined){
    function exclude(event){
        const exclude = confirm("Tem Certeza que deseja exclude este jogador?");
        if(exclude){
            const id = document.getElementById('id').value;
            window.location.replace(`/activeRecord/backend/routes/deletePlayer.php/?id=${id}`);
        }
        event.preventDefault();
    }

    function init(){
        const form = document.getElementById('formExclude');
        form.addEventListener("submit", exclude);
    }


    window.onload = init;
})(window, document, undefined)
