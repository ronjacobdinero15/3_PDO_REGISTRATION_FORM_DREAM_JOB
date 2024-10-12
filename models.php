<!-- Functions for interacting with the database -->

<?php 

require_once 'dbConfig.php';

function insertIntoStudentRecords($pdo,$first_name, $last_name, $gender, $years_of_experience, $specialization) {

	$sql = "INSERT INTO student_records (first_name,last_name,gender,years_of_experience,specialization) VALUES (?,?,?,?,?)";

	$stmt = $pdo->prepare($sql);

	$executeQuery = $stmt->execute([$first_name, $last_name, $gender, $years_of_experience, 
		$specialization]);

	if ($executeQuery) {
		return true;	
	}
}

function seeAllStudentRecords($pdo) {
	$sql = "SELECT * FROM student_records";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getStudentByID($pdo, $student_id) {
	$sql = "SELECT * FROM student_records WHERE student_id = ?";
	$stmt = $pdo->prepare($sql);
	if ($stmt->execute([$student_id])) {
		return $stmt->fetch();
	}
}

function updateAStudent($pdo, $student_id, $first_name, $last_name, 
	$gender, $years_of_experience, $specialization) {

	$sql = "UPDATE student_records 
				SET first_name = ?, 
					last_name = ?, 
					gender = ?, 
					years_of_experience = ?, 
					specialization = ?
			WHERE student_id = ?";
	$stmt = $pdo->prepare($sql);
	
	$executeQuery = $stmt->execute([$first_name, $last_name, $gender, 
		$years_of_experience, $specialization, $student_id]);

	if ($executeQuery) {
		return true;
	}
}



function deleteAStudent($pdo, $student_id) {

	$sql = "DELETE FROM student_records WHERE student_id = ?";
	$stmt = $pdo->prepare($sql);

	$executeQuery = $stmt->execute([$student_id]);

	if ($executeQuery) {
		return true;
	}

}




?>