<?php
/*
 * we can take parent class name by this - get_parent_class($this)
 *
 * but if the parent class will not exist we will have the error in extends
 */
class Second extends First
{
    public $people_ids = array();

    public function __construct($name){
        parent::__construct();
        echo "I'm " , get_parent_class($this) , "'s child\n";
        /*
         * we can use here any "where" parameter we need, like:
         * where id > 1 or where city = some_city, or birthday < today_date.....
         */
        $sql="SELECT id FROM people WHERE name = '$name'";
        $result = $this->mysqli->query($sql);
        foreach($result as $row) {
//            echo $row['id']; // for tests
            $this->people_ids[] = $row['id'];
        }
//        print_r($this->people_ids); // for tests
    }
}