<?php

require 'first.php';
require 'second.php';

$new_one = array(
    "name"=>"name1",
    "surname"=>"surname",
    "birthday"=>date('d-m-y h:i:s'),
    "sex"=>1,
    "city"=>"city",
);

$update_values = array(
    "name"=>"update_name",
    "surname"=>"update_surname",
    "birthday"=>date('d-m-y h:i:s'),
    "sex"=>0,
    "city"=>"update_city",
);

//$first = new First();
//$first->insert($new_one);
//$first->delete($id);
//$first->age();
//echo 'Sex is '.$first->read_sex(1);
//$result = $first->update($update_values, $id);

$second = new Second('test');
function hasParents($second) {
    var_dump((bool)class_parents($second));
}
//$second->delete($second->people_ids);

$title = 'PHP is awesome!';
require 'index.view.php';