<?php
require_once '../config/database.php';
require_once './mail.php'; // Include the sendMail function


    header('Content-Type: application/json');

    // Check if the request is POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $email = $_POST['email'] ?? '';

        // echo $email;
        
        if (!$email) {
            echo json_encode(['success' => false, 'message' => 'Email not found']);
            exit;
        }
    
        // Generate a new OTP
        $otp = rand(100000, 999999); // Generate a 6-digit OTP
    
        // Save OTP in session
        $_SESSION['otp'] = $otp;
        $_SESSION['otp_expiration'] = time() + 900; // 15-minute validity
    
        // Send the OTP to the user's email
        // Replace with actual email sending logic
        $to = $email;
        $name = 'User';
        $subject = 'Test Email';
        $htmlBody =  "Hello, \n\nYour OTP for resetting your password is: $otp\n\nThis OTP is valid for 15 minutes.\n\nThank you.";
        // $plainBody = 'Hello, World! This is a test email.';
    
        // Send the email
            $result = sendMail($to, $name, $subject, $htmlBody);
            if ($result === true) {
                // echo "OTP sent successfully to your email.";
                echo json_encode(['success' => true, 'message' => 'OTP resent successfully to your email.']);
                exit;
            } else {
                echo json_encode(['success'=>false, $result]); // Output the error message
                exit;
            }
    }


    
?>