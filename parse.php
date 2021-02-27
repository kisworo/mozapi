<?php
// This require_once will vary depending on your php applications specific directory structure
require_once __DIR__ . DIRECTORY_SEPARATOR . 'Moz.php';

//initialize the library
$moz        = new Moz("mozscape-5fa78c3d26","d1ba3623684af6171076e3285d247849");
$backlink   = $_POST['backlink'];
$backlink   = explode("\n",$backlink);
$domain     = $_POST['domain'];
$domain     = explode("\n", $domain);
$result     = [];
$no = 0;
foreach($domain as $row){
    $result[$no]= ["backlink"=>array(),"domain"=>array()];

    $data       = $moz->linkstatus($backlink,$row,"root_domain","root_domain");
    $data       = $data->exists;

    foreach($data as $key => $subrow){
        if($subrow){
            array_push($result[$no]['backlink'],$backlink[$key]);

        }
    };
    if(in_array(1,$data)){
        array_push($result[$no]['domain'], $row);
    };
    $no ++;
}
echo json_encode($result);