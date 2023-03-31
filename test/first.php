<?php

class First{
    private $servername='localhost';
    private $username='root';
    private $password='';
    private $dbname='test';
    public $mysqli='';

    public $name_field = "constructor";
    public $surname_field = "constructor";
    public $birthday_field = "1988-03-23";
    public $sex_field = 1;
    public $city_field = "city_constructor";

    public function __construct(){
        $this->mysqli = new mysqli($this->servername,$this->username,$this->password,$this->dbname);
        $sql = "INSERT INTO people (name, surname, birthday, sex, city)
            VALUES('$this->name_field', '$this->surname_field', '$this->birthday_field', $this->sex_field, '$this->city_field')";
        $this->mysqli->query($sql);
    }

    public function insert($new_one){
        $table_columns = implode(',', array_keys($new_one));
        $table_value = implode("','", $new_one);
        $sql = "INSERT INTO people($table_columns) VALUES('$table_value')";
        $result = $this->mysqli->query($sql);
        var_dump($result);
    }

    public function delete($ids){
        $ids_for_delete = implode("','", $ids);
        $sql="DELETE FROM people";
        $sql .=" WHERE id IN ('".$ids_for_delete."')";
        $result = $this->mysqli->query($sql);
        var_dump($result);
    }

    public function age($birthday){
//        $dateOfBirth = "17-10-1985";
        $today = date("Y-m-d");
        $diff = date_diff(date_create($birthday), date_create($today));
        echo 'Age is '.$diff->format('%y');
    }

    public function read_sex($value){
        if ($value) {
            return "Male";
        } else {
            return "Female";
        }
    }

    public function update($update_values, $id){
        $args = array();
        foreach ($update_values as $key => $value) {
            $args[] = "$key = '$value'";
        }

        $sql="UPDATE people SET " . implode(',', $args);
        $sql .=" WHERE id = $id";
        $this->mysqli->query($sql);
        echo "Id $id Updated";
        $sql_updated="SELECT * FROM people WHERE id = '$id'";
        return $this->mysqli->query($sql);
    }
}