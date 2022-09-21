<?php
require "../../dbBroker.php";
require "../../model/student.php";
require "../../model/validation.php";

if (isset($_POST["idBefore"]) && isset($_POST["firstName"]) && isset($_POST["lastName"])) {
    if (validateName($_POST["firstName"]) == 1 && validateName($_POST["lastName"]) == 1) {
        $index = (Student::getIndexById($_POST["idBefore"],$conn))->fetch_array();
        $student = new Student(null, $_POST["firstName"], $_POST["lastName"], $index["indeks"]);
        $status = $student->update($_POST["idBefore"], $conn);

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
