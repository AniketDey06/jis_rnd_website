<?php
require_once '../utils/admin_auth.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">

    <title>Post</title>

    <style>
        body {
            background: white !important;
        }

        nav img {
            height: 60px;
        }

        .title-box {
            border-bottom: 2px solid rgb(0, 0, 0);
            font-size: 30px;
            font-weight: 600;
        }
    </style>
</head>

<body>


    <?php
    include "../includes/admin_header.php";
    ?>



    <section class="h-screen bg-[#E5E7EB] :bg-gray-900 p-3 sm:p-5 ">
        <div class="mx-auto w-1/2 px-4 lg:px-12">
            <div class="bg-white :bg-gray-800 relative shadow-md sm:rounded-lg">
                <div
                    class="flex flex-col md:flex-row items-center justify-center space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <h1 class="title-box">Post new Research Paper/Project opening</h1>
                </div>

                <!-- Form for Posting -->
                <form id="postForm" class="mb-6 editor mx-auto flex flex-col text-gray-800 p-4 max-w-5xl"
                    enctype="multipart/form-data">
                    <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 rounded-lg outline-none"
                        name="title" spellcheck="false" placeholder="Title" type="text">
                    <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 rounded-lg outline-none"
                        name="domain" spellcheck="false" placeholder="Domain" type="text">
                    <input
                        class="block w-full text-sm text-gray-500 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 :text-gray-400 focus:outline-none :bg-gray-700 :border-gray-600 :placeholder-gray-400"
                        aria-describedby="file_input_help" name="file" id="file_input" type="file">
                    <p class="mt-1 mb-4 text-sm text-gray-500 :text-gray-300" id="file_input_help">
                        *Upload project requirement document (SVG, PNG, JPG, or GIF MAX. 800x400px).
                    </p>
                    <textarea
                        class="description mb-4 bg-gray-100 sec p-3 h-60 border rounded-lg border-gray-300 outline-none"
                        name="description" spellcheck="false"
                        placeholder="Describe everything about this post here"></textarea>

                    <!-- Buttons -->
                    <div class="buttons flex">
                        <div
                            class="btn rounded border border-gray-300 p-1 px-4 font-semibold cursor-pointer text-gray-500 ml-auto">
                            Cancel</div>
                        <div
                            class="btn rounded bg-green-700 hover:bg-green-800 p-1 px-4 font-semibold cursor-pointer text-gray-200 ml-2">
                            <button type="submit">Post</button>
                        </div>

                    </div>
                </form>

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

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#postForm').on('submit', function (e) {
                e.preventDefault(); // Prevent default form submission

                // Collect form data
                var formData = new FormData(this);

                // Send AJAX POST request
                $.ajax({
                    type: 'POST',
                    url: 'post_submit.php', // The PHP file handling the login
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        var res = JSON.parse(response);
                        if (res.success) {
                            alert(res.message);
                            location.reload(); // Reload page to reflect changes
                        } else {
                            alert("Error: " + res.message);
                        }
                    },
                    error: function () {
                        $('#responseMessage').text('An error occurred. Please try again.').css('color', 'red');
                    },
                });
            });
        });
    </script>

</body>

</html>