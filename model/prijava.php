<?php 

    

    class Prijava {
        public $id;
        public $predmet;
        public $katedra;
        public $sala;
        public $datum;

        public function __construct($id = null, $predmet = null, $katedra = null, $sala = null, $datum = null)
        {
            $this->id = $id;
            $this->predmet = $predmet;
            $this->katedra = $katedra;
            $this->sala = $sala;
            $this->datum = $datum;
        }

        public static function getAll(mysqli $conn) {
            $query_string = "SELECT * FROM prijave";
            return $conn->query($query_string);
        }

        public static function deleteById($id, mysqli $conn)
        {
            $query_string = "DELETE FROM prijave WHERE id=$id";
            return $conn->query($query_string);
        }

        public static function add(Prijava $prijava, mysqli $conn)
        {
            $query_str = "INSERT INTO prijave(predmet, katedra, sala, datum) VALUES ('$prijava->predmet', '$prijava->katedra', '$prijava->sala', '$prijava->datum')";
            return $conn->query($query_str);
        }

        public static function getById(mysqli $conn, $id){
            $upitGetById=$conn->query("SELECT * FROM prijave WHERE id=$id");
            return $upitGetById->fetch_object();
        }

        public static function getId(mysqli $conn, Prijava $prijava){
            $upitGetId=$conn->query("SELECT * FROM prijave WHERE predmet='$prijava->predmet' AND sala='$prijava->sala' AND datum='$prijava->datum' AND katedra='$prijava->katedra'");
            return $upitGetId->fetch_object()->id;
        }

        public static function update(mysqli $conn,Prijava $prijava){
            $myId=$_POST['id_predmeta'];
            $id1=Prijava::getId($conn,$prijava);
            $upitUpdate=$conn->query("UPDATE prijave set  predmet='$prijava->predmet', katedra='$prijava->katedra',sala='$prijava->sala',datum='$prijava->datum' WHERE id=$myId");
            return $upitUpdate;
        }

           

        

}


?>