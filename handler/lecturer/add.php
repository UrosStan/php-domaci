<?php
require "../../dbBroker.php";
require "../../model/lecturer.php";
require "../../model/validation.php";

if (isset($_POST["firstName"]) && isset($_POST["lastName"]) && isset($_POST["jmbg"])) {
    if (validateName($_POST["firstName"]) == 1 && validateName($_POST["lastName"]) == 1 && validateJMBG($_POST["jmbg"]) == 1) {
        $lecturer = new Lecturer(null, $_POST["firstName"], $_POST["lastName"], $_POST["jmbg"]);
        $status = Lecturer::add($lecturer, $conn);

        if ($status) {
            echo "Success";
        } else {
            echo "Failed";
        }
    } else {
        echo "Wrong";
    }
}
