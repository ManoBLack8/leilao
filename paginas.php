<?php include('header.php');
$slug = $_GET['pag'];
$result_paginas = $pdo->query("SELECT * FROM paginas WHERE slug = '$slug'");
$dados2 = $result_paginas->fetchAll(PDO::FETCH_ASSOC);
foreach ($dados2 as $pag) {
    $titulo = $pag['titulo'];
    $conteudo = $pag['conteudo'];
?>
<style>
    b{
        font-weight: 600;
    }
</style>
    <div style="clear:both; padding-top:50px !important;"></div>
    <div id ="container-content"><?php echo $conteudo ?></div>
<?php }
include('footer.php')
?>