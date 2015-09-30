<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <?php
    // put your code here   
    require './filter.class.php';
     
    
    
    $filtre=new Filter();
    $filtre->addFilteredColumn("kolon 1");
    $filtre->addValueToLastAddedFilteredColumn("değer 1 - 1");
    $filtre->addValueToLastAddedFilteredColumn("değer 1 - 2");
    $filtre->addFilteredColumn("kolon 2");
    $filtre->addValueToLastAddedFilteredColumn("değer 2 - 1");
    $filtre->addValueToLastAddedFilteredColumn("değer 2 - 2");
    $filtre->addValueToLastAddedFilteredColumn("değer 2 - 3");
    $filtre->addFilteredColumn("kolon 3");
    $filtre->addValueToLastAddedFilteredColumn("değer 3 - 1");
    
   $filtre->renderAll();
    
    
    
    
    
    ?>
    
</body>
</html>