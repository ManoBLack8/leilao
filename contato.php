<?php include_once("header.php");?>
<style>
    form input{
        width: 100%;
        height: 50px;
        font-size: 16px;
        color: #6f6f6f;
        padding-left: 20px;
        margin-bottom: 30px;
        border: 1px solid #ebebeb;
        border-radius: 4px;
    }

    form textarea{
        width: 100%;
        height: 150px;
        font-size: 16px;
        color: #6f6f6f;
        padding-left: 20px;
        margin-bottom: 24px;
        border: 1px solid #ebebeb;
        border-radius: 4px;
        padding-top: 12px;
        resize: none;

    }
    .contact__form__title h2{
        margin-top: 50px;
        margin-bottom: 50px;
        text-align: center;
        font-size: 24px;
        font-weight: 700;
    }
    .site-btn{
        font-size: 14px;
        color: #ffffff;
        font-weight: 800;
        text-transform: uppercase;
        display: inline-block;
        padding: 13px 30px 12px;
        background: #82C305;
        border: none;
    }
</style>
    <div class="contact-form spad" style="display: block;">
        <div class="container" style="display: flex; flex-direction: column;">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                        <h2>Sua mensagem </h2>
                    </div>
                </div>
            </div>
            <form method="post">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <input type="text" name="nomecontato" id="nomecontato" placeholder="Seu nome">
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <input type="text" name="emailcontato" id="emailcontato" placeholder="Seu email" >
                    </div>
                    <div class="col-lg-12 text-center">
                        <textarea name="msgcontato" id="msgcontato" placeholder="Sua mensagem"></textarea>
                        <button type="button" name="btncontato" id="btncontato" class="site-btn">Enviar</button>
                        <div  class="text-center mt-3"  id="mensagem-i"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Contact Form End -->

 <?php require_once("footer.php");?>
<script type="text/javascript">
    $('#btncontato').click(function(event) {
    event.preventDefault();
    $('#mensagem-i').removeClass('text-success')
    $('#mensagem-i').removeClass('text-danger')
    $('#mensagem-i').addClass('text-info')
     $('#mensagem-i').text('Enviando...')
    $.ajax({
        url:"enviar.php",
        method:"post",
        data: $('form').serialize(),
        dataType: "text",
        success: function(msg) {
            if (msg.trim() === 'Enviado com Sucesso!') {
                $('#mensagem-i').removeClass('text-info')
                $('#mensagem-i').addClass('text-success')
                $('#mensagem-i').text(msg);
                $('#nomecontato').val('');
                $('#emailcontato').val('');
                $('#msgcontato').val('');
            }

            else{
                $('#mensagem-i').text(msg)

            }
        }
    })

})
</script>