<?php
require_once("Db.class.php");
$db = new Db();
if (isset($_GET['nnid'])) :
    $nnid = $_GET['nnid'];
    $db->query('REPLACE INTO jogador (nnid) VALUES (:nnid)', array('nnid' => $nnid));
    $adicionado = $db->query('SELECT j.nnid FROM jogador j JOIN amigo a ON a.a_nnid = j.nnid AND a.nnid = :nnid', array('nnid' => $nnid));
    foreach ($adicionado as $add) :
        ?>
        <li class="list-group-item"><?= $add['nnid'] ?></li>
        <?php
    endforeach;
endif;