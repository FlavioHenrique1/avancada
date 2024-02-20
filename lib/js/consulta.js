const tabelaDtzinho = document.querySelector("#tabelaDtzinho");

//formatar a data para o padrão
function FormataDataBr(data) {
    var dataF = new Date(data),
        dia = dataF.getDate().toString().padStart(2, '0'),
        mes = (dataF.getMonth() + 1).toString().padStart(2, '0'), //+1 pois no getMonth Janeiro começa com zero.
        ano = dataF.getFullYear();
    return dia + "/" + mes + "/" + ano;
}

// Carregar a tabela com as informações
let iniTabela = (ev) => {
    data = [];
    console.log(ev);
    ev.map((evt) => {
        data.push([
            evt.n_loja,
            evt.n_dtzinho,
            FormataDataBr(evt.data),
            evt.n_pront,
            evt.v_nome,
            evt.n_manga,
            evt.endereco,
            '<img class="imgTdel" src="img/delete.svg">'
        ]);
    })
    let table = new DataTable('#tabelaDtzinho', {
        responsive: true,
        dom: 'Bfrtip',
        buttons: [
            'colvis',
            'excel'
        ],
        keys: true,
        destroy: true,
        data: data,
        language: {
            "lengthMenu": "Mostrando _MENU_ registros por página",
            "sZeroRecords": "Nenhum registro encontrado",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "Nenhum registro disponível",
            "infoFiltered": "(filtrando de _MAX_ registros no total)",
            "sSearch": "Pesquisar",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "buttons": {
                "collection": "Coleção  <span class=\"ui-button-icon-primary ui-icon ui-icon-triangle-1-s\"><\/span>",
                "colvis": "Visibilidade da Coluna",
                "colvisRestore": "Restaurar Visibilidade",
                "copy": "Copiar",
                "copyKeys": "Pressione ctrl ou u2318 + C para copiar os dados da tabela para a área de transferência do sistema. Para cancelar, clique nesta mensagem ou pressione Esc..",
                "copyTitle": "Copiar para a Área de Transferência",
                "csv": "CSV",
                "excel": "Excel",
                "pageLength": {
                    "-1": "Mostrar todos os registros",
                    "_": "Mostrar %d registros"
                },
                "pdf": "PDF",
                "print": "Imprimir",
                "createState": "Criar estado",
                "removeAllStates": "Remover todos os estados",
                "removeState": "Remover",
                "renameState": "Renomear",
                "savedStates": "Estados salvos",
                "stateRestore": "Estado %d",
                "updateState": "Atualizar"
            },
        }

    });
}


// buscar os dados na api
const fetchGetDt = () => {
    url = serv + 'controllers/controllerDtzinho'
    fetch(url, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify()
    })
    .then(res => res.json())
    .then(res => {
        iniTabela(res.data);
        deleteDadosTab();
    })
}

fetchGetDt()

//Atualizar a tabela sempre que mudar de pagina ou tiver alteração
$('#tabelaDtzinho').DataTable().on('draw', () => {
    deleteDadosTab();
});

//Apagar o Dtzinho
const apagarDtzinho=(dtzinho)=>{
    const dados={
        dtzinho:dtzinho
    }
    url= serv +'controllers/controllerDtzinho'
    fetch(url, {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(dados)
    })
    .then(res => res.json())
    .then(res=>{
        fetchGetDt();
    })
}

//pegar os dados da tabela para apagar
const deleteDadosTab = () => {
    let imgTdelList = document.querySelectorAll('.imgTdel');
    
    imgTdelList.forEach(imgTdel => {
        imgTdel.addEventListener("click", (evt) => {
            dtzinho = evt.target.parentNode.parentNode.children[1].innerHTML;
            if (confirm("Deseja realmente executar esta ação?")) {
                // Código para executar a ação
                apagarDtzinho(dtzinho);
                alert("Dados apagado com sucesso!");
            } else {
                alert("Ação cancelada pelo usuário.");
            }
        });
        
    });
}

// buscar os dados na api
const editarDtzinhoTab = (id,campo,valor) => {
    const dados={
        id:id,
        campo:campo,
        valor:valor
    }
    url = serv + 'controllers/controllerDtzinho'
    fetch(url, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(dados)
    })
    .then(res => res.json())
    .then(res => {
        // iniTabela(res.data);
    })
}

const tabelaBody = document.querySelector("#tabelaBody")
//Editar a tabela com duplo click
// tabelaBody.addEventListener("dblclick", (event) => {
//     const cell = event.target
//     const cell1 = event.target
//     const originalValue = cell.innerHTML;
//     const row = cell.parentNode;
//     let columnIndex = cell.cellIndex;
//     let id = cell.parentNode.children[1].innerHTML;

//     if (columnIndex !=0 && columnIndex !=1 && columnIndex !=4 && columnIndex < 6) {
//         let input = document.createElement("input");
//         input.setAttribute("class", "alterAtivTab");
//         input.value = originalValue;
//         // Verificar se é a coluna 0 e colocar um select no lugar do input
//         if(columnIndex ==0){
//             input=document.createElement("select");
//             input.setAttribute("id","LojasForm");
//             getLojas(input);
//         }

//         cell.innerHTML = "";
//         cell.appendChild(input);
//         input.focus();
//         input.addEventListener("blur", (evt) => {
//             let editedValue = input.value;

//             cell.innerHTML = editedValue;
//             editarDtzinhoTab(id,columnIndex, cell.innerHTML)
//             //atualizar a logica para o bd
//             // AtAtivTab(id, columnIndex, cell.innerHTML)
//         });
//     }
// });
