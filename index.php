<?php

// Step 1: Define Abstract Classes and Interfaces
abstract class Student {
    protected $name;
    protected $studentID;
    protected $courses = [];

    public function __construct($name, $studentID) {
        $this->name = $name;
        $this->studentID = $studentID;
    }

    abstract public function enroll($course);
    abstract public function getDetails();
}

interface CourseActions {
    public function addCourse($course);
    public function removeCourse($course);
}

// Step 2: Implement Abstract Class and Interface
class Undergraduate extends Student implements CourseActions {
    public function enroll($course) {
        if ($this->meetsPrerequisites($course)) {
            $this->addCourse($course);
            echo "<i>{$this->name} has enrolled in $course.</i><br>";
        } else {
            echo "<i>{$this->name} does not meet the prerequisites for $course.</i><br>";
        }
        echo "<br>";
    }

    public function addCourse($course) {
        $this->courses[] = $course;
    }

    public function removeCourse($course) {
        // Implement course removal logic here
    }

    public function getDetails() {
        echo "<i>Student Name: {$this->name}</i><br>";
        echo "<i>Student ID: {$this->studentID}</i><br>";
        echo "<i>Enrolled Courses: " . implode(", ", $this->courses) . "</i><br>";
    }

    private function meetsPrerequisites($course) {
        // Implement logic to check if the student meets course prerequisites
        // Example: return true if prerequisites are met, otherwise return false
        return true; // Placeholder, you need to implement the actual prerequisites logic
    }
}

// Step 3: Enrollment Process
$student1 = new Undergraduate("John Doe", "12345");
$student2 = new Undergraduate("Jane Smith", "54321");

$student1->enroll("Mathematics");
$student1->enroll("Computer Science");
$student2->enroll("Physics");

// Step 4: Reporting and Analysis
echo "<i>Student 1 Details:</i><br>";
$student1->getDetails();

echo "<br><i>Student 2 Details:</i><br>";
$student2->getDetails();
?>
