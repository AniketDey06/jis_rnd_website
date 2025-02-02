<?php
// Database connection
require_once '../config/database.php';
require_once '../utils/mail.php';

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // print_r($faculty_id);
        $faculty_id = $_POST['faculty_id'];

        $stmt = $pdo->prepare("SELECT email FROM faculty_info WHERE faculty_id = :faculty_id");
        $stmt->execute(['faculty_id' => $faculty_id]);
        $email = $stmt->fetch(PDO::FETCH_COLUMN);

        // print_r($email);
        // Prepare and execute the query to delete all records with status 1
        $stmt = $pdo->prepare("DELETE FROM project_applications WHERE faculty_id = :faculty_id and status = '1'");
        $stmt->execute([
            ':faculty_id' => $faculty_id
        ]);


        if ($email) {

            $subject = 'Application Rejected';
            $body = 'Your application has been rejected';
            sendMail($email, 'Faculty', $subject, $body);
        }

        // Return success response
        echo json_encode(['success' => true]);
    }
} catch (PDOException $e) {
    // Return failure response
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
?>