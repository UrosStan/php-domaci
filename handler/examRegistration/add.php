<?php
require "../../dbBroker.php";
require "../../model/examRegistration.php";
require "../../model/validation.php";

if (isset($_POST["subjectId"]) && isset($_POST["studentId"]) && isset($_POST["lecturerId"]) && isset($_POST["grade"])) {
    if (validateGrade($_POST["grade"]) != 1) {
        echo "Wrong grade";
    } else {
        $exists = ExamRegistration::getByStudentAndSubjectIDs($_POST["studentId"], $_POST["subjectId"], $conn);

        if ($exists->num_rows > 0) {
            echo "Exists";
        } else {

            $er = new ExamRegistration(null, null, $_POST["grade"], $_POST["studentId"], $_POST["subjectId"], $_POST["lecturerId"]);
            $status = ExamRegistration::add($er, $conn);

            if ($status) {
                echo "Success";
            } else {
                echo "Failed";
            }
        }
    }
}
