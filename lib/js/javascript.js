//Máscaras do formulário de cadastro
$('#cpf , #dataNascimento').on('focus', function () {
    var id=$(this).attr("id");
    if(id == "cpf"){VMasker(document.querySelector("#cpf")).maskPattern("999.999.999-99");}
    if(id == "dataNascimento"){VMasker(document.querySelector("#dataNascimento")).maskPattern("99/99/9999")};
});
const serv = "http://"+document.location.hostname+":8080/avancada/";
//Retorno do root
function getRoot()
{
    var root="http://"+document.location.hostname+":8080/avancada/";
    return root;
}
//Ajax do formulário de cadastro
$("#formCadastro").on("submit",function(event){
    event.preventDefault();
    var dados=$(this).serialize();
    $.ajax({
       url: getRoot()+'controllers/controllerCadastro',
        type: 'post',
        dataType: 'json',
        data: dados,
        success: function (response) {
            $('.retornoCad').empty();
            if(response.retorno == 'erro'){
                $.each(response.erros,function(key,value){
                    $('.retornoCad').append(value+'<br>');
                });
            }else{
                // alert("Cadastro realizado com sucesso!")
                window.location.href=getRoot()+'login';
                $('.retornoCad').append('Dados inseridos com sucesso!');
            }
        }
    });
});

//Ajax do formulário de login
$("#formLogin").on("submit",function(event){
    event.preventDefault();
    var dados=$(this).serialize();

    $.ajax({
       url: getRoot()+'controllers/controllerLogin',
        type: 'post',
        dataType: 'json',
        data: dados,
        success: function (response) {
            if(response.retorno == 'success'){
                window.location.href=response.page
            }else{
                if(response.tentativas == true){
                    $('.loginFormulario').hide();
                }
                $('.resultadoForm').empty();
                $.each(response.erros,function(key,value){
                    $('.resultadoForm').append(value+'<br>');
                });
            }
        }
    });
});

//Ajax do formulário de confirmação de senha
$("#formSenha").on("submit",function(event){
    event.preventDefault();
    var dados=$(this).serialize();

    $.ajax({
        url: getRoot()+'controllers/controllerSenha',
        type: 'post',
        dataType: 'json',
        data: dados,
        success: function (response) {
            if(response.retorno == 'success'){
                $('.retornoSen').html("Redefinição de senha enviada com sucesso!");
            }else{
                $('.retornoSen').empty();
                $.each(response.erros,function(key,value){
                    $('.retornoSen').append(value+'');
                });
            }
        }
    });
});

//CapsLock
$("#senha").keypress(function(e){
    kc=e.keyCode?e.keyCode:e.which;
    sk=e.shiftKey?e.shiftKey:((kc==16)?true:false);
    if(((kc>=65 && kc<=90) && !sk)||(kc>=97 && kc<=122)&&sk){
        $(".resultadoForm").html("Caps Lock Ligado");
    }else{
        $(".resultadoForm").empty();
    }
});