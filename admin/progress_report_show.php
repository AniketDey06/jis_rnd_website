<?php

require_once '../config/database.php';

$srch = '';
$scr_data = '';
$output = "";

if (isset($_POST['inputvalue'])) {
    $scr_data = $_POST['inputvalue'];
    $srch .= "AND title like '%$scr_data%'";
}


try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $post_id = $_POST['post_id'];
        $faculty_id = $_POST['faculty_id'];
        // echo $post_id;
        // echo $faculty_id;



        $stmt1 = $pdo->prepare("SELECT * FROM project_allocation WHERE post_id=:post_id AND com_status = '1'");
        $stmt1->execute([
            ':post_id' => $post_id
        ]);
        $row1 = $stmt1->rowCount();

        if ($row1 == 0) {
            $stmt1 = $pdo->prepare("SELECT * FROM faculty_info WHERE faculty_id = :faculty_id ");
            // $stmt1->bindParam(':faculty_id', $_SESSION['faculty_id'], PDO::PARAM_STR);
            $stmt1->execute([
                ':faculty_id' => $faculty_id,
            ]);
            $data = $stmt1->fetch(PDO::FETCH_ASSOC);
            $numrow1 = $stmt1->rowCount();

            if ($numrow1) {
                // check project_application table status = 1
                $stmt = $pdo->prepare("SELECT * FROM posts WHERE post_id=:post_id $srch");
                $stmt->execute([
                    ':post_id' => $post_id
                ]);
                $numrow = $stmt->rowCount();

                if ($numrow > 0) {
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        //echo '<pre>';
                        //print_r($row); 
                        $output .= '
                            <tr class="border-b :border-gray-700">
                                <th scope="row"
                                    class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap :text-white">
                                    ' . $row['post_id'] . '
                                </th>
                                <td class="px-4 py-3">' . $row['title'] . '</td>
                                <td class="px-4 py-3">' . $row['domain'] . '</td>
                                <td class="px-4 py-3">' . $data['faculty_id'] . '</td>
                                <td class="px-4 py-3">' . $data['name'] . '</td>
                                <td class="px-4 py-3">' . $data['department'] . '</td>
                                <td class="px-4 py-3 ">

                                <button type="button" onclick="complete(\''.$faculty_id.'\')"
                                    class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2  :bg-red-600 :hover:bg-red-700 :focus:ring-red-900"
                                    >
                                        Make As Completed
                                </button>
                                    
                                </td>
                            </tr>
            
                            ';
                    }
                    echo $output;
                } else {
                    $output .= '<tr><td class="px-4 py-3 ">

                                    no record found
                                    
                                    
                                </td></tr>';
                    echo $output;

                }
            } else {
                $output .= '<tr>no record found</tr>';
                echo $output;

            }
        } else {
            $output .= '<tr><td class="px-4 py-3 ">

            no record found
            
            
        </td></tr>';
            echo $output;
        }
    }

} catch (PDOException $e) {
    // Log and handle query errors
    echo $e->getMessage();
    die("Failed to fetch data. Please try again later.");
}







?>