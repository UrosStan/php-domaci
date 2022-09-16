<?php
require "../../dbBroker.php";
require "../../model/student.php";

if(isset($_POST["id"])){
    $status = Student::deleteById($_POST["id"],$conn);

    if($status){
        echo "Success";
    } else{
        echo $status;
        echo "Failed";
    }
}

?>