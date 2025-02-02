<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>


    <title>Forget Password</title>
</head>

<body>
    <div class="min-h-screen bg-gray-100 flex items-center justify-around p-4 pl-20 pr-20">

        <div class="max-w-md w-full bg-white rounded-xl shadow-lg p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Forget Password</h2>

            <form class="space-y-4" id="loginForm">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Choose Role</label>
                    <ul
                        class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-300 rounded-lg sm:flex 1:bg-gray-700 1:border-gray-600 1:text-white">
                        <li class="w-full border-b border-gray-300 sm:border-b-0 sm:border-r 1:border-gray-600">
                            <div class="flex items-center ps-3">
                                <input id="horizontal-list-radio-license" type="radio" value="admins" name="list-radio"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 1:focus:ring-blue-600 1:ring-offset-gray-700 1:focus:ring-offset-gray-700 1:bg-gray-600 1:border-gray-500">
                                <label for="horizontal-list-radio-license"
                                    class="w-full py-3 ms-2 text-sm font-medium text-gray-900 1:text-gray-300">Admin</label>
                            </div>
                        </li>
                        <li class="w-full border-b border-gray-300 sm:border-b-0 sm:border-r 1:border-gray-600">
                            <div class="flex items-center ps-3">
                                <input id="horizontal-list-radio-id" type="radio" value="principal" name="list-radio"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 1:focus:ring-blue-600 1:ring-offset-gray-700 1:focus:ring-offset-gray-700 1:bg-gray-600 1:border-gray-500">
                                <label for="horizontal-list-radio-id"
                                    class="w-full py-3 ms-2 text-sm font-medium text-gray-900 1:text-gray-300">Principal</label>
                            </div>
                        </li>
                        <li class="w-full border-b border-gray-200  1:border-gray-600">
                            <div class="flex items-center ps-3">
                                <input id="horizontal-list-radio-military" type="radio" value="faculty_info" name="list-radio"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 1:focus:ring-blue-600 1:ring-offset-gray-700 1:focus:ring-offset-gray-700  1:bg-gray-600 1:border-gray-500">
                                <label for="horizontal-list-radio-military"
                                    class="w-full py-3 ms-2 text-sm font-medium text-gray-900 1:text-gray-300">Faculty</label>
                            </div>
                        </li>
                    </ul>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Faculty ID</label>
                    <input type="text" id="faculty_id"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all"
                        placeholder="JIS/1234/4568" />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" id="email"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all"
                        placeholder="your@jisgroup.org" />
                </div>






                <button
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2.5 rounded-lg transition-colors">

                    Send OTP

                </button>
                <div id="responseMessage" class="mt-4 text-center text-sm"></div>
            </form>

            <div class="mt-6 text-center text-sm text-gray-600">
                don't have an account?
                <a href="login.html" class="text-indigo-600 hover:text-indigo-500 font-medium">Sign up</a>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#loginForm').on('submit', function (e) {
                e.preventDefault(); // Prevent default form submission

                // Collect form data
                const formData = {
                    role: $('input[name="list-radio"]:checked').val(),
                    faculty_id: $('#faculty_id').val(),
                    email: $('#email').val(),
                    // password: $('#password').val(),

                };

                localStorage.setItem('email', email);

                // Send AJAX POST request
                $.ajax({
                    type: 'POST',
                    url: '../utils/forget_pass.php', // The PHP file handling the login
                    data: formData,
                    dataType: 'json',
                    success: function (response) {
                        // console.log(response);
                        if (response.success) {
                            $('#responseMessage').text(response.message).css('color', 'green');
                            // Redirect to dashboard after 1 second
                            setTimeout(() => {
                                window.location.href = 'otp.php?email=' + encodeURIComponent(formData.email);
                            }, 1000);
                        } else {
                            $('#responseMessage').text(response.message).css('color', 'red');
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