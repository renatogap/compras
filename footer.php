<?php 
    $acao = $_GET['aba'];
?>

<div class="text-center fixed-bottom bg-primary">
    <div class="row">
        <a href="index.php?aba=index" 
            class="col-4 text-white menu-bottom p-3 <?= $acao == 'index' || !isset($acao) ? 'bg-dark' : '' ?>"
        >
            <i class="bi bi-cart3 "></i>
        </a>
        <a href="novo-produto.php?aba=novo" 
            class="col-4 text-white menu-bottom p-3 <?= $acao == 'novo' ? 'bg-dark' : '' ?>"
        >
            <i class="bi bi-bag-plus-fill"></i>
        </a>
        <a href="checklist.php?aba=check" 
            class="col-4 text-white menu-bottom p-3 <?= $acao == 'check' ? 'bg-dark' : '' ?>"
        >
            <i class="bi bi-check2-square"></i>
        </a>
    </div>
</div>