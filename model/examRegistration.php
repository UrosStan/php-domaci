<?php

class ExamRegistration{
    public $id;
    public $date;
    public $grade;
    public $studentId;
    public $subjectId;
    public $lecturerId;

    public function __construct($id=null, $date=null, $grade=null, $studentId=null, $subjectId=null, $lecturerId=null)
    {
        $this->id = $id;
        $this->date = $date;
        $this->grade = $grade;
        $this->studentId = $studentId;
        $this->subjectId = $subjectId;
        $this->lecturerId = $lecturerId;

    }

    public static function getAll(mysqli $conn){
        $query = "SELECT * FROM examregistration";
        return $conn->query($query);
    }

    public static function getById($id, mysqli $conn){
        $query = "SELECT * FROM examregistration WHERE id=$id";
        return $conn->query($query);
    }

    public static function getByStudentAndSubjectIDs($studentId, $subjectId, mysqli $conn){
        $query = "SELECT * FROM examregistration WHERE studentId=$studentId AND subjectId = $subjectId AND grade>5";
        return $conn->query($query);
    }

    public static function deleteById($id, mysqli $conn){
        $query = "DELETE FROM examregistration WHERE id=$id";
        return $conn->query($query);
    }

    public static function add(ExamRegistration $examRegistration, mysqli $conn){
        $query = "INSERT INTO examregistration(date, grade, subjectId, studentId, lecturerId) VALUES ('21-09-2022', $examRegistration->grade, $examRegistration->subjectId,  $examRegistration->studentId, $examRegistration->lecturerId)";
        return $conn->query($query);
    }
}

?>