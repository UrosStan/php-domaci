<?php
require "../../dbBroker.php";
require "../../model/examRegistration.php";

if(isset($_POST["id"])){
    $status = ExamRegistration::deleteById($_POST["id"],$conn);

    if($status){
        echo "Success";
    } else{
        echo $status;
        echo "Failed";
    }
}

?>