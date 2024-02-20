const tdzinho=document.querySelector("#tdzinho");
const deldtzinho=document.querySelector("#deldtzinho");
const dtInput=document.querySelector("#dtInput");
const qtdFormDt=document.querySelector("#qtdFormDt");
const prontuario = document.getElementById('pronutuario');
const nome = document.getElementById('nome');
const btnFormLanc= document.getElementById('btnFormLanc');
const selectElement = document.getElementById("LojasForm");
const manga=document.getElementById("manga");
//Criar a div dos dtzinhos
dtInput.addEventListener("keyup",(evt)=>{
    let qtd = parseInt(qtdFormDt.innerHTML, 10); // Converte para número
    if(evt.key == "Enter"){
        const dts= [...document.querySelectorAll(".numDt")];
        erro = false;
        dts.map((ev)=>{
            console.log(ev.innerHTML);
            if(ev.innerHTML == evt.target.value){
                alert("Dtzinho ja foi bipado!");
                dtInput.value = "";
                erro = true;
            }
            // if(ev.innerHTML == evt.target.value)
        });
        if(evt.target.value != "" && erro==false){
            const divDt = document.createElement("div");
            divDt.setAttribute("class","dt");
    
            const divNumDt=document.createElement("div");
            divNumDt.setAttribute("class","numDt");
            divNumDt.innerHTML = evt.target.value;
            divDt.appendChild(divNumDt);
            const deldtzinho=document.createElement("img");
            deldtzinho.setAttribute("class","deldtzinho");
            deldtzinho.setAttribute("src",serv+"img/delete.png");
            deldtzinho.addEventListener("click",(evt)=>{
                let qtd = parseInt(qtdFormDt.innerHTML, 10); // Converte para número
                evt.target.parentNode.remove();
                qtd -= 1;
                qtdFormDt.innerHTML=qtd;
            });
            divDt.appendChild(deldtzinho);
            tdzinho.appendChild(divDt);
            evt.target.value="";
            qtd += 1;
            qtdFormDt.innerHTML=qtd;
        }
    }
});

// -------------------------------------------
//buscar lojas no bd e inserir no select
let endpoint = serv+ "/controllers/controllerApoio/lojas";
fetch(endpoint)
.then(res=>res.json())
.then((res)=>{
    if(selectElement){     
        // Passo 2: Execute a função que retorna os dados
        var dadosLojas = res;
        // Adicione novas opções ao <select> do setor
        dadosLojas.forEach(function(dado) {
            var optionElement = document.createElement("option");
            optionElement.value = dado.id; // Defina o valor do <option>
            optionElement.text = dado.n_loja; // Defina o texto do <option>
            selectElement.appendChild(optionElement);
        });
    }
});

//buscar nome no bd e inserir no select
prontuario.addEventListener('blur', function() {
    nome.value="";
    if(prontuario.value !== ""){
        endpoint = serv+ `/controllers/controllerApoio/nome/${prontuario.value}`;
        fetch(endpoint)
        .then(res=>res.json())
        .then((res)=>{
            if(res == false){
                alert("Prontuario nao encontrado!");
            }else{
                nome.value = res.v_nome
            }
        });
    }
});

//Lançar dados do form
//Salvar nova atividade para o banco de dados
btnFormLanc.addEventListener("click",(evt)=>{
    const formData = new FormData(document.getElementById('formLanc'));
    const dts= [...document.querySelectorAll(".numDt")];
    const nome= document.querySelector("#nome");
    let numDts=[];
    let erro=false;
    if(dts.length == 0){
        alert("Dt esta sem preenchimento");
        erro = true;
    }
    
    for (const [campo, valor] of formData.entries()) {
        if(valor == ""){
            alert(campo + " esta sem preenchimento");
            erro = true;
        }
    }
    if(selectElement.value == ""){
        alert("Loja esta sem preenchimento");
        erro = true;
    }
    if(nome.value == ""){
        alert("Favor verificar o prontuário digitado!");
        erro = true;
    }
    if(erro == false){
        dts.forEach(t=>{
            numDts.push(t.innerHTML);
        });
        const dados={
            pront:prontuario.value,
            loja:selectElement.value,
            manga:manga.value,
            Dts:numDts
        }
        url= serv +'controllers/controllerDtzinho'
        fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(dados)
        })
        .then(res=>res.json())
        .then(res=>{
            if(res.retorno == 'erro'){
                res.erros.map(evt=>{
                    alert(evt);
                });
            }else{
                alert("Dados Salvo com sucesso!");
                location.reload();
            }
        })
    }
    // // Desabilita o botão de envio ao ser clicado
    // botaoEnvio.disabled = true
    // // Mostra uma mensagem de "aguarde"
    // botaoEnvio.textContent = 'Salvando...'
    
})