<?php
require_once '../utils/faculty_auth.php';


if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    $post_id = $_GET['post_id'];
    // echo $post_id;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Faculty Ongoing Projects</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    
    <style>
        nav img{
            height: 60px;
        }

        .title-box{
            border-bottom: 2px solid rgb(0, 0, 0);
            font-size: 30px;
            font-weight: 600;
        }

        
    </style>
</head>

<body>


<?php
   include '../includes/faculty_header.php';
   ?>



    <section class="min-h-screen bg-[#E5E7EB] :bg-gray-900 p-3 sm:p-5 ">
        <div class="h-full mx-auto w-4/5 px-4 lg:px-12 ">
            <!-- Start coding here -->

            <div class="bg-white :bg-gray-800 relative shadow-md sm:rounded-lg ">

                <!-- Search, tools etc... -->
                <div
                    class=" flex flex-col md:flex-row items-center justify-center space-y-3 md:space-y-0 md:space-x-4 p-4">

                    <h1 class="title-box ">List of Completed Report</h1>

                </div>

                <!-- Search, tools etc... -->
               

                <!-- table -->
                <div class="overflow-x-auto">

                    <!-- main Table -->
                    

                    <table class="w-full text-sm text-left text-gray-500 :text-gray-400">
                        <!-- Table hade -->
                        <thead class=" text-xs text-gray-700 uppercase bg-gray-100 :bg-gray-700 :text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">Date of Submission</th>
                                <th scope="col" class="px-4 py-3">Previous Progress Report</th>
                                
                            </tr>
                        </thead>

                        <tbody id="result2">
                        </tbody>

                        

                    </table>

                </div>

                
            </div>
        </div>
    </section>





    <script>


        if (document.getElementById("default-table") && typeof simpleDatatables.DataTable !== 'undefined') {
            const dataTable = new simpleDatatables.DataTable("#default-table", {
                searchable: false,
                perPageSelect: false
            });
        }


    </script>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>

     var post_id = '<?php echo $post_id; ?>'


        showdata1(post_id);
        function showdata1(post_id) {
            //Get all Form Input Data

            $.ajax({
                type: "POST",
                url: "../utils/faculty_completed_progress_report_show.php",
                data: { post_id: post_id },
            }).done(function (data) {
                $('#result2').html(data);
                //data == response
            });

        }
    </script>

</body>

</html>