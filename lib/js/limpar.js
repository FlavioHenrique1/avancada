const dtInput=document.querySelector("#dtInput");
//Criar a div dos dtzinhos
dtInput.addEventListener("keyup",(evt)=>{
    let qtd = parseInt(qtdFormDt.innerHTML, 10); // Converte para número

    if(evt.key == "Enter"){
        const dts= [...document.querySelectorAll(".numDt")];
        erro = false;
        dts.map((ev)=>{
            if(ev.innerHTML == evt.target.value){
                alert("Manga ja foi bipado!");
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

//Lançar dados do form
//Salvar nova atividade para o banco de dados
btnFormLanc.addEventListener("click",(evt)=>{
    const dts= [...document.querySelectorAll(".numDt")];
    let numMangas=[];
    let erro=false;

    if(erro == false){
        dts.forEach(t=>{
            numMangas.push(t.innerHTML);
        });
        const dados={
            Dts:numMangas
        }
        url= serv +'controllers/controllerManga'
        fetch(url, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(dados)
        })
        .then(res=>res.json())
        .then(res=>{
            alert("Mangas limpos com sucesso!");
            location.reload();
        })
    }
    
})