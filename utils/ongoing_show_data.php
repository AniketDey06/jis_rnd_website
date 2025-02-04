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



    // check project_application table status = 1
    $stmt1 = $pdo->prepare("SELECT * FROM project_applications WHERE faculty_id = :faculty_id AND status = '2'");
    $stmt1->bindParam(':faculty_id', $_SESSION['faculty_id'], PDO::PARAM_STR);
    $stmt1->execute();
    $numrow1 = $stmt1->rowCount();
    
    if ($numrow1) {
        $datalist = $stmt1->fetchAll(PDO::FETCH_ASSOC);

        foreach ($datalist as $data1) {

            // check project_application table status = 1
            $stmt1 = $pdo->prepare("SELECT * FROM project_allocation WHERE post_id=:post_id and com_status = '1'");
            // $post_id = $data1['post_id'];
            // echo $post_id;
            $stmt1->execute([
                ':post_id' => $data1['post_id']
            ]);
            $numrow12 = $stmt1->rowCount();

            if (!$numrow12) {

                $stmt = $pdo->prepare("SELECT * FROM posts WHERE post_id = :post_id $srch");
                $stmt->execute([
                    ':post_id' => $data1['post_id']
                ]);
                $numrow = $stmt->rowCount();
                $status = 'approved';

                // var_dump($posts);

                if ($numrow > 0) {
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);

                    $stmt5 = $pdo->prepare("SELECT * FROM project_applications WHERE post_id =:post_id");
                    $stmt5->execute([
                        ':post_id' => $data1['post_id']
                    ]);

                    $data = $stmt5->fetch(PDO::FETCH_ASSOC);
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
                                    <!-- <td class="px-4 py-3">JIS/NIT/6969</td> -->
                                    <td class="px-4 py-3">
                                        <a data-modal-target="static-modal" data-modal-toggle="static-modal" href="../forms/' . $row['file_path'] . '"
                                            class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 :bg-green-600 :hover:bg-green-700 :focus:ring-green-800"
                                            type="button">
                                            <!-- View Applications -->
                                            <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                        </a>
                                    </td>
                                    <td class="px-4 py-3">
                                        <a data-modal-target="static-modal" data-modal-toggle="static-modal" href="../forms/' . $data['poc'] . '"
                                            class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 :bg-green-600 :hover:bg-green-700 :focus:ring-green-800"
                                            type="button">
                                            <!-- View Applications -->
                                            <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                        </a>
                                    </td>
                                    <td class="px-4 py-3">' . $status . '</td>
                                    
                                    <td class="px-4 py-3 ">
    
                                       <a href="../template/faculty_progress_reports.php?post_id='.$row['post_id'] . '">
                                        <button 
                                            class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 :bg-green-600 :hover:bg-green-700 :focus:ring-green-800"
                                            type="button">
                                            
                                                Submit Progress Reports
                                            
                                            <!-- <i class="fa-solid fa-arrow-up-right-from-square"></i> -->
                                        </button>
                                    </a>
                                        
                                        
                                    </td>
                                </tr>
                                
                
                ';
                    
                    
                } else {
                    $output = '<tr><td class="px-4 py-3 ">
    
                                        no record found
                                        
                                        
                                    </td></tr>';
                   

                }
            } 
        }
        echo $output;
    } else {
        $output .= '<tr><td class="px-4 py-3 ">
    
            no record found
        
        
        </td></tr>';
        echo $output;

    }
    // } else {
    //     $output .= '<tr><td class="px-4 py-3 ">

    //     No Data Found


    // </td></tr>';
    //     echo $output;
    // }


} catch (PDOException $e) {
    // Log and handle query errors
    echo $e->getMessage();
    die("Failed to fetch data. Please try again later.");
}



?>