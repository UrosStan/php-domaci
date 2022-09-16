<?php
require "../../dbBroker.php";
require "../../model/lecturer.php";

if(isset($_POST["id"])){
    $status = Lecturer::deleteById($_POST["id"],$conn);

    if($status){
        echo "Success";
    } else{
        echo $status;
        echo "Failed";
    }
}

?>