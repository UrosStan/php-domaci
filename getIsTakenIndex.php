<?php

require "dbBroker.php";
require "model/student.php";

$q = $_REQUEST["q"];

$indexes = Student::getAllIndexes($conn);
if ($indexes->num_rows == 0) {
    echo "";
} else {
    while ($row = $indexes->fetch_array()) {
        if($row['indeks'] == $q){
            echo "Taken";
            die();
        }
    }
    echo "Available";
}
?>