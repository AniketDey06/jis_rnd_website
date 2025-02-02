<?php

require_once '../config/database.php';

try {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $post_id = $_POST['post_id'];


        // check project_application table status = 1
        $stmt1 = $pdo->prepare("SELECT * FROM project_allocation WHERE faculty_id = :faculty_id and post_id = :post_id");
        // $stmt1->bindParam([]);
        $stmt1->execute([
            ':faculty_id' => $_SESSION['faculty_id'],
            ':post_id' => $post_id
        ]);
        $numrow = $stmt1->rowCount();
        $output = "";

        if ($numrow > 0) {
            while ($row = $stmt1->fetch(PDO::FETCH_ASSOC)) {
                //echo '<pre>';
                //print_r($row); 
                $output .= '
                            <tr class="border-b :border-gray-700">
                                <th scope="row"
                                    class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap :text-white">
                                    ' . $row['created_at'] . '
                                </th>
                                <td class="px-4 py-3">
                                    <a target="_blank" href="../forms/' . $row['progress_report'] . '"
                                        class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 :bg-green-600 :hover:bg-green-700 :focus:ring-green-800"
                                        type="button">
                                        View
                                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                    </a>
                                </td>
                                
                                
                                
                            </tr>
            
            ';
            }
            echo $output;
        } else {
            $output .= '<tr>no record found</tr>';
            echo $output;

        }
    }
} catch (PDOException $e) {
    // Log and handle query errors
    echo $e->getMessage();
    die("Failed to fetch data. Please try again later.");
}







?>