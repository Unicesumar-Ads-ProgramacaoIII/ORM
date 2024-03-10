(function (window, document, undefined) {
  function alter(event) {
    event.preventDefault();
    const alter = confirm("Tem Certeza que deseja alterar este jogador?");
    if (alter) {
      const form = document.getElementById("formAlter");
      const body = {
        id: form.id.value,
        nome: form.nome.value,
        email: form.email.value,
      }
      axios
        .post(`/backend/routes/dataMapper/alterPlayer.php/`, body, {
          headers: {
            "Content-Type": "application/x-www-form-urlencoded",
          },
        })
        .then((response) => {
          console.log(response);
          const resJson = JSON.parse(response.data);
          form.hidden = true;
          if (resJson.success) {
            document.getElementById("success").hidden = false;
          } else {
            document.getElementById("error").hidden = false;
          }
        });
    }
  }

  function init() {
    const form = document.getElementById("formAlter");
    form.addEventListener("submit", alter);
  }

  window.onload = init;
})(window, document, undefined);
