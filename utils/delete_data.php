<?php
// Database connection
require_once '../config/database.php';
require_once '../utils/mail.php';

try {
    // Prepare and execute the query to delete all records with status 1
    $stmt = $pdo->prepare("SELECT faculty_id FROM project_applications WHERE status = '1'");
    $stmt->execute();
    $faculty_id = $stmt->fetchAll(PDO::FETCH_COLUMN);
    // print_r($faculty_id);

    $email = [];
    foreach ($faculty_id as $facultyId) {
        $stmt = $pdo->prepare("SELECT email FROM faculty_info WHERE faculty_id = :faculty_id");
        $stmt->execute(['faculty_id' => $facultyId]);
        $email[] = $stmt->fetch(PDO::FETCH_COLUMN);
    }
    // print_r($email);
    // Prepare and execute the query to delete all records with status 1
    $stmt = $pdo->prepare("DELETE FROM project_applications WHERE status = '1'");
    $stmt->execute();


    if($email){
        foreach($email as $emails){
            $subject = 'Application Rejected';
            $body = 'Your application has been rejected';
            sendMail($emails, 'Faculty', $subject, $body);
        }
    }
    // Return success response
    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    // Return failure response
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
?>
