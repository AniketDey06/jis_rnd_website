<?php


// Include your database connection file
require_once '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json'); // Return JSON response

    // Get form data
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $confirmPassword = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';


    // Validate passwords
    if (empty($password) || empty($confirmPassword)) {
        echo json_encode(['success' => false, 'message' => 'Password fields cannot be empty.']);
        exit;
    } elseif ($password !== $confirmPassword) {
        echo json_encode(['success' => false, 'message' => 'Passwords do not match.']);
        exit;
    } else {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Get user email from session (set during the OTP process)
        // $email = isset($_SESSION['email']) ? $_SESSION['email'] : null;
        $email = $_SESSION['email'] ?? '';
        $facultyId = $_SESSION['faculty_id'] ?? '';
        $role = $_SESSION['role'] ?? '';

        // echo $email;
        // echo $facultyId;
        // echo $role;


        if ($email) {
            // Update the password in the database
            $stmt = $pdo->prepare("UPDATE $role SET password = ? WHERE email = ? and faculty_id = ?");
            // $stmt->execute([$hashedPassword, $email, $facultyId]);


            if ($stmt->execute([$hashedPassword, $email, $facultyId])) {
                // Password updated successfully
                echo json_encode(['success' => true, 'message' => 'Password updated successfully.']);
                exit;
            } else {
                echo json_encode(['success' => false, 'message' => 'Error updating password. Please try again.']);
                exit;
            }
     
        } else {
            echo json_encode(['success' => false, 'message' => 'Session expired. Please start the process again.']);
            exit;
        }
    }
}
?>