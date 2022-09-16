<?php
require "../../dbBroker.php";
require "../../model/lecturer.php";
require "../../model/validation.php";


if (isset($_POST["id"]) && isset($_POST["firstName"]) && isset($_POST["lastName"]) && isset($_POST["jmbg"])) {
    if (validateName($_POST["firstName"]) == 1 && validateName($_POST["lastName"]) == 1 && validateJMBG($_POST["jmbg"]) == 1) {
        $lecturer = new Lecturer(null, $_POST["firstName"], $_POST["lastName"], $_POST["jmbg"]);
        $status = $lecturer->update($_POST["id"], $conn);

        if ($status) {
            echo "Success";
        } else {
            echo $status;
            echo "Failed";
        }
    } else {
        echo "Wrong";
    }
}
?>