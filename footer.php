
<div class="rodape" style="display: flex;flex-direction: column;">
        <div class="parceiros" style="flex-direction: row; width:100%;">
            <ul>
                <li><a href="#"><img src="img/pagseguro.png" alt="PagSeguro" title="PagSeguro" /></a></li>
                
            </ul>
        </div>
        <h1>Parceiros:</h1>
        <div class="fornecedores" style="flex-direction: row;">
            <ul>
                <?php 
                    $q_parceiros = $pdo->query("SELECT * FROM parceiros WHERE status = 1 ORDER BY ordem ASC");
                    $q_parceiros = $q_parceiros->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($q_parceiros as $parcas) { ?>
                        <li><a href="#"><img src="admin/uploads/parceiros/thumb/<?= $parcas['logo'] ?>" alt="<?= $parcas['nome'] ?>" /></a></li>
                        
                    <?php } ?>
            </ul>
        </div>                

        <div class="rodape" style="flex-direction: row; margin-top: 50px;">
            <div class="logo-rodape">
                <a href="index"><img src="img/logo.png" alt="" style="width: 100%;" /></a>
            </div>

            <div class="menu-rodape" style="margin-top: 50px;">
                <ul>
                    <?php $q_paginas = $pdo->query("SELECT * FROM paginas ");
                    $q_paginas = $q_paginas->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($q_paginas as $paginas) { ?>
                    <li>
                        <a href="paginas.php?pag=<?= $paginas['slug'] ?>"><?= $paginas["titulo"]?></a>
                        
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        </div>
        </div>
        <div class="boxgeral-rodape"></div>
        <div class="copyright">
            <p><b>Leilão Duarte</b> - Todos os direitos reservados</p>
        </div>
</div>
    
        <!-- jquery e script's -->
        <script src="js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript">
            $(window).load(function () {
                // start the slideshow
                $('.slideshow').blinds();
            })

            $(function(){
                $('#slider1').bxSlider({
                    displaySlideQty: 5,
                    moveSlideQty: 1
                });
            });
        </script>
        <script type="text/javascript">
            $('.button_submit').click(function(){              
                set_lance($(this).val());
            });
            
            function get_data_hora(){
                $.post(
                'data_hora_ajax.php',
                {  },
                function(data){
                    var exibe_time = document.getElementById("time");
                    var exibe_data = document.getElementById("data");
                    var exibe_lances = document.getElementById("lances_usuarios")

                    exibe_lances.innerHTML = data.lances + " lances";
                    exibe_time.innerHTML = data.time;
                    exibe_data.innerHTML = data.dia + " de " + data.mes + " de " + data.ano;
                }, 'json'
            );
            }

            function get_lances(){
                $.post(
                'lances_ajax.php',
                { action: "get" },
                function(data){
                    //alert('valor_'+data.lances[0]['id']);
                    for(i=0; i < data.lances.length; i++){
                        
                        if(data.lances[i]['finalizou']){
                            $('#box_lance_'+data.lances[i]['id']).html("<h3>Arrematado!</h3><p>"+data.lances[i]['usuario']+"</p>");
                            if(valor != data.lances[i]['valor_lance']) $('#valor_'+data.lances[i]['id']).html("R$ "+data.lances[i]['valor_lance']);
                            if(usuario != data.lances[i]['usuario']) $('#usuario_'+data.lances[i]['id']).html(data.lances[i]['usuario']);
                        } else {
                            if(data.lances[i]['comecou']) $('#targe_'+data.lances[i]['id']).css('display', 'none');
                            var valor = $('#valor_'+data.lances[i]['id']).html();
                            let cont = $('#cont_'+data.lances[i]['id']).html();
                            var usuario = $('#usuario_'+data.lances[i]['id']).html();
                            (cont <= 10) ? $('#cont_'+data.lances[i]['id']).removeClass("contador-verde").addClass("contador-vermelho") : $('#cont_'+data.lances[i]['id']).removeClass("contador-vermelho").addClass("contador-verde");
                            if(valor != data.lances[i]['valor_lance']) $('#valor_'+data.lances[i]['id']).html("R$ "+data.lances[i]['valor_lance']);
                            if(usuario != data.lances[i]['usuario']) $('#usuario_'+data.lances[i]['id']).html(data.lances[i]['usuario']);
                            if(usuario != data.lances[i]['duracao']) $('#cont_'+data.lances[i]['id']).html(data.lances[i]['duracao']);
                        }
                    }
                    
                }, 'json'
            );
            }
            
            function set_lance(id_leilao){
                let iduser = <?php echo (isset($_SESSION['id_usuario'])) ? $_SESSION['id_usuario'] : 0; ?>;
                if(iduser == 0){
                    alert("É necessário efetuaro login para dar lances");
                    return false;
                }
                
                $.post(
                    'lances_ajax.php',
                    { action: "set", id: id_leilao, id_usuario: iduser },
                    function(data){
                        
                    }, 'json'
                );
            }
            function get_contador(){
                $.post(
                'contador.php',
                { action: "get" },
                function(data){
                    get_lances()
                    
                }, 'json'
            );
            }
            
            //setInterval(function(){ get_data_hora() }, 1000);
            //setInterval(function(){ get_lances() }, 100);
            //setInterval(function(){ get_contador() }, 1000);
        </script>
        <!-- fim script's -->

        <?php unset($_SESSION['msg_error']); ?>
    </body>
</html>

<script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="assets/js/vendor/jquery-migrate-3.3.2.min.js"></script>
    <!-- Modernizer JS -->
    <script src="assets/js/vendor/modernizr-3.11.2.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>

    <!-- Slick Slider JS -->
    <script src="assets/js/plugins/slick.min.js"></script>
    <!-- Barrating JS -->
    <script src="assets/js/plugins/jquery.barrating.min.js"></script>
    <!-- Counterup JS -->
    <script src="assets/js/plugins/jquery.counterup.js"></script>
    <!-- Nice Select JS -->
    <script src="assets/js/plugins/jquery.nice-select.js"></script>
    <!-- Sticky Sidebar JS -->
    <script src="assets/js/plugins/jquery.sticky-sidebar.js"></script>
    <!-- Jquery-ui JS -->
    <script src="assets/js/plugins/jquery-ui.min.js"></script>
    <script src="assets/js/plugins/jquery.ui.touch-punch.min.js"></script>
    <!-- Theia Sticky Sidebar JS -->
    <script src="assets/js/plugins/theia-sticky-sidebar.min.js"></script>
    <!-- Waypoints JS -->
    <script src="assets/js/plugins/waypoints.min.js"></script>
    <!-- jQuery Zoom JS -->
    <script src="assets/js/plugins/jquery.zoom.min.js"></script>
    <!-- Timecircles JS -->
    <script src="assets/js/plugins/timecircles.js"></script>
    <script src="js/geral.js"></script>