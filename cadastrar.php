<?php include_once('header.php') ?>
<style>
    .input_cadastro{
        padding-top: 10px;
    }
    .input_cadastro input{
        border-radius: 5px;
        width: 300px;

    }
</style>
<div>
    <div>
        <form action="">
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
                    <input type="text" name="telefone">
                </div >
                <div class="input_cadastro">
                    <label for="">Data de nascimento</label><br>
                    <input type="date" name="nascimento">
                </div>
                <div class="input_cadastro">
                    <label for="sexo_f">Feminino</label>
                    <input type="radio" id="sexo_f" name="sexo" value="f">
                    <label for="sexo_m">Masculino</label>
                    <input type="radio" id="sexo_m" name="sexo" value="M">
                </div>
            </div>
            <div class="dados_endereco">
                <div>
                    <label for="">CEP</label><br>
                    <input type="text" name="cep">
                </div>
                <div class="row" style="margin-right:0px; margin-left:0px;">
                    <div class="input_cadastro">
                        <label for="">Estado</label><br>
                        <input type="text" name="uf">
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
                        <input type="text" name="bairro">
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
                </div>
            </div>
            <button type="submit" class="btn-submit"></button>
        </form>
    </div>
</div>
<?php include_once('footer.php')?>