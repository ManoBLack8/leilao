<?php include_once('header.php') ?>
<style>
    .input_cadastro{
        padding-top: 10px;
    }
    .input_cadastro input{
        border-radius: 5px;
        width: 300px;
        height: 25px;

    }
    .radio_cadastro{
        padding-top: 10px;
        width: 200px;
        height: 40px;

    }
    .btn-success{
        margin-top: 50px;
        width: 130px;
        height: 50px;
    }
    .hidden {
        display: none !important;
    }
</style>
<div class="container" style="display: flex;">
    <div>
        <form action="../cadastrar_back.php?bot=1" style="padding-top: 20px;" method="POST">
            <div class="dados_pessoais">
                <div class="input_cadastro">
                    <label for="">Nome Completo</label><br>
                    <input type="text" name="nome">
                </div>
                <div class="row" style="margin-right:0px; margin-left:0px;">
                    <div class="input_cadastro">
                        <label for="">Email</label><br>
                        <input type="text" name="email">
                    </div>
                    <div class="input_cadastro" style="margin-left: 15px;">
                        <label for="">Confirmação de Email</label><br>
                        <input type="text" name="email2">
                    </div>
                </div>
                <div class="input_cadastro">
                    <label for="">Telefone Celular</label><br>
                    <input type="text" name="telefone">
                </div>
                <div class="input_cadastro">
                    <label for="">CPF</label><br>
                    <input type="text" name="cpf">
                </div >
                <div class="input_cadastro">
                    <label for="">Data de nascimento</label><br>
                    <input type="date" name="data_nascimento">
                </div>
                <div class="radio_cadastro hidden">
                    <label for="sexo_f">Feminino</label>
                    <input type="radio" id="sexo_f" name="sexo" value="f">
                    <label for="sexo_m">Masculino</label>
                    <input type="radio" id="sexo_m" name="sexo" value="M">
                </div>
            </div>
            <div class="dados_endereco hidden">
                <div>
                    <label for="">CEP</label><br>
                    <input type="text" name="cep">
                </div>
                <div class="row" style="margin-right:0px; margin-left:0px;">
                    <div class="input_cadastro">
                        <label for="">Estado</label><br>
                        <input type="text" name="estado">
                    </div>
                    <div class="input_cadastro" style="margin-left: 15px;">
                        <label for="">Cidade</label><br>
                        <input type="text" name="cidade">
                    </div>
                </div>
                <div class="row" style="margin-right:0px; margin-left:0px;">
                    <div class="input_cadastro">
                        <label for="">Bairro</label><br>
                        <input type="text" name="bairro">
                    </div>
                    <div class="input_cadastro" style="margin-left: 15px;">
                        <label for="">Endereço</label><br>
                        <input type="text" name="endereco">
                    </div>
                </div>
                <div class="row" style="margin-right:0px; margin-left:0px;">
                    <div class="input_cadastro">
                        <label for="">Numero</label><br>
                        <input type="text" name="numero">
                    </div>
                    <div class="input_cadastro" style="margin-left: 15px;">
                        <label for="">Complemento</label><br>
                        <input type="text" name="complemento">
                    </div>
                </div>
            </div>
            <div class="dados_login">
                <div class="input_cadastro">
                    <label for="">Escolha seu Login</label><br>
                    <input type="text" name="login">
                </div>
                <div class="row" style="margin-right:0px; margin-left:0px;">
                    <div class="input_cadastro">
                        <label for="">Senha</label><br>
                        <input type="text" name="senha">
                    </div>
                    <div class="input_cadastro" style="margin-left: 15px;">
                        <label for="">Confirmação de Senha</label><br>
                        <input type="text" name="cosenha">
                    </div>
                </div><br>
                    <input id="pol" type="checkbox"><label for="pol"> Concordo com as</label><a href="paginas.php?pag=politicas-de-privacidade" target="_blank" rel="noopener noreferrer"> Política Privacidade</a>
            </div>
            <button type="submit" class="btn btn-success">Cadastrar-se</button>
        </form>
    </div>
</div>
<?php include_once('footer.php')?>