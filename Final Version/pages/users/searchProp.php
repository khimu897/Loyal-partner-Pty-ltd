<?php 
    if(isset($_POST['findproperty'])){
        $title = "Search Properties";
        $connP = new DatabaseTable('properties');
        $results=$connP->searchP($_POST['query']);
        $resuls=$connP->searchP($_POST['query']);
        $countRes=0;
        foreach ($results as $value) {$countRes++;}
        $content = loadTemplate('../templates/users/userhomeTemplate.php', ['data'=>$resuls,'countRes'=>$countRes]);
    }
?>