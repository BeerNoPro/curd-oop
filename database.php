<?php 
    class database{
        private $servername='localhost';
        private $username='phamviethung_phamviethung';
        private $password='Toidayhoc123';
        private $dbname='phamviethung_crud_oop';
        private $mysqli='';
        // // private $result=array();
        // $servername = "localhost";
        // $username = "phamviethung_phamviethung";
        // $password = "Toidayhoc123";
        // $dbname = "phamviethung_todolist";

        public function __construct(){
            $this->mysqli = new mysqli($this->servername,$this->username,$this->password,$this->dbname);
        }

        public function insert($table,$para=array()){
            $table_columns = implode(',', array_keys($para));
            $table_value = implode("','", $para);

            $sql="INSERT INTO $table($table_columns) VALUES('$table_value')";

            $this->mysqli->query($sql);
        }

        public function update($table,$para=array(),$id){
            $args = array();

            foreach ($para as $key => $value) {
                $args[] = "$key = '$value'"; 
            }

            $sql="UPDATE  $table SET " . implode(',', $args) . " WHERE $id";

            $this->mysqli->query($sql);
        }

        public function delete($table,$id){
            $sql="DELETE FROM $table WHERE $id";

            $this->mysqli->query($sql);
        }

        public $sql;

        public function select($table,$rows="*",$where = null){
            if ($where != null) {
                $sql="SELECT $rows FROM $table WHERE $where";
            }else{
                $sql="SELECT $rows FROM $table";
            }

            $this->sql = $this->mysqli->query($sql);
            // $result = $this->mysqli->query($sql);
        }

        public function __destruct(){
            $this->mysqli->close();
        }
    }
?>