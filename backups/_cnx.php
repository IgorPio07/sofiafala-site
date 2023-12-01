<?php
class DB {
   function DB() {
       $this->link = pg_connect("host=localhost
                                 port=5432
						         dbname=sisdcm
							     user=dcmsite
							     password=@ndr0!D19") 
               or die ("Nao consegui conectar ao PostGres --> " . pg_errormessage($conn)); 		 
   }
   
   function query($query) {
       $result = pg_query($this->link, $query);
       return $result;
   }
   
   function num_rows($result) {
       return pg_num_rows($result);
   }   
   
   function last_error(){
       return pg_last_error($this->link);
   } 
   
   function result_error($result){
       return pg_result_error($result);
   } 
      
   function execsql($query) {
       $result = pg_exec($this->link, $query);
       return $result;
   }
   
   function fetch_array($result,$i) {
       return pg_fetch_array($result,$i,PGSQL_BOTH);
   }
   
   function close() {
       pg_close($this->link);
   }  
}

?>
