<?php
    require_once '../config/database.php';
    header('Content-Type: application/json');

    // Example OTP stored in session (this should be set during OTP generation)
    $storedOtp = $_SESSION['otp'] ?? null;
    $otpExpiration = $_SESSION['otp_expiry'] ?? null;
    $email = $_SESSION['email'] ?? null;

    // echo $storedOtp;
    // echo $otpExpiration;
    // echo $email;


    // Get submitted OTP
    $submittedOtp = $_POST['otp'] ?? '';
    // echo $submittedOtp;

    // Check if OTP is valid
    if (!$storedOtp || !$otpExpiration || time() > $otpExpiration) {
        echo json_encode(['success' => false, 'message' => 'OTP has expired. Please request a new one.']);
        exit;
    }

    if ($submittedOtp == $storedOtp) {
        // Clear OTP after successful validation
        unset($_SESSION['otp']);
        unset($_SESSION['otp_expiration']);
        // unset($_SESSION['email']);
        
        

        echo json_encode(['success' => true, 'message' => 'OTP verified successfully.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid OTP. Please try again.']);
    }
?>
