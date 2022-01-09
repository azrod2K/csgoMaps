<?php
// var_dump($map);
?>
<div class="container">
    <div class="row">

        <img src="assets/img/<?= $map->getImg() ?>.jpg" style="width: 100%">
        <h1><?= $map->getNm_Maps() ?></h1>
        
    </div>
        <h3><?= $map->getTxt_Descritpion() ?></h3>
</div>