
<?php
// Database connection
require_once '../config/database.php';
require_once '../utils/mail.php'; // Assuming you already have a mail function



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $faculty_id = $_POST['faculty_id'];
    $post_id = $_POST['post_id'];

    echo $faculty_id;
    $status = '1';

    try {
       

        // Begin transaction
        $pdo->beginTransaction();

        // Fetch faculty email from faculty_info table
        $stmt = $pdo->prepare("SELECT email FROM faculty_info WHERE faculty_id = :faculty_id");
        $stmt->execute([':faculty_id' => $faculty_id]);
        $faculty = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$faculty) {
            echo json_encode(['success' => false, 'message' => 'Faculty not found.']);
            exit;
        }

        $faculty_email = $faculty['email']; // Store email for sending

        // Update project_allocation table
        $stmt = $pdo->prepare("UPDATE project_allocation SET com_status = :status WHERE faculty_id = :faculty_id AND status = '2'");
        if ($stmt->execute([':faculty_id' => $faculty_id, ':status' => $status])) {
            
            // Commit the transaction
            $pdo->commit();

            // Send email
            $name= "faculty";
            $subject = "Project Completion Status Updated";
            $message = "Dear Faculty,\n\nYour project status has been marked as completed.\n\nRegards,\nAdmin Team";

            if (sendMail($faculty_email, $name, $subject, $message)) {
                echo json_encode(['success' => true, 'message' => 'Status updated and email sent successfully.']);
            } else {
                echo json_encode(['success' => true, 'message' => 'Status updated, but email sending failed.']);
            }

        } else {
            $pdo->rollBack();
            echo json_encode(['success' => false, 'message' => 'Update failed.']);
        }
    

    } catch (Exception $e) {
        $pdo->rollBack();
        echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
    }
}
?>
