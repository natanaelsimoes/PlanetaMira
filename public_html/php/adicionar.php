<?php

require_once("Db.class.php");
$db = new Db();
if (isset($_GET['nnid'])) :
    $nnid = $_GET['nnid'];
    $a_nnid = $_GET['a_nnid'];
    $db->query('INSERT INTO amigo (nnid,a_nnid) VALUES (:nnid, :a_nnid)', array('nnid' => $nnid, 'a_nnid' => $a_nnid));    
endif;