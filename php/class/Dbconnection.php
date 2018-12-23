<?php 

class Dbconnection {
    
    public function dbCon(){
        return new PDO( "mysql:host=gcpmdb.db.12505603.hostedresource.com; dbname=gcpmdb", "gcpmdb", "DietPepsi88!");
    }
}
