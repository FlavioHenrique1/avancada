function pularProximoCampo(event) {
    if (event.keyCode === 13) {
        event.preventDefault();
        var campos = document.querySelectorAll('input');
        for (var i = 0; i < campos.length; i++) {
            if (campos[i] === document.activeElement) {
                var proximoCampo = campos[i + 1];
                if (proximoCampo) {
                    proximoCampo.focus();
                    break;
                } else {
                    // Se o último campo for alcançado, envie o formulário
                    document.forms[0].submit();
                }
            }
        }
    }
}

const btnFormEntre = document.querySelector("#btnFormEntre");
//Salvar nova atividade para o banco de dados
btnFormEntre.addEventListener("click", (evt) => {
    const numMangas = document.querySelector("#manga").value;
    const local = document.querySelector("#local").value;

    const dados = {
        numMangas: numMangas,
        local:local
    }
    url = serv + 'controllers/controllerManga'
    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(dados)
    })
    .then(res => res.json())
    .then(res => {
        if(res.retorno == 'erro'){
            res.erros.map(evt=>{
                alert(evt);
            });
        }else{
            alert("Dados Salvo com sucesso!");
            location.reload();
        }
    })

})