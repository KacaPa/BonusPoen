<?php

if(isset($_POST['submit']) && $_POST['submit']=='izmeni' 
&& isset($_POST['predmet'])  && isset($_POST['katedra'])
&& isset($_POST['sala'] )
&& isset($_POST['datum'])){
    
   
    
    $predmet=$_POST['predmet'];
    $katedra=$_POST['katedra'];
    $sala=$_POST['sala'];
    $datum=$_POST['datum'];

    $prijava=new Prijava(null,$predmet,$katedra,$sala,$datum);

    $rezultat=Prijava::update($conn,$prijava);
    if($rezultat){
        echo "Update uspesan";
    }else{
        echo "Update neuspesan";
    }

}else{
    echo "problem";
}


?>