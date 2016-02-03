<?php
require_once("Db.class.php");
$db = new Db();
if (isset($_GET['nnid'])) :
    $nnid = $_GET['nnid'];
    $db->query('REPLACE INTO jogador (nnid) VALUES (:nnid)', array('nnid' => $nnid));
    $adicionar = $db->query('SELECT j.nnid FROM jogador j LEFT OUTER JOIN amigo a ON a.a_nnid = j.nnid AND a.nnid = :nnid WHERE j.nnid <> :nnid2 AND a.nnid IS NULL', array('nnid' => $nnid, 'nnid2' => $nnid));
    foreach ($adicionar as $add) :
        ?>
        <li class="list-group-item"><?= $add['nnid'] ?> <span class="badge" onclick="adicionar(this, '<?= $add['nnid'] ?>')"><i class="glyphicon glyphicon-plus"></i></span></li>
        <?php
    endforeach;
endif;