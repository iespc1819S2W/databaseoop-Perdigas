<?php
$base = __DIR__;
 require_once("$base/model/autor.class.php");

 
/*********************BUSCAR ID************************/
$autor=new Autor();
$res=$autor->get(1);
if ($res->correcta) {
   foreach ($res->dades as $row){
       echo "<fieldset style='width: 550px;'><legend><b>BUSCAR ID</b></legend>". $row['id_aut']."-".$row['nom_aut']." ".$row["fk_nacionalitat"]."<br></fieldset>";
   }
} else {
    echo $res->missatge;
}


 /********************ACTUALITZA AUTOR*************************/

 $autor=new Autor();
 $res=$autor->update("JOAN", 1);
 if ($res->correcta) {
    echo "<fieldset style='width: 550px;'><legend><b>UPDATE</b></legend>Editado correctamente</fieldset>";
 } else {
     echo $res->missatge;
 }
echo "<br/>";
 /*********************LISTA AUTORS*********************** */

 $autor=new Autor();
 $res=$autor->getAll();
 if ($res->correcta) {
    echo "<table border=1><tr><td><b>ID Autor</b></td><td><b>Nom Autor</b></td><td><b>Nacionalitat</b></td> </tr>";
    foreach ($res->dades as $row){
        echo "<tr><td>".$row['id_aut']."</td><td>".$row['nom_aut']." </td><td> ".$row["fk_nacionalitat"]."</td></tr>";
    }
    echo "</table>";
 } else {
     echo $res->missatge;
 }

 $autor->insert(array("nom_aut"=>"Tomeu Campaner","fk_nacionalitat"=>"MURERA"));   //produira un error
 if (!$res->correcta) {
    echo "Error insertant";  // Error per l'usuari
    error_log($res->missatge,3,"$base/log/errors.log");  // Error per noltros
 }   
