<?php

// Function to check if the phone number exists...............................................
function isPhoneNumberExists($pdo, $phone)
{
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM faculty_info WHERE phone = :phone");
    $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
    $stmt->execute();

    // Fetch the count
    $count = $stmt->fetchColumn();

    // Return true if the phone number exists, otherwise false
    return $count > 0;
}


// Function to check if the email exists...............................................
function isEmailExists($pdo, $email)
{
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM faculty_info WHERE email = :email");
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    // Fetch the count
    $count = $stmt->fetchColumn();

    // Return true if the email exists, otherwise false
    return $count > 0;
}


// Function to check if the faculty_id exists...............................................
function isFacultyIdExists($pdo, $facultyId)
{
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM faculty_info WHERE faculty_id = :facultyId");
    $stmt->bindParam(':facultyId', $facultyId, PDO::PARAM_STR);
    $stmt->execute();

    // Fetch the count of matching rows
    $count = $stmt->fetchColumn();

    // Return true if the faculty_id exists, otherwise false
    return $count > 0;
}



// Function to upload photo................................................
function uploadPhoto($file, &$errors, $uploadDir = 'uploads/', $allowedFileTypes = ['image/jpeg', 'image/png'], $maxFileSize = 2 * 1024 * 1024)
{
    // Check if a file is uploaded and has no errors
    if (isset($file) && $file['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $file['tmp_name'];
        $fileName = $file['name'];
        $fileSize = $file['size'];
        $fileType = mime_content_type($fileTmpPath);

        // Validate file type
        if (!in_array($fileType, $allowedFileTypes)) {
            $errors[] = 'Invalid file type. Only JPEG and PNG files are allowed.';
            return null;
        }

        // Validate file size
        if ($fileSize > $maxFileSize) {
            $errors[] = 'File size exceeds the maximum limit of 2 MB.';
            return null;
        }

        // Generate a new unique file name to prevent overwriting
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        $newFileName = uniqid('photo_', true) . '.' . $fileExtension;

        // Ensure the upload directory exists
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Move the file to the final directory
        $destination = $uploadDir . $newFileName;
        if (move_uploaded_file($fileTmpPath, $destination)) {
            return $destination; // Return the file path for saving in the database
        } else {
            $errors[] = 'Failed to upload the photo. Please try again.';
            return null;
        }
    } else {
        $errors[] = 'No photo uploaded or upload error.';
        return null;
    }
}



// Function to process the education data................................................
function processEducationData($postData, &$errors)
{
    $educationData = [];

    // Check if 'institute' is an array and has values
    if (isset($postData['institute']) && is_array($postData['institute']) && !empty($postData['institute'])) {
        foreach ($postData['institute'] as $key => $eduInstitute) {
            // Validate and sanitize each field
            $eduInstitute = htmlspecialchars($eduInstitute, ENT_QUOTES, 'UTF-8');
            $universityBoard = htmlspecialchars($postData['uniboard'][$key] ?? '', ENT_QUOTES, 'UTF-8');
            $course = htmlspecialchars($postData['course'][$key] ?? '', ENT_QUOTES, 'UTF-8');
            $marks = htmlspecialchars($postData['marks'][$key] ?? '', ENT_QUOTES, 'UTF-8');
            $passingYear = htmlspecialchars($postData['passingYear'][$key] ?? '', ENT_QUOTES, 'UTF-8');

            // Check if all fields are filled for the current record
            if ($eduInstitute && $universityBoard && $course && $marks && $passingYear) {
                $educationData[] = [
                    'institute' => $eduInstitute,
                    'universityBoard' => $universityBoard,
                    'course' => $course,
                    'marks' => $marks,
                    'passingYear' => $passingYear,
                ];
            } else {
                $errors[] = 'All education fields must be filled for each record.';
                break;
            }
        }
    } else {
        $errors[] = 'At least one education record is required.';
    }

    return $educationData;
}




// Function to process project data................................................
function processProjectData($postData, &$errors)
{
    $projectData = [];

    // Check if the 'project' field exists and is not empty
    if (!empty($postData['project']) && is_array($postData['project'])) {
        foreach ($postData['project'] as $key => $projectName) {
            // Validate and sanitize each project record
            $projectName = htmlspecialchars($postData['project'][$key] ?? '', ENT_QUOTES, 'UTF-8');
            $projectDescription = htmlspecialchars($postData['project_description'][$key] ?? '', ENT_QUOTES, 'UTF-8');

            // Check if both project name and description are provided
            if ($projectName && $projectDescription) {
                $projectData[] = [
                    'projectName' => $projectName,
                    'projectDescription' => $projectDescription,
                ];
            } else {
                $errors[] = 'All project fields must be filled.';
                break; // Stop processing if validation fails
            }
        }
    } else {
        $errors[] = 'At least one project record is required.';
    }

    return $projectData;
}


// Function to insert faculty info into the database................................................
function insertFacultyInfo($pdo, $facultyData, $photoPath)
{
    $stmt = $pdo->prepare("
        INSERT INTO faculty_info 
        (faculty_id, name, email, institute, dob, address, gender, password, department, phone, alternate_phone, profile_photo) 
        VALUES 
        (:facultyId, :name, :email, :institute, :dob, :address, :gender, :password, :department, :phone, :alternatePhone, :profilePhoto)
    ");

    // Add the photo path to the faculty data array
    $facultyData['profilePhoto'] = $photoPath;
    $hashedPassword = password_hash($facultyData['password'], PASSWORD_BCRYPT);

    // Execute the statement with the data array
    if (
        !$stmt->execute([
            ':facultyId' => $facultyData['facultyId'],
            ':name' => $facultyData['name'],
            ':email' => $facultyData['email'],
            ':institute' => $facultyData['institute_s'],
            ':dob' => $facultyData['dob'],
            ':address' => $facultyData['address'],
            ':gender' => $facultyData['gender'],
            ':password' => $hashedPassword,
            ':department' => $facultyData['department'],
            ':phone' => $facultyData['phone'],
            ':alternatePhone' => $facultyData['alternatePhone'],
            ':profilePhoto' => $facultyData['profilePhoto'],
        ])
    ) {
        throw new Exception('Error inserting into faculty_info table: ' . print_r($stmt->errorInfo(), true));
    }
}



// Function to insert Professional info into the database................................................
function insertProfessionalInfo($pdo, $professionalData)
{
    // Prepare the SQL statement
    $stmt = $pdo->prepare("
        INSERT INTO professional_info 
        (faculty_id, area_of_interest, languages_known, skills) 
        VALUES 
        (:facultyId, :areaOfInterest, :languagesKnown, :skills)
    ");

    // Execute the statement with the data array
    if (
        !$stmt->execute([
            ':facultyId' => $professionalData['facultyId'],
            ':areaOfInterest' => $professionalData['areaOfInterest'],
            ':languagesKnown' => $professionalData['languagesKnown'],
            ':skills' => $professionalData['skills'],
        ])
    ) {
        // Handle errors by throwing an exception
        throw new Exception('Error inserting into professional_info table: ' . print_r($stmt->errorInfo(), true));
    }
}


// Function to insert education data into the database................................................

function insertEducation($pdo, $facultyId, $educationData)
{
    $stmt = $pdo->prepare("
        INSERT INTO education 
        (faculty_id, institute_name, university_board, course, marks, passing_year) 
        VALUES 
        (:facultyId, :instituteName, :universityBoard, :course, :marks, :passingYear)
    ");

    foreach ($educationData as $edu) {
        $eduParams = [
            ':facultyId' => $facultyId,
            ':instituteName' => $edu['institute'],
            ':universityBoard' => $edu['universityBoard'],
            ':course' => $edu['course'],
            ':marks' => $edu['marks'],
            ':passingYear' => $edu['passingYear'],
        ];

        if (!$stmt->execute($eduParams)) {
            throw new Exception('Error inserting education data: ' . print_r($stmt->errorInfo(), true));
        }
    }
}


// Function to insert project data into the database................................................
function insertProjects($pdo, $facultyId, $projectData)
{
    $stmt = $pdo->prepare("
        INSERT INTO projects 
        (faculty_id, project_name, project_description) 
        VALUES 
        (:facultyId, :projectName, :projectDescription)
    ");

    foreach ($projectData as $proj) {
        $projParams = [
            ':facultyId' => $facultyId,
            ':projectName' => $proj['projectName'],
            ':projectDescription' => $proj['projectDescription'],
        ];

        if (!$stmt->execute($projParams)) {
            throw new Exception('Error inserting project data: ' . print_r($stmt->errorInfo(), true));
        }
    }
}




// Function to handle user authentication............................................................................................
function loginUser($facultyId, $email, $password, $role, $pdo)
{
    // Validate input fields
    if (empty($facultyId) || empty($email) || empty($password) || empty($role)) {
        return ['status' => false, 'message' => 'All fields are required!'];
    }

    // Determine the table based on role
    switch ($role) {
        case 'admin':
            $table = 'admins';
            break;
        case 'principal':
            $table = 'principals';
            break;
        case 'faculty':
            $table = 'faculty_info';
            break;
        default:
            return ['status' => false, 'message' => 'Invalid role specified!'];
    }

    // Prepare and execute SQL query to get user by faculty_id and email from the appropriate table
    $stmt = $pdo->prepare("SELECT faculty_id, email, password FROM $table WHERE faculty_id = :facultyId AND email = :email LIMIT 1");
    $stmt->bindParam(':facultyId', $facultyId, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    // Fetch the user data
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Verify password with the hashed password in the database
        if (password_verify($password, $user['password'])) {
            // Password is correct, start session
            $_SESSION['user_id'] = $user['faculty_id'];
            $_SESSION['email'] = $user['email'];

            // Generate a session token
            $sessionToken = bin2hex(random_bytes(32));

            // Get current date-time for login
            $currentTime = date('Y-m-d H:i:s'); // Format: YYYY-MM-DD HH:MM:SS

            // Update the login time (data_time) and session token in the appropriate table
            $updateStmt = $pdo->prepare("
                UPDATE $table 
                SET login_time = NOW(), session_token = :sessionToken, data_time = :currentTime 
                WHERE faculty_id = :userId
            ");
            $updateStmt->bindParam(':sessionToken', $sessionToken, PDO::PARAM_STR);
            $updateStmt->bindParam(':currentTime', $currentTime, PDO::PARAM_STR); // Store the current time in 'data_time'
            $updateStmt->bindParam(':userId', $user['faculty_id'], PDO::PARAM_STR);
            $updateStmt->execute();

            // Store the session token in the session variable
            $_SESSION['session_token'] = $sessionToken;

            // echo $user['faculty_id'];
            // Redirect based on role
            $actual_role = getRoleByIdFormat($user['faculty_id']);
            switch ($actual_role) {
                case 'admin':
                    return ['status' => true, 'redirect' => 'admin_dashboard.php'];
                case 'principal':
                    return ['status' => true, 'redirect' => 'principal_dashboard.php'];
                case 'faculty':
                    return ['status' => true, 'redirect' => 'faculty_dashboard.php'];
                default:
                    return ['status' => false, 'message' => 'Invalid role specified!!'];
            }
        } else {
            return ['status' => false, 'message' => 'Invalid password!'];
        }
    } else {
        return ['status' => false, 'message' => 'No user found with this Faculty ID and Email!'];
    }
}



// Function to validate the ID format based on the role................................................


function getRoleByIdFormat($id) {
    // Define patterns for each role
    $patterns = [
        'faculty' => '/^FAC\/\d+$/',    // Format: FAC/ followed by digits
        'admin' => '/^ADM\/\d+$/',      // Format: ADM/ followed by digits
        'principal' => '/^PRN\/\d+$/'   // Format: PRN/ followed by digits
    ];

    // Loop through the patterns and check for a match
    foreach ($patterns as $role => $pattern) {
        if (preg_match($pattern, $id) === 1) {
            return $role; // Return the role name if the ID matches
        }
    }

    // Return false if no pattern matches
    return false;
}









?>