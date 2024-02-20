const tabelaBody = document.querySelector("#tabelaBodyLimpar");
const serv = "http://"+document.location.hostname+":8080/avancada/";
const CheckMarcarTodos=document.querySelector("#CheckMarcarTodosLimpar");
const filtragem=document.querySelector("#filtragem");


filtragem.addEventListener("keyup",(evt)=>{
    const linhas = [...document.querySelectorAll('.linhaTab')];
    let input,texto;
    input=evt.target.value;
    for (let i=0; i < linhas.length;i++) {
        console.log(linhas[i].children[1].innerHTML);
        texto=linhas[i].children[1].innerHTML;
        if(texto.indexOf(input)>-1){
            linhas[i].classList.remove("ocutarLinha");
        }else{
            linhas[i].classList.add("ocutarLinha");
        }
    }
});

function FormataDataBr(data){
    var dataF = new Date(data),
        dia  = dataF.getDate().toString().padStart(2, '0'),
        mes  = (dataF.getMonth()+1).toString().padStart(2, '0'), //+1 pois no getMonth Janeiro começa com zero.
        ano  = dataF.getFullYear();
    return dia+"/"+mes+"/"+ano;
}
const carregarDadosTab = (data) => {
    const trTab = document.createElement('tr');
    trTab.setAttribute("class","linhaTab");
    const thTab = document.createElement('td');


    const thTabId = document.createElement('td');
    thTabId.innerHTML = data.id;

    const thTabData = document.createElement('td');
    thTabData.innerHTML = FormataDataBr(data.data);

    // const thTabProntuário=document.createElement('td');
    // thTabProntuário.innerHTML=data.n_pront;

    // const thTabNome=document.createElement('td');
    // thTabNome.innerHTML=data.v_nome;

    const thTabManga = document.createElement('td');
    thTabManga.innerHTML = data.n_manga;


    const divCheck = document.createElement('div');
    divCheck.setAttribute("class", "form-check");
    const inputDivTab = document.createElement('input');
    inputDivTab.setAttribute("class", "form-check-input checkboxTab");
    inputDivTab.setAttribute("type", "checkbox");

    const thTabDel = document.createElement('td');
    const thTabDelImg = document.createElement('img');
    thTabDelImg.setAttribute('class', 'imgTd');
    thTabDelImg.setAttribute('src', 'img/delete.svg');
    thTabDelImg.addEventListener("click", (evt) => {
        nManga = thTabDelImg.parentNode.parentNode.childNodes[1].innerHTML;
        LimparManga(nManga);
    });

    thTabDel.appendChild(thTabDelImg);

    const thTabEdt = document.createElement('td');
    // const thTabEdtImg = document.createElement('img');
    // thTabEdtImg.setAttribute('class', 'imgTd');
    // thTabEdtImg.setAttribute('src', 'img/edit.svg');
    // thTabEdt.appendChild(thTabEdtImg);

    divCheck.appendChild(inputDivTab);
    thTab.appendChild(divCheck);
    // trTab.appendChild(thTabId);

    trTab.appendChild(thTab);
    // trTab.appendChild(thTabLoja);
    // trTab.appendChild(thTabDtzinho);
    //trTab.appendChild(thTabData);
    // trTab.appendChild(thTabProntuário);
    // trTab.appendChild(thTabNome);
    trTab.appendChild(thTabManga);
    trTab.appendChild(thTabDel);
    // trTab.appendChild(thTabEdt);

    tabelaBody.appendChild(trTab);

}

const fetchGetDt=()=>{
    url= serv +'controllers/controllerManga';
    fetch(url, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify()
    })
    .then(res=>res.json())
    .then(res=>{
        console.log(res);
        res.data.map((ev)=>{
            carregarDadosTab(ev);
        });
    })
}

fetchGetDt()

CheckMarcarTodos.addEventListener("change",(evt)=>{
    const checkboxTab=[...document.querySelectorAll(".checkboxTab")];
    if (CheckMarcarTodos.checked) {
        check=true;
      } else {
        check=false;
    }
    checkboxTab.map((evt)=>{
        evt.checked = check;
    });
});

const LimparManga=(Manga)=>{
    const dados={
        manga:Manga
    }
    url= serv +'controllers/controllerManga'
    fetch(url, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(dados)
    })
    .then(res=>{
        // Verificar o status da resposta
        if (!res.ok) {
            throw new Error(`Erro na requisição: ${res.status}`);
        }else{
            tabelaBody.innerHTML="";
            fetchGetDt();
        }
    })

}