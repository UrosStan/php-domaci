<?php
require "../../dbBroker.php";
require "../../model/student.php";
require "../../model/validation.php";

if (isset($_POST["firstName"]) && isset($_POST["lastName"]) && isset($_POST["indeks"])) {
    if (validateName($_POST["firstName"]) == 1 && validateName($_POST["lastName"]) == 1 && validateIndex($_POST["indeks"]) == 1) {
        $student = new Student(null, $_POST["firstName"], $_POST["lastName"], $_POST["indeks"]);
        $status = Student::add($student, $conn);

        if ($status) {
            echo "Success";
        } else {
            echo "Failed";
        }
    } else {
        echo "Wrong";
    }
}
