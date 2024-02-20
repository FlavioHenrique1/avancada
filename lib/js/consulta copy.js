const tabelaBody = document.querySelector("#tabelaBody");
const serv = "http://"+document.location.hostname+":8080/avancada/";
const CheckMarcarTodos=document.querySelector("#CheckMarcarTodos");
const filtCon=document.querySelector("#filtCon");
const tabelaDtzinho=document.querySelector("#tabelaDtzinho");


filtCon.addEventListener("keyup", (evt) => {
    const linhas = [...document.querySelectorAll('.linhaTabCon')];
    let input, texto;
    input = evt.target.value.toUpperCase();
    // Obtém todos os elementos de input do tipo rádio com o name "opcao"
    var opcoes = document.querySelectorAll('input[name="radioPesq"]');

    // Inicializa uma variável para armazenar a opção marcada
    var opcaoMarcada = null;

    // Itera sobre os elementos de opção para verificar qual está marcado
    opcoes.forEach(function (opcao) {
        if (opcao.checked) {
            opcaoMarcada = opcao.id;
        }
    });
    // Usa um switch para realizar a lógica com base na opção marcada
    switch (opcaoMarcada) {
        case 'manga':
            x = 6;
            break;
        case 'data':
            x = 3;
            break;
        case 'loja':
            x = 1;
            break;
        case 'dtzinho':
            x = 2;
            break;
        case 'usuario':
            x = 5;
            break;
        default:
            x = 1;
    }
    // fazer um loop na coluna e filtrar os dados
    for (let i = 0; i < linhas.length; i++) {
        texto=linhas[i].children[x].innerHTML.toUpperCase();
        if(texto.indexOf(input)>-1){
            linhas[i].classList.remove("ocutarLinha");
        }else{
            linhas[i].classList.add("ocutarLinha");
        }
    }
});
//formatar a data para o padrão
function FormataDataBr(data){
    var dataF = new Date(data),
        dia  = dataF.getDate().toString().padStart(2, '0'),
        mes  = (dataF.getMonth()+1).toString().padStart(2, '0'), //+1 pois no getMonth Janeiro começa com zero.
        ano  = dataF.getFullYear();
    return dia+"/"+mes+"/"+ano;
}

// carregar os dados da tabela
const carregarDadosTab=(data)=>{
    const trTab=document.createElement('tr');
    const thTab=document.createElement('td');
    trTab.setAttribute("class","linhaTabCon");

    
    const thTabId=document.createElement('td');
    thTabId.innerHTML=data.id;

    const thTabDtzinho=document.createElement('td');
    thTabDtzinho.innerHTML=data.n_dtzinho;
    
    const thTabLoja=document.createElement('td');
    thTabLoja.innerHTML=data.v_loja;

    const thTabData=document.createElement('td');
    thTabData.innerHTML=FormataDataBr(data.data);

    const thTabProntuário=document.createElement('td');
    thTabProntuário.innerHTML=data.n_pront;

    const thTabNome=document.createElement('td');
    thTabNome.innerHTML=data.v_nome;

    const thTabManga=document.createElement('td');
    thTabManga.innerHTML=data.n_manga;



    const divCheck=document.createElement('div');
    divCheck.setAttribute("class","form-check");
    const inputDivTab=document.createElement('input');
    inputDivTab.setAttribute("class","form-check-input checkboxTab");
    inputDivTab.setAttribute("type","checkbox");

    // <td><img class="imgTd" src="img/delete.svg" alt=""></td>
    // <td><img class="imgTd" src="img/edit.svg" alt=""></td>
    const thTabDel=document.createElement('td');
    const thTabDelImg=document.createElement('img');
    thTabDelImg.setAttribute('class','imgTd');
    thTabDelImg.setAttribute('src','img/delete.svg');
    thTabDel.appendChild(thTabDelImg);

    const thTabEdt=document.createElement('td');
    const thTabEdtImg=document.createElement('img');
    thTabEdtImg.setAttribute('class','imgTd');
    thTabEdtImg.setAttribute('src','img/edit.svg');
    thTabEdt.appendChild(thTabEdtImg);

    divCheck.appendChild(inputDivTab);
    thTab.appendChild(divCheck);
    // trTab.appendChild(thTabId);
    
    trTab.appendChild(thTab);
    trTab.appendChild(thTabLoja);
    trTab.appendChild(thTabDtzinho);
    trTab.appendChild(thTabData);
    trTab.appendChild(thTabProntuário);
    trTab.appendChild(thTabNome);
    trTab.appendChild(thTabManga);
    trTab.appendChild(thTabDel);
    trTab.appendChild(thTabEdt);

    tabelaBody.appendChild(trTab);

}
// buscar os dados na api
const fetchGetDt=()=>{
    url= serv +'controllers/controllerDtzinho'
    fetch(url, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify()
    })
    .then(res=>res.json())
    .then(res=>{
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


// Carregar a tabela com as informações
let iniTabela=()=>{

     let table = new DataTable('#tabelaDtzinho', {
        keys: true,
        destroy: true,
        data:data,
        language: {
            "lengthMenu":"Mostrando _MENU_ registros por página",
            "sZeroRecords": "Nenhum registro encontrado",
            "info":"Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty":"Nenhum registro disponível",
            "infoFiltered":"(filtrando de _MAX_ registros no total)",
            "sSearch": "Pesquisar",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            
        }
        
    });
}
iniTabela();
$('#myTable').DataTable().on('draw', () => {
    funcTab()
});
