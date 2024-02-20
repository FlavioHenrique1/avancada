<?php \Classes\ClassLayout::setHeader('Login','Entre com seu usuário e senha');?>
    
    <div class="fundo"></div>

    <form name="formLogin" id="formLogin" action="<?php echo DIRCONT.'controllerLogin';?>" method="post">
        <div class="login">
            <div class="loginLogomarca float w100 center">
                <img src="<?php echo DIRIMG.'logo-americanassa-preto.png';?>" alt="Logomarca">
            </div>
            <div class="resultadoForm float w100 center"></div>
            <div class="loginFormulario float w100">
                <input class="float w100 h40 inputform numm" type="number" name="prontuario" id="prontuario" placeholder="Prontuário" required autofocus><br>
                <input class="float w100 h40 inputform" type="password" name="senha" id="senha" placeholder="Senha" required>
                <input class="float h40 center inputSubmit" type="submit" value="Entrar">
                <div class="loginTextos float center"><a href="<?php echo DIRPAGE.'redefinicaoSenha';?>">Esqueci minha senha</a></div>
                <div class="loginTextos float"><span class="loginspan"> Não tem conta ?</span> <a href="<?php echo DIRPAGE.'cadastro';?>"><span class="spanCad">cadastre-se</span></a></div>
            </div>
        </div>
    </form>

<?php \Classes\ClassLayout::setFooter();?>