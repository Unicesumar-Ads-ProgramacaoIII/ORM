(function (window, document, undefined) {
    function init() {
        const table = document.getElementById("table");
        const items = table.tBodies[0].rows.length;
        console.log(items);
        if(items === 0) {
            table.hidden = true;
            const noData = document.getElementById("noData");
            noData.hidden = false;
        }
    }

    window.onload = init;
})(window, document, undefined);