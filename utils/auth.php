<?php
// Include database connection
header('Content-Type: application/json');
include '../config/database.php'; // Assume this script contains your PDO connection

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   // Get form data
   $facultyId = trim($_POST['faculty_id']);
   $email = trim($_POST['email']);
   $password = trim($_POST['password']);
   $role = trim($_POST['role']);
//    echo $role;

   // Validate the input fields
   if (empty($role) || empty($facultyId) || empty($email) || empty($password)) {
       echo json_encode(['success' => false, 'message' => 'All fields are required!']);
       exit;
   } 
   try {
       // Prepare and execute SQL query to get user by faculty_id and email
       $stmt = $pdo->prepare("SELECT faculty_id, email, password FROM $role WHERE faculty_id = :facultyId AND email = :email LIMIT 1");
       $stmt->bindParam(':facultyId', $facultyId, PDO::PARAM_STR);
       $stmt->bindParam(':email', $email, PDO::PARAM_STR);
       $stmt->execute();

       // Fetch the user data
       $user = $stmt->fetch(PDO::FETCH_ASSOC);

       if ($user) {
           // Verify password with the hashed password in the database
           if (password_verify($password, $user['password'])) {
               // Password is correct, start session
               $_SESSION['login_status'] = true;
               
               $_SESSION['faculty_id'] = $user['faculty_id'];
               $_SESSION['email'] = $user['email'];

               // Generate a unique session token
               $sessionToken = bin2hex(random_bytes(32));

               // Get the current date-time for the login time (you can adjust format if needed)
               $currentTime = date('Y-m-d H:i:s'); // Format: YYYY-MM-DD HH:MM:SS

               // Update the login time (data_time) and session token in the database
               $updateStmt = $pdo->prepare("
                   UPDATE $role 
                   SET login_time = NOW(), session_token = :sessionToken, data_time = :currentTime 
                   WHERE faculty_id = :userId
               ");
               $updateStmt->bindParam(':sessionToken', $sessionToken, PDO::PARAM_STR);
               $updateStmt->bindParam(':currentTime', $currentTime, PDO::PARAM_STR); // Store the current time in 'data_time'
               $updateStmt->bindParam(':userId', $user['faculty_id'], PDO::PARAM_STR);
               $updateStmt->execute();

               // Store the session token in the session variable
               $_SESSION['session_token'] = $sessionToken;

               $redirectUrl = '';
               switch ($role) {
                   case 'faculty_info':
                       $redirectUrl = 'faculty_dashboard.php';
                    //    $_SESSION['redirectUrl'] = $redirectUrl;
                       break;
                   case 'admins':
                       $redirectUrl = '../admin/admin_dashboard.php';
                    //    $_SESSION['redirectUrl'] = $redirectUrl;
                       break;
                   case 'principal':
                       $redirectUrl = 'principal_dashboard.php';
                    //    $_SESSION['redirectUrl'] = $redirectUrl;
                       break;
                   default:
                       echo json_encode(['success' => false, 'message' => 'Invalid role!']);
                       exit;
               }

               // Send success response with redirection URL
               echo json_encode(['success' => true, 'message' => 'Login successful! Redirecting...', 'redirect_url' => $redirectUrl]);
               exit;
           } else {
               echo json_encode(['success' => false, 'message' => 'Invalid password!']);
               exit;
           }
       } else {
           echo json_encode(['success' => false, 'message' => 'No user found with this Faculty ID and Email!']);
           exit;
       }
   }catch (Exception $e) {
       echo $e->getMessage();
       echo json_encode(['success' => false, 'message' => 'An error occurred. Please try again.']);
       exit;
   }
}else {
   echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
   exit;
}
?>
