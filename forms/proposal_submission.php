<?php
require_once '../config/database.php'; // Include database connection
require_once '../includes/functions.php'; // Include functions


if ($_SERVER['REQUEST_METHOD'] === 'POST') {


     // Validate and sanitize personal input data....................................................................
     $facultyId = filter_input(INPUT_POST, 'faculty_id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
     $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
     $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
     $institute_s = filter_input(INPUT_POST, 'institute_s', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
     $dob = filter_input(INPUT_POST, 'dob', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
     $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
     $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
     $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
     $department = filter_input(INPUT_POST, 'department', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
     $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT);
     $alternatePhone = filter_input(INPUT_POST, 'alternate_phone', FILTER_SANITIZE_NUMBER_INT);

    //  echo $facultyId;
    //     echo $name;
    //     echo $email;
    //     echo $institute_s;
    //     echo $dob;
    //     echo $address;
    //     echo $gender;
    //     echo $password;
    //     echo $department;
    //     echo $phone;
    //     echo $alternatePhone;

     
     // Validate required fields
     if (!$facultyId || !$name || !$email || !$institute_s || !$dob || !$address || !$gender || !$password || !$department || !$phone) {
         echo 'All personal information fields must be filled.';
     }
     $facultyData = [
        'facultyId' => $facultyId,
        'name' => $name,
        'email' => $email,
        'institute_s' => $institute_s,
        'dob' => $dob,
        'address' => $address,
        'gender' => $gender,
        'password' => $password,
        'department' => $department,
        'phone' => $phone,
        'alternatePhone' => $alternatePhone,
    ];
 
    // Validate and sanitize professional info..........................................................................
    $areaOfInterest = filter_input(INPUT_POST, 'area_of_interest', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $languagesKnown = filter_input(INPUT_POST, 'language', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $skills = filter_input(INPUT_POST, 'skills', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (!$areaOfInterest || !$languagesKnown || !$skills) {
        echo 'Professional information fields (area of interest, languages, skills) must be filled.';
    }

    $professionalData = [
        'facultyId' => $facultyId,
        'areaOfInterest' => $areaOfInterest,
        'languagesKnown' => $languagesKnown,
        'skills' => $skills,
    ];

    // Process and validate education data.......................................................................
    $educationData = processEducationData($_POST, $errors);
    

    // Process and validate project data..........................................................................
    $projectData = processProjectData($_POST, $errors);


     // Check if the phone number and email already exists..........................................................................
    if (isPhoneNumberExists($pdo, $phone) || isEmailExists($pdo, $email) || isFacultyIdExists($pdo, $facultyId)) {
        $errors[] = 'Phone number, email or faculty ID already exists.';
    }else{


        // Check if a file is uploaded
        $photoPath = uploadPhoto($_FILES['profile_photo'], $errors);
 
     // If no errors, insert data into the database
     if (empty($errors)) {
         try {
             // Hash the password for security
             $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
 
             // Begin transaction
             $pdo->beginTransaction();
 
             // Insert into faculty_info..........................................................................................
             insertFacultyInfo($pdo, $facultyData, $photoPath);
 
             // Insert into professional_info......................................................................................
             insertProfessionalInfo($pdo, $professionalData);
 
              // Insert into education................................................................................................
             insertEducation($pdo, $facultyId, $educationData);
 
             // Insert into projects.................................................................................................
             insertProjects($pdo, $facultyId, $projectData);
 
             $pdo->commit();
             echo 'Data saved successfully.';
         } catch (PDOException $e) {
             $pdo->rollBack();
             error_log("Database error: " . $e->getMessage());
             echo 'A server error occurred. Please try again later1.';
         } catch (Exception $e) {
             $pdo->rollBack();
             error_log("Error: " . $e->getMessage());
             echo 'A server error occurred. Please try again later2.';
         }
     } else {
         // Display errors
         echo implode(' ', $errors);
     }

    }



    
} else {
    echo 'Invalid request method.';
}
?>

