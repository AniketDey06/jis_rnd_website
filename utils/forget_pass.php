<?php
require './mail.php'; // Include the sendMail function
// Include database connection
include '../config/database.php';

// Set content type to JSON
header('Content-Type: application/json');

// Check if the request is POST

if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
    // Get form data
    $role = $_POST['role'] ?? '';
    $facultyId = trim($_POST['faculty_id']) ;
    $email = trim($_POST['email']);

    // echo $role;
    // echo $facultyId;
    // echo $email;


    $errors = [];

    // Validate input
    if (empty($role))
        $errors[] = 'Role is required.';
    if (empty($facultyId))
        $errors[] = 'Faculty ID is required.';
    if (empty($email))
        $errors[] = 'Email is required.';
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        $errors[] = 'Invalid email format.';

    if (!empty($errors)) {
        echo json_encode(['success' => false, 'errors' => $errors]);
        exit;
    }

    try {
        // Check if the user exists in the database
        $stmt = $pdo->prepare("SELECT * FROM $role WHERE faculty_id = :facultyId AND email = :email");
        $stmt->execute([
            ':facultyId' => $facultyId,
            ':email' => $email
        ]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Generate OTP
            $otp = rand(100000, 999999);
            $otpExpiry = date('Y-m-d H:i:s', strtotime('+15 minutes')); // OTP valid for 15 minutes

            // echo $otpExpiry;

            $_SESSION['otp'] = $otp;
            $_SESSION['otp_expiry'] = $otpExpiry;
            $_SESSION['email'] = $email;
            $_SESSION['faculty_id'] = $facultyId;
            $_SESSION['role'] = $role;



            // Send OTP to the user's email
            $to = $email;
            $name = $user['name'];
            $subject = 'Test Email';
            $htmlBody =  "Hello, \n\nYour OTP for resetting your password is: $otp\n\nThis OTP is valid for 15 minutes.\n\nThank you.";
            // $plainBody = 'Hello, World! This is a test email.';

            // Send the email
                $result = sendMail($to, $name, $subject, $htmlBody);
                if ($result === true) {
                    // echo "OTP sent successfully to your email.";
                    echo json_encode(['success' => true, 'message' => 'OTP sent successfully to your email.']);
                    exit;
                } else {
                    echo json_encode(['success'=>false, $result]); // Output the error message
                    exit;
                }
           
        } else {
            echo json_encode(['success' => false, 'message' => 'No user found with the provided details.']);
            exit;
        }
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'An error occurred. Please try again.', 'error' => $e->getMessage()]);
        exit;
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
    exit;
}



