<?php 

require_once 'dbConfig.php'; 
require_once 'models.php';

if (isset($_POST['insertNewStudentBtn'])) {
	$firstName = trim($_POST['firstName']);
	$lastName = trim($_POST['lastName']);
	$gender = trim($_POST['gender']);
	$years_of_experience = trim($_POST['years_of_experience']);
	$specialization = trim($_POST['specialization']);

	if (!empty($firstName) && !empty($lastName) && !empty($gender) && !empty($years_of_experience)  && !empty($specialization)) {
			$query = insertIntoStudentRecords($pdo, $firstName, $lastName, 
			$gender, $years_of_experience, $specialization);

		if ($query) {
			header("Location: ../index.php");
		}

		else {
			echo "Insertion failed";
		}
	}

	else {
		echo "Make sure that no fields are empty";
	}
	
}


if (isset($_POST['editStudentBtn'])) {
	$student_id = $_GET['student_id'];
	$firstName = trim($_POST['firstName']);
	$lastName = trim($_POST['lastName']);
	$gender = trim($_POST['gender']);
	$years_of_experience = trim($_POST['years_of_experience']);
	$specialization = trim($_POST['specialization']);

	if (!empty($student_id) && !empty($firstName) && !empty($lastName) && !empty($gender) && !empty($years_of_experience) && !empty($specialization)) {

		$query = updateAStudent($pdo, $student_id, $firstName, $lastName, $gender, $years_of_experience, $specialization);

		if ($query) {
			header("Location: ../index.php");
		}
		else {
			echo "Update failed";
		}

	}

	else {
		echo "Make sure that no fields are empty";
	}

}





if (isset($_POST['deleteStudentBtn'])) {

	$query = deleteAStudent($pdo, $_GET['student_id']);

	if ($query) {
		header("Location: ../index.php");
	}
	else {
		echo "Deletion failed";
	}
}




?>




