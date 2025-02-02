<!-- component -->

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
  
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/site.webmanifest">

    <link rel="stylesheet" href="index.css">


    <title>R&D Website</title>
</head>
<body>



    <section class="bg-white :bg-gray-900">
        <!-- navbar -->
        <nav x-data="{ isOpen: false }" class="container mx-auto p-6 lg:flex pl-4 pr-4 :items-center lg:justify-between">
            <div class="flex items-center justify-between">
            <div>
                <a class="text-2xl font-bold text-gray-800 hover:text-gray-700 :text-white :hover:text-gray-300 lg:text-3xl" href="#">
                    <img src="assets/images/jis_login.png"  width="80px" alt="">
                </a>
            </div>

            <!-- Mobile menu button -->
            <div class="flex lg:hidden">
                <button x-cloak @click="isOpen = !isOpen" type="button" class="text-gray-500 hover:text-gray-600 focus:text-gray-600 focus:outline-none :text-gray-200 :hover:text-gray-400 :focus:text-gray-400" aria-label="toggle menu">
                <svg x-show="!isOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 8h16M4 16h16" />
                </svg>

                <svg x-show="isOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
                </button>
            </div>
            </div>

            <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
            <div x-cloak :class="[isOpen ? 'translate-x-0 opacity-100 ' : 'opacity-0 -translate-x-full']" class="absolute inset-x-0 z-20 w-full bg-white px-6 py-4 shadow-md transition-all duration-300 ease-in-out :bg-gray-900 lg:relative lg:top-0 lg:mt-0 lg:flex lg:w-auto lg:translate-x-0 lg:items-center lg:bg-transparent lg:p-0 lg:opacity-100 lg:shadow-none lg::bg-transparent">
            <div class="lg:-px-8 flex flex-col space-y-4 lg:mt-0 lg:flex-row lg:space-y-0">
                <a class="transform text-gray-700 transition-colors duration-300 hover:text-blue-500 :text-gray-200 :hover:text-blue-400 lg:mx-8" href="#">Home</a>
                <a class="transform text-gray-700 transition-colors duration-300 hover:text-blue-500 :text-gray-200 :hover:text-blue-400 lg:mx-8" href="#">Components</a>
                <a class="transform text-gray-700 transition-colors duration-300 hover:text-blue-500 :text-gray-200 :hover:text-blue-400 lg:mx-8" href="#">Pricing</a>
                <a class="transform text-gray-700 transition-colors duration-300 hover:text-blue-500 :text-gray-200 :hover:text-blue-400 lg:mx-8" href="#">Contact</a>
            </div>

            <a class="mt-4 block rounded-lg bg-blue-600 px-6 py-2.5 text-center font-medium capitalize leading-5 text-white hover:bg-blue-500 lg:mt-0 lg:w-auto" href="template/login.php">log in</a>
            </div>
        </nav>

        <!-- hero / CTA -->
        <div class="container mx-auto px-6 py-16 text-center">
            <div class="mx-auto max-w-lg">
            <h1 class="text-3xl font-bold text-gray-800 :text-white lg:text-4xl">Welcome to JIS Research & Development</h1>
            <p class="mt-6 mb-6 text-gray-500 :text-gray-300">
                Ready to take your research to the next level?
                Join our community of innovators and start your journey with JIS R&D today. Apply for funding, track your projects, and make an impact!
            </p>
            <a href="template/register.php" class="mt-6 rounded-lg bg-blue-600 px-6 py-2.5 text-center text-sm font-medium capitalize leading-5 text-white hover:bg-blue-500 focus:outline-none lg:mx-0 lg:w-auto">
                Start innovating With us
            </a>
            <!-- <p class="mt-3 text-sm text-gray-400">No credit card required</p> -->
            </div>

            <div class="mt-10 flex justify-center">
            <img class="h-106 w-full rounded-xl object-cover lg:w-4/5 shadow-2xl" src="assets/images/pic_1.jpg" />
            </div>
        </div>
    </section>



    <!-- Research Grant Projects Section -->
    <section class="bg-white :bg-gray-900">
        <div class="container mx-auto px-6 py-10 flex flex-col">
            <h1 class="text-center text-3xl font-semibold capitalize text-gray-800 :text-white lg:text-4xl mb-3">
                Research Grant Projects Section
            </h1>

            <h6 class="text-center text-2xl font-semibold capitalize text-gray-800 :text-white lg:text-2xl">
                Explore Research Funding Opportunities
            </h6>

            <p class="mt-4 text-m text-center text-gray-700 :text-gray-300">
                Find and apply for research grants that align with your interests. Our categorized listings make it easy to browse new, ongoing, and completed projects.s
            </p>

            <!-- New Projects -->
            <h6 class="mt-4  text-center text-sm font-semibold capitalize text-gray-800 :text-white lg:text-2xl">
                New Grants/project - Open opportunities
            </h6>
            <div class="mt-4 flex gap-5 items-center justify-around">

                <!-- From Uiverse.io by satyamchaudharydev --> 
    
                <!-- <div class="card">
                    <h3 class="card__title">Title
                    </h3>
                    <p class="card__content">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Placeat voluptatum eveniet quae libero quod veniam qui atque in asperiores aut, beatae facere cupiditate itaque ad quam tempore dolor pariatur totam quia. Nostrum vitae dolor incidunt soluta sunt, dolores quos, vero voluptate quia expedita, quasi officiis explicabo accusantium aliquam error? Quia totam aut nulla dolor temporibus vitae aperiam saepe at et mollitia, voluptate tempora dolorum magni soluta facilis doloribus quo. Ipsam voluptate, ut velit nam pariatur ipsa quaerat veritatis impedit vero maiores? Placeat ex consectetur, vero magnam ea est labore incidunt, eius id optio error. Tenetur soluta atque rem deleniti saepe!</p>
                    <div class="card__domain">
                        Domain
                    </div>
                    <div class="card__date">
                        April 15, 2022
                    </div> -->


                    <!-- From Uiverse.io by andrew-demchenk0 --> 
                    <!-- <button class="button" type="button">
                        <span class="button__text">Download </span>
                        <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 35 35" id="bdd05811-e15d-428c-bb53-8661459f9307" data-name="Layer 2" class="svg"><path d="M17.5,22.131a1.249,1.249,0,0,1-1.25-1.25V2.187a1.25,1.25,0,0,1,2.5,0V20.881A1.25,1.25,0,0,1,17.5,22.131Z"></path><path d="M17.5,22.693a3.189,3.189,0,0,1-2.262-.936L8.487,15.006a1.249,1.249,0,0,1,1.767-1.767l6.751,6.751a.7.7,0,0,0,.99,0l6.751-6.751a1.25,1.25,0,0,1,1.768,1.767l-6.752,6.751A3.191,3.191,0,0,1,17.5,22.693Z"></path><path d="M31.436,34.063H3.564A3.318,3.318,0,0,1,.25,30.749V22.011a1.25,1.25,0,0,1,2.5,0v8.738a.815.815,0,0,0,.814.814H31.436a.815.815,0,0,0,.814-.814V22.011a1.25,1.25,0,1,1,2.5,0v8.738A3.318,3.318,0,0,1,31.436,34.063Z"></path></svg></span>
                    </button>
    
                    <a href="https://www.youtube.com/">
                    <div class="card__arrow">
                        Apply
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="15" width="15">
                            <path fill="#fff" d="M13.4697 17.9697C13.1768 18.2626 13.1768 18.7374 13.4697 19.0303C13.7626 19.3232 14.2374 19.3232 14.5303 19.0303L20.3232 13.2374C21.0066 12.554 21.0066 11.446 20.3232 10.7626L14.5303 4.96967C14.2374 4.67678 13.7626 4.67678 13.4697 4.96967C13.1768 5.26256 13.1768 5.73744 13.4697 6.03033L18.6893 11.25H4C3.58579 11.25 3.25 11.5858 3.25 12C3.25 12.4142 3.58579 12.75 4 12.75H18.6893L13.4697 17.9697Z"></path>
                        </svg>
                    </div>
                    </a>
                </div> -->

            

    
                <!-- <div class="card">
                    <h3 class="card__title">Title
                    </h3>
                    <p class="card__content">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Placeat voluptatum eveniet quae libero quod veniam qui atque in asperiores aut, beatae facere cupiditate itaque ad quam tempore dolor pariatur totam quia. Nostrum vitae dolor incidunt soluta sunt, dolores quos, vero voluptate quia expedita, quasi officiis explicabo accusantium aliquam error? Quia totam aut nulla dolor temporibus vitae aperiam saepe at et mollitia, voluptate tempora dolorum magni soluta facilis doloribus quo. Ipsam voluptate, ut velit nam pariatur ipsa quaerat veritatis impedit vero maiores? Placeat ex consectetur, vero magnam ea est labore incidunt, eius id optio error. Tenetur soluta atque rem deleniti saepe!</p>
                    <div class="card__domain">
                        Domain
                    </div>
                    <div class="card__date">
                        April 15, 2022
                    </div> -->


                    <!-- From Uiverse.io by andrew-demchenk0 --> 
                    <!-- <button class="button" type="button">
                        <span class="button__text">Download </span>
                        <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 35 35" id="bdd05811-e15d-428c-bb53-8661459f9307" data-name="Layer 2" class="svg"><path d="M17.5,22.131a1.249,1.249,0,0,1-1.25-1.25V2.187a1.25,1.25,0,0,1,2.5,0V20.881A1.25,1.25,0,0,1,17.5,22.131Z"></path><path d="M17.5,22.693a3.189,3.189,0,0,1-2.262-.936L8.487,15.006a1.249,1.249,0,0,1,1.767-1.767l6.751,6.751a.7.7,0,0,0,.99,0l6.751-6.751a1.25,1.25,0,0,1,1.768,1.767l-6.752,6.751A3.191,3.191,0,0,1,17.5,22.693Z"></path><path d="M31.436,34.063H3.564A3.318,3.318,0,0,1,.25,30.749V22.011a1.25,1.25,0,0,1,2.5,0v8.738a.815.815,0,0,0,.814.814H31.436a.815.815,0,0,0,.814-.814V22.011a1.25,1.25,0,1,1,2.5,0v8.738A3.318,3.318,0,0,1,31.436,34.063Z"></path></svg></span>
                    </button>
    
                    <a href="https://www.youtube.com/">
                    <div class="card__arrow">
                        Apply
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="15" width="15">
                            <path fill="#fff" d="M13.4697 17.9697C13.1768 18.2626 13.1768 18.7374 13.4697 19.0303C13.7626 19.3232 14.2374 19.3232 14.5303 19.0303L20.3232 13.2374C21.0066 12.554 21.0066 11.446 20.3232 10.7626L14.5303 4.96967C14.2374 4.67678 13.7626 4.67678 13.4697 4.96967C13.1768 5.26256 13.1768 5.73744 13.4697 6.03033L18.6893 11.25H4C3.58579 11.25 3.25 11.5858 3.25 12C3.25 12.4142 3.58579 12.75 4 12.75H18.6893L13.4697 17.9697Z"></path>
                        </svg>
                    </div>
                    </a>
                </div> -->

            

    
                <!-- <div class="card">
                    <h3 class="card__title">Title
                    </h3>
                    <p class="card__content">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Placeat voluptatum eveniet quae libero quod veniam qui atque in asperiores aut, beatae facere cupiditate itaque ad quam tempore dolor pariatur totam quia. Nostrum vitae dolor incidunt soluta sunt, dolores quos, vero voluptate quia expedita, quasi officiis explicabo accusantium aliquam error? Quia totam aut nulla dolor temporibus vitae aperiam saepe at et mollitia, voluptate tempora dolorum magni soluta facilis doloribus quo. Ipsam voluptate, ut velit nam pariatur ipsa quaerat veritatis impedit vero maiores? Placeat ex consectetur, vero magnam ea est labore incidunt, eius id optio error. Tenetur soluta atque rem deleniti saepe!</p>
                    <div class="card__domain">
                        Domain
                    </div>
                    <div class="card__date">
                        April 15, 2022
                    </div> -->


                    <!-- From Uiverse.io by andrew-demchenk0 --> 
                    <!-- <button class="button" type="button">
                        <span class="button__text">Download </span>
                        <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 35 35" id="bdd05811-e15d-428c-bb53-8661459f9307" data-name="Layer 2" class="svg"><path d="M17.5,22.131a1.249,1.249,0,0,1-1.25-1.25V2.187a1.25,1.25,0,0,1,2.5,0V20.881A1.25,1.25,0,0,1,17.5,22.131Z"></path><path d="M17.5,22.693a3.189,3.189,0,0,1-2.262-.936L8.487,15.006a1.249,1.249,0,0,1,1.767-1.767l6.751,6.751a.7.7,0,0,0,.99,0l6.751-6.751a1.25,1.25,0,0,1,1.768,1.767l-6.752,6.751A3.191,3.191,0,0,1,17.5,22.693Z"></path><path d="M31.436,34.063H3.564A3.318,3.318,0,0,1,.25,30.749V22.011a1.25,1.25,0,0,1,2.5,0v8.738a.815.815,0,0,0,.814.814H31.436a.815.815,0,0,0,.814-.814V22.011a1.25,1.25,0,1,1,2.5,0v8.738A3.318,3.318,0,0,1,31.436,34.063Z"></path></svg></span>
                    </button>
    
                    <a href="https://www.youtube.com/">
                    <div class="card__arrow">
                        Apply
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="15" width="15">
                            <path fill="#fff" d="M13.4697 17.9697C13.1768 18.2626 13.1768 18.7374 13.4697 19.0303C13.7626 19.3232 14.2374 19.3232 14.5303 19.0303L20.3232 13.2374C21.0066 12.554 21.0066 11.446 20.3232 10.7626L14.5303 4.96967C14.2374 4.67678 13.7626 4.67678 13.4697 4.96967C13.1768 5.26256 13.1768 5.73744 13.4697 6.03033L18.6893 11.25H4C3.58579 11.25 3.25 11.5858 3.25 12C3.25 12.4142 3.58579 12.75 4 12.75H18.6893L13.4697 17.9697Z"></path>
                        </svg>
                    </div>
                    </a>
                </div> -->
                <?php include 'includes/index_new_project.php'; ?> 

        

            </div>

            <h6 class="mt-4  text-center text-sm font-semibold capitalize text-gray-800 :text-white lg:text-2xl">
                Ongoing Grants/project - Open opportunities
            </h6>
            <div class="mt-4 flex gap-5 items-center justify-around">

                <!-- From Uiverse.io by satyamchaudharydev --> 
    
                <!-- <div class="card">
                    <h3 class="card__title">Title
                    </h3>
                    <p class="card__content">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Placeat voluptatum eveniet quae libero quod veniam qui atque in asperiores aut, beatae facere cupiditate itaque ad quam tempore dolor pariatur totam quia. Nostrum vitae dolor incidunt soluta sunt, dolores quos, vero voluptate quia expedita, quasi officiis explicabo accusantium aliquam error? Quia totam aut nulla dolor temporibus vitae aperiam saepe at et mollitia, voluptate tempora dolorum magni soluta facilis doloribus quo. Ipsam voluptate, ut velit nam pariatur ipsa quaerat veritatis impedit vero maiores? Placeat ex consectetur, vero magnam ea est labore incidunt, eius id optio error. Tenetur soluta atque rem deleniti saepe!</p>
                    <div class="card__domain">
                        Domain
                    </div>
                    <div class="card__date">
                        April 15, 2022
                    </div> -->


                    <!-- From Uiverse.io by andrew-demchenk0 --> 
                    <!-- <button class="button" type="button">
                        <span class="button__text">Download </span>
                        <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 35 35" id="bdd05811-e15d-428c-bb53-8661459f9307" data-name="Layer 2" class="svg"><path d="M17.5,22.131a1.249,1.249,0,0,1-1.25-1.25V2.187a1.25,1.25,0,0,1,2.5,0V20.881A1.25,1.25,0,0,1,17.5,22.131Z"></path><path d="M17.5,22.693a3.189,3.189,0,0,1-2.262-.936L8.487,15.006a1.249,1.249,0,0,1,1.767-1.767l6.751,6.751a.7.7,0,0,0,.99,0l6.751-6.751a1.25,1.25,0,0,1,1.768,1.767l-6.752,6.751A3.191,3.191,0,0,1,17.5,22.693Z"></path><path d="M31.436,34.063H3.564A3.318,3.318,0,0,1,.25,30.749V22.011a1.25,1.25,0,0,1,2.5,0v8.738a.815.815,0,0,0,.814.814H31.436a.815.815,0,0,0,.814-.814V22.011a1.25,1.25,0,1,1,2.5,0v8.738A3.318,3.318,0,0,1,31.436,34.063Z"></path></svg></span>
                    </button>
    
                    <a href="https://www.youtube.com/">
                    <div class="card__arrow">
                        Apply
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="15" width="15">
                            <path fill="#fff" d="M13.4697 17.9697C13.1768 18.2626 13.1768 18.7374 13.4697 19.0303C13.7626 19.3232 14.2374 19.3232 14.5303 19.0303L20.3232 13.2374C21.0066 12.554 21.0066 11.446 20.3232 10.7626L14.5303 4.96967C14.2374 4.67678 13.7626 4.67678 13.4697 4.96967C13.1768 5.26256 13.1768 5.73744 13.4697 6.03033L18.6893 11.25H4C3.58579 11.25 3.25 11.5858 3.25 12C3.25 12.4142 3.58579 12.75 4 12.75H18.6893L13.4697 17.9697Z"></path>
                        </svg>
                    </div>
                    </a>
                </div> -->

            

    
                <!-- <div class="card">
                    <h3 class="card__title">Title
                    </h3>
                    <p class="card__content">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Placeat voluptatum eveniet quae libero quod veniam qui atque in asperiores aut, beatae facere cupiditate itaque ad quam tempore dolor pariatur totam quia. Nostrum vitae dolor incidunt soluta sunt, dolores quos, vero voluptate quia expedita, quasi officiis explicabo accusantium aliquam error? Quia totam aut nulla dolor temporibus vitae aperiam saepe at et mollitia, voluptate tempora dolorum magni soluta facilis doloribus quo. Ipsam voluptate, ut velit nam pariatur ipsa quaerat veritatis impedit vero maiores? Placeat ex consectetur, vero magnam ea est labore incidunt, eius id optio error. Tenetur soluta atque rem deleniti saepe!</p>
                    <div class="card__domain">
                        Domain
                    </div>
                    <div class="card__date">
                        April 15, 2022
                    </div> -->


                    <!-- From Uiverse.io by andrew-demchenk0 --> 
                    <!-- <button class="button" type="button">
                        <span class="button__text">Download </span>
                        <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 35 35" id="bdd05811-e15d-428c-bb53-8661459f9307" data-name="Layer 2" class="svg"><path d="M17.5,22.131a1.249,1.249,0,0,1-1.25-1.25V2.187a1.25,1.25,0,0,1,2.5,0V20.881A1.25,1.25,0,0,1,17.5,22.131Z"></path><path d="M17.5,22.693a3.189,3.189,0,0,1-2.262-.936L8.487,15.006a1.249,1.249,0,0,1,1.767-1.767l6.751,6.751a.7.7,0,0,0,.99,0l6.751-6.751a1.25,1.25,0,0,1,1.768,1.767l-6.752,6.751A3.191,3.191,0,0,1,17.5,22.693Z"></path><path d="M31.436,34.063H3.564A3.318,3.318,0,0,1,.25,30.749V22.011a1.25,1.25,0,0,1,2.5,0v8.738a.815.815,0,0,0,.814.814H31.436a.815.815,0,0,0,.814-.814V22.011a1.25,1.25,0,1,1,2.5,0v8.738A3.318,3.318,0,0,1,31.436,34.063Z"></path></svg></span>
                    </button>
    
                    <a href="https://www.youtube.com/">
                    <div class="card__arrow">
                        Apply
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="15" width="15">
                            <path fill="#fff" d="M13.4697 17.9697C13.1768 18.2626 13.1768 18.7374 13.4697 19.0303C13.7626 19.3232 14.2374 19.3232 14.5303 19.0303L20.3232 13.2374C21.0066 12.554 21.0066 11.446 20.3232 10.7626L14.5303 4.96967C14.2374 4.67678 13.7626 4.67678 13.4697 4.96967C13.1768 5.26256 13.1768 5.73744 13.4697 6.03033L18.6893 11.25H4C3.58579 11.25 3.25 11.5858 3.25 12C3.25 12.4142 3.58579 12.75 4 12.75H18.6893L13.4697 17.9697Z"></path>
                        </svg>
                    </div>
                    </a>
                </div> -->

            

    
                <!-- <div class="card">
                    <h3 class="card__title">Title
                    </h3>
                    <p class="card__content">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Placeat voluptatum eveniet quae libero quod veniam qui atque in asperiores aut, beatae facere cupiditate itaque ad quam tempore dolor pariatur totam quia. Nostrum vitae dolor incidunt soluta sunt, dolores quos, vero voluptate quia expedita, quasi officiis explicabo accusantium aliquam error? Quia totam aut nulla dolor temporibus vitae aperiam saepe at et mollitia, voluptate tempora dolorum magni soluta facilis doloribus quo. Ipsam voluptate, ut velit nam pariatur ipsa quaerat veritatis impedit vero maiores? Placeat ex consectetur, vero magnam ea est labore incidunt, eius id optio error. Tenetur soluta atque rem deleniti saepe!</p>
                    <div class="card__domain">
                        Domain
                    </div>
                    <div class="card__date">
                        April 15, 2022
                    </div> -->


                    <!-- From Uiverse.io by andrew-demchenk0 --> 
                    <!-- <button class="button" type="button">
                        <span class="button__text">Download </span>
                        <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 35 35" id="bdd05811-e15d-428c-bb53-8661459f9307" data-name="Layer 2" class="svg"><path d="M17.5,22.131a1.249,1.249,0,0,1-1.25-1.25V2.187a1.25,1.25,0,0,1,2.5,0V20.881A1.25,1.25,0,0,1,17.5,22.131Z"></path><path d="M17.5,22.693a3.189,3.189,0,0,1-2.262-.936L8.487,15.006a1.249,1.249,0,0,1,1.767-1.767l6.751,6.751a.7.7,0,0,0,.99,0l6.751-6.751a1.25,1.25,0,0,1,1.768,1.767l-6.752,6.751A3.191,3.191,0,0,1,17.5,22.693Z"></path><path d="M31.436,34.063H3.564A3.318,3.318,0,0,1,.25,30.749V22.011a1.25,1.25,0,0,1,2.5,0v8.738a.815.815,0,0,0,.814.814H31.436a.815.815,0,0,0,.814-.814V22.011a1.25,1.25,0,1,1,2.5,0v8.738A3.318,3.318,0,0,1,31.436,34.063Z"></path></svg></span>
                    </button>
    
                    <a href="https://www.youtube.com/">
                    <div class="card__arrow">
                        Apply
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="15" width="15">
                            <path fill="#fff" d="M13.4697 17.9697C13.1768 18.2626 13.1768 18.7374 13.4697 19.0303C13.7626 19.3232 14.2374 19.3232 14.5303 19.0303L20.3232 13.2374C21.0066 12.554 21.0066 11.446 20.3232 10.7626L14.5303 4.96967C14.2374 4.67678 13.7626 4.67678 13.4697 4.96967C13.1768 5.26256 13.1768 5.73744 13.4697 6.03033L18.6893 11.25H4C3.58579 11.25 3.25 11.5858 3.25 12C3.25 12.4142 3.58579 12.75 4 12.75H18.6893L13.4697 17.9697Z"></path>
                        </svg>
                    </div>
                    </a>
                </div> -->

            

                <?php include 'includes/index_ongoing_project.php'; ?> 
            



            </div>
            
            <h6 class="mt-4  text-center text-sm font-semibold capitalize text-gray-800 :text-white lg:text-2xl">
                completed Grants/project - Open opportunities
            </h6>
            <div class="mt-4 flex gap-5 items-center justify-around">

                <!-- From Uiverse.io by satyamchaudharydev --> 
    
                <!-- <div class="card">
                    <h3 class="card__title">Title
                    </h3>
                    <p class="card__content">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Placeat voluptatum eveniet quae libero quod veniam qui atque in asperiores aut, beatae facere cupiditate itaque ad quam tempore dolor pariatur totam quia. Nostrum vitae dolor incidunt soluta sunt, dolores quos, vero voluptate quia expedita, quasi officiis explicabo accusantium aliquam error? Quia totam aut nulla dolor temporibus vitae aperiam saepe at et mollitia, voluptate tempora dolorum magni soluta facilis doloribus quo. Ipsam voluptate, ut velit nam pariatur ipsa quaerat veritatis impedit vero maiores? Placeat ex consectetur, vero magnam ea est labore incidunt, eius id optio error. Tenetur soluta atque rem deleniti saepe!</p>
                    <div class="card__domain">
                        Domain
                    </div>
                    <div class="card__date">
                        April 15, 2022
                    </div> -->


                    <!-- From Uiverse.io by andrew-demchenk0 --> 
                    <!-- <button class="button" type="button">
                        <span class="button__text">Download </span>
                        <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 35 35" id="bdd05811-e15d-428c-bb53-8661459f9307" data-name="Layer 2" class="svg"><path d="M17.5,22.131a1.249,1.249,0,0,1-1.25-1.25V2.187a1.25,1.25,0,0,1,2.5,0V20.881A1.25,1.25,0,0,1,17.5,22.131Z"></path><path d="M17.5,22.693a3.189,3.189,0,0,1-2.262-.936L8.487,15.006a1.249,1.249,0,0,1,1.767-1.767l6.751,6.751a.7.7,0,0,0,.99,0l6.751-6.751a1.25,1.25,0,0,1,1.768,1.767l-6.752,6.751A3.191,3.191,0,0,1,17.5,22.693Z"></path><path d="M31.436,34.063H3.564A3.318,3.318,0,0,1,.25,30.749V22.011a1.25,1.25,0,0,1,2.5,0v8.738a.815.815,0,0,0,.814.814H31.436a.815.815,0,0,0,.814-.814V22.011a1.25,1.25,0,1,1,2.5,0v8.738A3.318,3.318,0,0,1,31.436,34.063Z"></path></svg></span>
                    </button>
    
                    <a href="https://www.youtube.com/">
                    <div class="card__arrow">
                        Apply
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="15" width="15">
                            <path fill="#fff" d="M13.4697 17.9697C13.1768 18.2626 13.1768 18.7374 13.4697 19.0303C13.7626 19.3232 14.2374 19.3232 14.5303 19.0303L20.3232 13.2374C21.0066 12.554 21.0066 11.446 20.3232 10.7626L14.5303 4.96967C14.2374 4.67678 13.7626 4.67678 13.4697 4.96967C13.1768 5.26256 13.1768 5.73744 13.4697 6.03033L18.6893 11.25H4C3.58579 11.25 3.25 11.5858 3.25 12C3.25 12.4142 3.58579 12.75 4 12.75H18.6893L13.4697 17.9697Z"></path>
                        </svg>
                    </div>
                    </a>
                </div> -->

            

    
                <!-- <div class="card">
                    <h3 class="card__title">Title
                    </h3>
                    <p class="card__content">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Placeat voluptatum eveniet quae libero quod veniam qui atque in asperiores aut, beatae facere cupiditate itaque ad quam tempore dolor pariatur totam quia. Nostrum vitae dolor incidunt soluta sunt, dolores quos, vero voluptate quia expedita, quasi officiis explicabo accusantium aliquam error? Quia totam aut nulla dolor temporibus vitae aperiam saepe at et mollitia, voluptate tempora dolorum magni soluta facilis doloribus quo. Ipsam voluptate, ut velit nam pariatur ipsa quaerat veritatis impedit vero maiores? Placeat ex consectetur, vero magnam ea est labore incidunt, eius id optio error. Tenetur soluta atque rem deleniti saepe!</p>
                    <div class="card__domain">
                        Domain
                    </div>
                    <div class="card__date">
                        April 15, 2022
                    </div> -->


                    <!-- From Uiverse.io by andrew-demchenk0 --> 
                    <!-- <button class="button" type="button">
                        <span class="button__text">Download </span>
                        <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 35 35" id="bdd05811-e15d-428c-bb53-8661459f9307" data-name="Layer 2" class="svg"><path d="M17.5,22.131a1.249,1.249,0,0,1-1.25-1.25V2.187a1.25,1.25,0,0,1,2.5,0V20.881A1.25,1.25,0,0,1,17.5,22.131Z"></path><path d="M17.5,22.693a3.189,3.189,0,0,1-2.262-.936L8.487,15.006a1.249,1.249,0,0,1,1.767-1.767l6.751,6.751a.7.7,0,0,0,.99,0l6.751-6.751a1.25,1.25,0,0,1,1.768,1.767l-6.752,6.751A3.191,3.191,0,0,1,17.5,22.693Z"></path><path d="M31.436,34.063H3.564A3.318,3.318,0,0,1,.25,30.749V22.011a1.25,1.25,0,0,1,2.5,0v8.738a.815.815,0,0,0,.814.814H31.436a.815.815,0,0,0,.814-.814V22.011a1.25,1.25,0,1,1,2.5,0v8.738A3.318,3.318,0,0,1,31.436,34.063Z"></path></svg></span>
                    </button>
    
                    <a href="https://www.youtube.com/">
                    <div class="card__arrow">
                        Apply
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="15" width="15">
                            <path fill="#fff" d="M13.4697 17.9697C13.1768 18.2626 13.1768 18.7374 13.4697 19.0303C13.7626 19.3232 14.2374 19.3232 14.5303 19.0303L20.3232 13.2374C21.0066 12.554 21.0066 11.446 20.3232 10.7626L14.5303 4.96967C14.2374 4.67678 13.7626 4.67678 13.4697 4.96967C13.1768 5.26256 13.1768 5.73744 13.4697 6.03033L18.6893 11.25H4C3.58579 11.25 3.25 11.5858 3.25 12C3.25 12.4142 3.58579 12.75 4 12.75H18.6893L13.4697 17.9697Z"></path>
                        </svg>
                    </div>
                    </a>
                </div> -->

            

    
                <!-- <div class="card">
                    <h3 class="card__title">Title
                    </h3>
                    <p class="card__content">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Placeat voluptatum eveniet quae libero quod veniam qui atque in asperiores aut, beatae facere cupiditate itaque ad quam tempore dolor pariatur totam quia. Nostrum vitae dolor incidunt soluta sunt, dolores quos, vero voluptate quia expedita, quasi officiis explicabo accusantium aliquam error? Quia totam aut nulla dolor temporibus vitae aperiam saepe at et mollitia, voluptate tempora dolorum magni soluta facilis doloribus quo. Ipsam voluptate, ut velit nam pariatur ipsa quaerat veritatis impedit vero maiores? Placeat ex consectetur, vero magnam ea est labore incidunt, eius id optio error. Tenetur soluta atque rem deleniti saepe!</p>
                    <div class="card__domain">
                        Domain
                    </div>
                    <div class="card__date">
                        April 15, 2022
                    </div> -->


                    <!-- From Uiverse.io by andrew-demchenk0 --> 
                    <!-- <button class="button" type="button">
                        <span class="button__text">Download </span>
                        <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 35 35" id="bdd05811-e15d-428c-bb53-8661459f9307" data-name="Layer 2" class="svg"><path d="M17.5,22.131a1.249,1.249,0,0,1-1.25-1.25V2.187a1.25,1.25,0,0,1,2.5,0V20.881A1.25,1.25,0,0,1,17.5,22.131Z"></path><path d="M17.5,22.693a3.189,3.189,0,0,1-2.262-.936L8.487,15.006a1.249,1.249,0,0,1,1.767-1.767l6.751,6.751a.7.7,0,0,0,.99,0l6.751-6.751a1.25,1.25,0,0,1,1.768,1.767l-6.752,6.751A3.191,3.191,0,0,1,17.5,22.693Z"></path><path d="M31.436,34.063H3.564A3.318,3.318,0,0,1,.25,30.749V22.011a1.25,1.25,0,0,1,2.5,0v8.738a.815.815,0,0,0,.814.814H31.436a.815.815,0,0,0,.814-.814V22.011a1.25,1.25,0,1,1,2.5,0v8.738A3.318,3.318,0,0,1,31.436,34.063Z"></path></svg></span>
                    </button>
    
                    <a href="https://www.youtube.com/">
                    <div class="card__arrow">
                        Apply
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="15" width="15">
                            <path fill="#fff" d="M13.4697 17.9697C13.1768 18.2626 13.1768 18.7374 13.4697 19.0303C13.7626 19.3232 14.2374 19.3232 14.5303 19.0303L20.3232 13.2374C21.0066 12.554 21.0066 11.446 20.3232 10.7626L14.5303 4.96967C14.2374 4.67678 13.7626 4.67678 13.4697 4.96967C13.1768 5.26256 13.1768 5.73744 13.4697 6.03033L18.6893 11.25H4C3.58579 11.25 3.25 11.5858 3.25 12C3.25 12.4142 3.58579 12.75 4 12.75H18.6893L13.4697 17.9697Z"></path>
                        </svg>
                    </div>
                    </a>
                </div> -->




            <?php include 'includes/index_completed_project.php'; ?> 


            



            </div>








        </div>
    </section>


    <section class="bg-white :bg-gray-900">
    <div class="h-[600px] bg-gray-100 :bg-gray-800">
        <div class="container mx-auto px-6 py-10">
            <h1 class="text-center text-3xl font-semibold capitalize text-gray-800 :text-white lg:text-4xl">RFMO Section</h1>

            
            <div class="mx-auto mt-6 flex justify-center">
                <span class="inline-block h-1 w-40 rounded-full bg-blue-500"></span>
                <span class="mx-1 inline-block h-1 w-3 rounded-full bg-blue-500"></span>
                <span class="inline-block h-1 w-1 rounded-full bg-blue-500"></span>
            </div>

            <h6 class="mt-8 text-center text-2xl font-semibold capitalize text-gray-800 :text-white lg:text-2xl">
                Explore Research Funding Opportunities
            </h6>

            <p class="mx-auto mt-2 max-w-2xl text-center text-gray-900 :text-gray-300">Find and apply for research grants that align with your interests. Our categorized listings make it easy to browse new, ongoing, and completed projects.
            </p>

            <h6 class="mt-8 mb-8  text-center text-2xl font-semibold capitalize text-gray-800 :text-white lg:text-2xl">
                How It Works
            </h6>
        </div>
    </div>

    <div class="container mx-auto mt-72 px-6 py-10 sm:-mt-80 md:-mt-96">
        <div class="mt-8 grid grid-cols-1 gap-8 md:grid-cols-2 xl:mt-16 xl:grid-cols-4">


            <div class="flex flex-col items-center rounded-xl border p-4 :border-gray-700 sm:p-6">
           


                <h6 class="mt-8 text-center text-2xl font-semibold capitalize text-gray-800 :text-white lg:text-2xl">
                    Step-1 Submit Your Proposal / Apply on listed projects
                </h6>
                <p class="mx-auto mt-2 max-w-2xl text-center text-gray-900 :text-gray-300">Complete the project proposal form and submit it online.
                </p>
            
            </div>


            <div class="flex flex-col items-center rounded-xl border p-4 :border-gray-700 sm:p-6">
           


                <h6 class="mt-8 text-center text-2xl font-semibold capitalize text-gray-800 :text-white lg:text-2xl">
                    Step-2 Evaluation Process 
                    
                </h6>
                <p class="mx-auto mt-2 max-w-2xl text-center text-gray-900 :text-gray-300">Proposals are reviewed based on feasibility, impact, and alignment with research goals.
                </p>
            
            </div>


            <div class="flex flex-col items-center rounded-xl border p-4 :border-gray-700 sm:p-6">
           


                <h6 class="mt-8 text-center text-2xl font-semibold capitalize text-gray-800 :text-white lg:text-2xl">
                    Step-3 Approval & Funding
                    
                    
                </h6>
                <p class="mx-auto mt-2 max-w-2xl text-center text-gray-900 :text-gray-300">Approved projects receive funding in phases, contingent on progress evaluations.
                </p>
            
            </div>


            <div class="flex flex-col items-center rounded-xl border p-4 :border-gray-700 sm:p-6">
           


                <h6 class="mt-8 text-center text-2xl font-semibold capitalize text-gray-800 :text-white lg:text-2xl">
                    Step-4 Quarterly Reporting
                    
                </h6>
                <p class="mx-auto mt-2 max-w-2xl text-center text-gray-900 :text-gray-300">Researchers must submit regular updates on their project status.
                </p>
            
            </div>

        </div>

        
    </div>
    </section>

    <section class="bg-white :bg-gray-900">
    <div class="container mx-auto px-6 py-10">
        <h1 class="text-center text-3xl font-semibold capitalize text-gray-800 :text-white lg:text-4xl">What invertors saying</h1>

        <div class="mx-auto mt-6 flex justify-center">
        <span class="inline-block h-1 w-40 rounded-full bg-blue-500"></span>
        <span class="mx-1 inline-block h-1 w-3 rounded-full bg-blue-500"></span>
        <span class="inline-block h-1 w-1 rounded-full bg-blue-500"></span>
        </div>

        <div class="mx-auto mt-16 flex max-w-6xl items-start">
        <button class="hidden rounded-full border p-2 text-gray-800 transition-colors duration-300 hover:bg-gray-100 rtl:-scale-x-100 :border-gray-700 :text-gray-200 :hover:bg-gray-800 lg:block">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
        </button>

        <div>
            <p class="flex items-center text-center text-gray-500 lg:mx-8">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, quam. Odio voluptatem officiis eos illo! Pariatur, totam alias. Beatae accusamus earum quos obcaecati minima molestias. Possimus minima dolores itaque! Esse! Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea voluptates fugiat corrupti laudantium dolores reiciendis pariatur esse quod nihil quia cupiditate debitis quisquam nemo, accusamus animi explicabo? Architecto, unde laboriosam?</p>

            <div class="mt-8 flex flex-col items-center justify-center">
            <img class="h-14 w-14 rounded-full object-cover" src="https://images.unsplash.com/photo-1499470932971-a90681ce8530?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="" />

            <div class="mt-4 text-center">
                <h1 class="font-semibold text-gray-800 :text-white">Mia Brown</h1>
                <span class="text-sm text-gray-500 :text-gray-400">Marketer</span>
            </div>
            </div>
        </div>

        <button class="hidden rounded-full border p-2 text-gray-800 transition-colors duration-300 hover:bg-gray-100 rtl:-scale-x-100 :border-gray-700 :text-gray-200 :hover:bg-gray-800 lg:block">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
            </svg>
        </button>
        </div>
    </div>
    </section>

    

    <section class="bg-white :bg-gray-900">
    <div class="container mx-auto max-w-4xl px-6 py-10">
        <h1 class="text-center text-4xl font-semibold text-gray-800 :text-white">Frequently asked questions</h1>

        <!-- component -->
    <div class="max-w-screen-xl mx-auto px-5 bg-white min-h-sceen">
        <div class="flex flex-col items-center">
            <h2 class="font-bold text-5xl mt-5 tracking-tight">
                FAQ
            </h2>
            <p class="text-neutral-500 text-xl mt-3">
                Frequenty asked questions
            </p>
        </div>
        <div class="grid divide-y divide-neutral-200 max-w-xl mx-auto mt-8">
            <div class="py-5">
                <details class="group">
                    <summary class="flex justify-between items-center font-medium cursor-pointer list-none">
                        <span> What is a SAAS platform?</span>
                        <span class="transition group-open:rotate-180">
                    <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24"><path d="M6 9l6 6 6-6"></path>
    </svg>
                </span>
                    </summary>
                    <p class="text-neutral-600 mt-3 group-open:animate-fadeIn">
                        SAAS platform is a cloud-based software service that allows users to access
                        and use a variety of tools and functionality.
                    </p>
                </details>
            </div>
            <div class="py-5">
                <details class="group">
                    <summary class="flex justify-between items-center font-medium cursor-pointer list-none">
                        <span> How does  billing work?</span>
                        <span class="transition group-open:rotate-180">
                    <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24"><path d="M6 9l6 6 6-6"></path>
    </svg>
                </span>
                    </summary>
                    <p class="text-neutral-600 mt-3 group-open:animate-fadeIn">
                        We offers a variety of billing options, including monthly and annual subscription plans,
                        as well as pay-as-you-go pricing for certain services. Payment is typically made through a credit
                        card or other secure online payment method.
                    </p>
                </details>
            </div>
            <div class="py-5">
                <details class="group">
                    <summary class="flex justify-between items-center font-medium cursor-pointer list-none">
                        <span> Can I get a refund for my subscription?</span>
                        <span class="transition group-open:rotate-180">
                    <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24"><path d="M6 9l6 6 6-6"></path>
    </svg>
                </span>
                    </summary>
                    <p class="text-neutral-600 mt-3 group-open:animate-fadeIn">
                        We offers a 30-day money-back guarantee for most of its subscription plans. If you are not
                        satisfied with your subscription within the first 30 days, you can request a full refund. Refunds
                        for subscriptions that have been active for longer than 30 days may be considered on a case-by-case
                        basis.
                    </p>
                </details>
            </div>
            <div class="py-5">
                <details class="group">
                    <summary class="flex justify-between items-center font-medium cursor-pointer list-none">
                        <span> How do I cancel my subscription?</span>
                        <span class="transition group-open:rotate-180">
                    <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24"><path d="M6 9l6 6 6-6"></path>
    </svg>
                </span>
                    </summary>
                    <p class="text-neutral-600 mt-3 group-open:animate-fadeIn">
                        To cancel your We subscription, you can log in to your account and navigate to the
                        subscription management page. From there, you should be able to cancel your subscription and stop
                        future billing.
                    </p>
                </details>
            </div>
            <div class="py-5">
                <details class="group">
                    <summary class="flex justify-between items-center font-medium cursor-pointer list-none">
                        <span> Can I try this platform for free?</span>
                        <span class="transition group-open:rotate-180">
                    <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24"><path d="M6 9l6 6 6-6"></path>
    </svg>
                </span>
                    </summary>
                    <p class="text-neutral-600 mt-3 group-open:animate-fadeIn">
                        We offers a free trial of its  platform for a limited time. During the trial period,
                        you will have access to a limited set of features and functionality, but you will not be charged.
                    </p>
                </details>
            </div>
            <div class="py-5">
                <details class="group">
                    <summary class="flex justify-between items-center font-medium cursor-pointer list-none">
                        <span> How do I access   documentation?</span>
                        <span class="transition group-open:rotate-180">
                    <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24"><path d="M6 9l6 6 6-6"></path>
    </svg>
                </span>
                    </summary>
                    <p class="text-neutral-600 mt-3 group-open:animate-fadeIn">
                        Documentation is available on the company's website and can be accessed by
                        logging in to your account. The documentation provides detailed information on how to use the ,
                        as well as code examples and other resources.
                    </p>
                </details>
            </div>
            
        </div>
    </div>


    </div>
    </section>

    <section class="min-h-screen bg-gradient-to-r from-blue-600 via-blue-800 to-blue-900 :from-gray-700 :via-gray-800 :to-gray-900">
    <div class="container mx-auto flex min-h-screen flex-col px-6 py-12">
        <div class="flex-1 lg:-mx-6 lg:flex lg:items-center">
        <div class="text-white lg:mx-6 lg:w-1/2">
            <h1 class="text-3xl font-semibold capitalize lg:text-5xl">Get in Touch with JIS RFMO</h1>

            <p class="mt-6 max-w-xl">Ask us everything and we would love to hear from you</p>

            <div class="mt-6 space-y-8 md:mt-8">
            <p class="-mx-2 flex items-start">
                <svg xmlns="http://www.w3.org/2000/svg" class="mx-2 h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>

                <span class="mx-2 w-72 truncate text-white"> Cecilia Chapman 711-2880 Nulla St. Mankato Mississippi 96522 </span>
            </p>

            <p class="-mx-2 flex items-start">
                <svg xmlns="http://www.w3.org/2000/svg" class="mx-2 h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                </svg>

                <span class="mx-2 w-72 truncate text-white">(257) 563-7401</span>
            </p>

            <p class="-mx-2 flex items-start">
                <svg xmlns="http://www.w3.org/2000/svg" class="mx-2 h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>

                <span class="mx-2 w-72 truncate text-white">acb@jisgroup.org</span>
            </p>
            </div>

            <div class="mt-6 md:mt-8">
            <h3 class="text-gray-300">Follow us</h3>

            <div class="-mx-1.5 mt-4 flex">
                <a class="mx-1.5 transform text-white transition-colors duration-300 hover:text-blue-500" href="#">
                <svg class="h-10 w-10 fill-current" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18.6668 6.67334C18.0002 7.00001 17.3468 7.13268 16.6668 7.33334C15.9195 6.49001 14.8115 6.44334 13.7468 6.84201C12.6822 7.24068 11.9848 8.21534 12.0002 9.33334V10C9.83683 10.0553 7.91016 9.07001 6.66683 7.33334C6.66683 7.33334 3.87883 12.2887 9.3335 14.6667C8.0855 15.498 6.84083 16.0587 5.3335 16C7.53883 17.202 9.94216 17.6153 12.0228 17.0113C14.4095 16.318 16.3708 14.5293 17.1235 11.85C17.348 11.0351 17.4595 10.1932 17.4548 9.34801C17.4535 9.18201 18.4615 7.50001 18.6668 6.67268V6.67334Z" />
                </svg>
                </a>

                <a class="mx-1.5 transform text-white transition-colors duration-300 hover:text-blue-500" href="#">
                <svg class="h-8 w-8" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.2 8.80005C16.4731 8.80005 17.694 9.30576 18.5941 10.2059C19.4943 11.1061 20 12.327 20 13.6V19.2H16.8V13.6C16.8 13.1757 16.6315 12.7687 16.3314 12.4687C16.0313 12.1686 15.6244 12 15.2 12C14.7757 12 14.3687 12.1686 14.0687 12.4687C13.7686 12.7687 13.6 13.1757 13.6 13.6V19.2H10.4V13.6C10.4 12.327 10.9057 11.1061 11.8059 10.2059C12.7061 9.30576 13.927 8.80005 15.2 8.80005Z" fill="currentColor" />
                    <path d="M7.2 9.6001H4V19.2001H7.2V9.6001Z" fill="currentColor" />
                    <path d="M5.6 7.2C6.48366 7.2 7.2 6.48366 7.2 5.6C7.2 4.71634 6.48366 4 5.6 4C4.71634 4 4 4.71634 4 5.6C4 6.48366 4.71634 7.2 5.6 7.2Z" fill="currentColor" />
                </svg>
                </a>

                <a class="mx-1.5 transform text-white transition-colors duration-300 hover:text-blue-500" href="#">
                <svg class="h-8 w-8" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7 10.2222V13.7778H9.66667V20H13.2222V13.7778H15.8889L16.7778 10.2222H13.2222V8.44444C13.2222 8.2087 13.3159 7.9826 13.4826 7.81591C13.6493 7.64921 13.8754 7.55556 14.1111 7.55556H16.7778V4H14.1111C12.9324 4 11.8019 4.46825 10.9684 5.30175C10.1349 6.13524 9.66667 7.2657 9.66667 8.44444V10.2222H7Z" fill="currentColor" />
                </svg>
                </a>

                <a class="mx-1.5 transform text-white transition-colors duration-300 hover:text-blue-500" href="#">
                <svg class="h-8 w-8" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.9294 7.72275C9.65868 7.72275 7.82715 9.55428 7.82715 11.825C7.82715 14.0956 9.65868 15.9271 11.9294 15.9271C14.2 15.9271 16.0316 14.0956 16.0316 11.825C16.0316 9.55428 14.2 7.72275 11.9294 7.72275ZM11.9294 14.4919C10.462 14.4919 9.26239 13.2959 9.26239 11.825C9.26239 10.354 10.4584 9.15799 11.9294 9.15799C13.4003 9.15799 14.5963 10.354 14.5963 11.825C14.5963 13.2959 13.3967 14.4919 11.9294 14.4919ZM17.1562 7.55495C17.1562 8.08692 16.7277 8.51178 16.1994 8.51178C15.6674 8.51178 15.2425 8.08335 15.2425 7.55495C15.2425 7.02656 15.671 6.59813 16.1994 6.59813C16.7277 6.59813 17.1562 7.02656 17.1562 7.55495ZM19.8731 8.52606C19.8124 7.24434 19.5197 6.10901 18.5807 5.17361C17.6453 4.23821 16.51 3.94545 15.2282 3.88118C13.9073 3.80621 9.94787 3.80621 8.62689 3.88118C7.34874 3.94188 6.21341 4.23464 5.27444 5.17004C4.33547 6.10544 4.04628 7.24077 3.98201 8.52249C3.90704 9.84347 3.90704 13.8029 3.98201 15.1238C4.04271 16.4056 4.33547 17.5409 5.27444 18.4763C6.21341 19.4117 7.34517 19.7045 8.62689 19.7687C9.94787 19.8437 13.9073 19.8437 15.2282 19.7687C16.51 19.708 17.6453 19.4153 18.5807 18.4763C19.5161 17.5409 19.8089 16.4056 19.8731 15.1238C19.9481 13.8029 19.9481 9.84704 19.8731 8.52606ZM18.1665 16.5412C17.8881 17.241 17.349 17.7801 16.6456 18.0621C15.5924 18.4799 13.0932 18.3835 11.9294 18.3835C10.7655 18.3835 8.26272 18.4763 7.21307 18.0621C6.51331 17.7837 5.9742 17.2446 5.69215 16.5412C5.27444 15.488 5.37083 12.9888 5.37083 11.825C5.37083 10.6611 5.27801 8.15832 5.69215 7.10867C5.97063 6.40891 6.50974 5.8698 7.21307 5.58775C8.26629 5.17004 10.7655 5.26643 11.9294 5.26643C13.0932 5.26643 15.596 5.17361 16.6456 5.58775C17.3454 5.86623 17.8845 6.40534 18.1665 7.10867C18.5843 8.16189 18.4879 10.6611 18.4879 11.825C18.4879 12.9888 18.5843 15.4916 18.1665 16.5412Z" fill="currentColor" />
                </svg>
                </a>
            </div>
            </div>
        </div>

        <div class="mt-8 lg:mx-6 lg:w-1/2">
            <div class="mx-auto w-full overflow-hidden rounded-xl bg-white px-8 py-10 shadow-2xl :bg-gray-900 lg:max-w-xl">
                <h1 class="text-2xl font-medium text-gray-700 :text-gray-200">Contact form</h1>

                <form class="mt-6" name="submit-to-google-sheet">
                    <div class="flex-1">
                    <label class="mb-2 block text-sm text-gray-600 :text-gray-200">Full Name</label>
                    <input type="text" name="Name" placeholder="John Doe" class="mt-2 block w-full rounded-md border border-gray-200 bg-white px-5 py-3 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 :border-gray-600 :bg-gray-900 :text-gray-300 :focus:border-blue-300" />
                    </div>

                    <div class="mt-6 flex-1">
                    <label class="mb-2 block text-sm text-gray-600 :text-gray-200">Email address</label>
                    <input type="email" name="Email" placeholder="johndoe@example.com" class="mt-2 block w-full rounded-md border border-gray-200 bg-white px-5 py-3 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 :border-gray-600 :bg-gray-900 :text-gray-300 :focus:border-blue-300" />
                    </div>

                    <div class="mt-6 w-full">
                    <label class="mb-2 block text-sm text-gray-600 :text-gray-200">Message</label>
                    <textarea name="Message" class="mt-2 block h-32 w-full rounded-md border border-gray-200 bg-white px-5 py-3 text-gray-700 placeholder-gray-400 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 :border-gray-600 :bg-gray-900 :text-gray-300 :focus:border-blue-300 md:h-48" placeholder="Message"></textarea>
                    </div>

                    <button id="submit" class="mt-6 mb-6 w-full transform rounded-md bg-blue-600 px-6 py-3 text-sm font-medium capitalize tracking-wide text-white transition-colors duration-300 hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-400 focus:ring-opacity-50">get in touch</button>
                </form>
                <div id="msg" class="h-1 text-center text-green-500"></div>
            </div>
        </div>
        </div>
    </div>
    </section>

    <footer class="bg-white :bg-gray-900">
    <div class="container mx-auto px-6 py-12">
        <div class="md:-mx-3 md:flex md:items-center md:justify-between">
        <h1 class="text-3xl font-semibold tracking-tight text-gray-800 :text-white md:mx-3 xl:text-4xl">Subscribe our newsletter to get update.</h1>

        <div class="mt-6 shrink-0 md:mx-3 md:mt-0 md:w-auto">
            <a href="template/register.php" class="inline-flex w-full items-center justify-center rounded-lg bg-gray-800 px-4 py-2 text-sm text-white duration-300 hover:bg-gray-700 focus:ring focus:ring-gray-300 focus:ring-opacity-80">
            <span class="mx-2">Sign Up Now</span>

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mx-2 h-6 w-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
            </svg>
            </a>
        </div>
        </div>

        <hr class="my-6 border-gray-200 :border-gray-700 md:my-10" />

        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
        <div>
            <p class="font-semibold text-gray-800 :text-white">Quick Link</p>

            <div class="mt-5 flex flex-col items-start space-y-2">
            <a href="#" class="text-gray-600 transition-colors duration-300 hover:text-blue-500 hover:underline :text-gray-300 :hover:text-blue-400">Home</a>
            <a href="#" class="text-gray-600 transition-colors duration-300 hover:text-blue-500 hover:underline :text-gray-300 :hover:text-blue-400">Who We Are</a>
            <a href="#" class="text-gray-600 transition-colors duration-300 hover:text-blue-500 hover:underline :text-gray-300 :hover:text-blue-400">Our Philosophy</a>
            </div>
        </div>

        <div>
            <p class="font-semibold text-gray-800 :text-white">Industries</p>

            <div class="mt-5 flex flex-col items-start space-y-2">
            <a href="#" class="text-gray-600 transition-colors duration-300 hover:text-blue-500 hover:underline :text-gray-300 :hover:text-blue-400">Retail & E-Commerce</a>
            <a href="#" class="text-gray-600 transition-colors duration-300 hover:text-blue-500 hover:underline :text-gray-300 :hover:text-blue-400">Information Technology</a>
            <a href="#" class="text-gray-600 transition-colors duration-300 hover:text-blue-500 hover:underline :text-gray-300 :hover:text-blue-400">Finance & Insurance</a>
            </div>
        </div>

        <div>
            <p class="font-semibold text-gray-800 :text-white">Services</p>

            <div class="mt-5 flex flex-col items-start space-y-2">
            <a href="#" class="text-gray-600 transition-colors duration-300 hover:text-blue-500 hover:underline :text-gray-300 :hover:text-blue-400">Translation</a>
            <a href="#" class="text-gray-600 transition-colors duration-300 hover:text-blue-500 hover:underline :text-gray-300 :hover:text-blue-400">Proofreading & Editing</a>
            <a href="#" class="text-gray-600 transition-colors duration-300 hover:text-blue-500 hover:underline :text-gray-300 :hover:text-blue-400">Content Creation</a>
            </div>
        </div>

        <div>
            <p class="font-semibold text-gray-800 :text-white">Contact Us</p>

            <div class="mt-5 flex flex-col items-start space-y-2">
            <a href="#" class="text-gray-600 transition-colors duration-300 hover:text-blue-500 hover:underline :text-gray-300 :hover:text-blue-400">+880 768 473 4978</a>
            <a href="#" class="text-gray-600 transition-colors duration-300 hover:text-blue-500 hover:underline :text-gray-300 :hover:text-blue-400">info@merakiui.com</a>
            </div>
        </div>
        </div>

        <hr class="my-6 border-gray-200 :border-gray-700 md:my-10" />

        <div class="flex flex-col items-center justify-between sm:flex-row">
        <a href="#" class="text-2xl font-bold text-gray-800 transition-colors duration-300 hover:text-gray-700 :text-white :hover:text-gray-300">
            <img src="assets/images/jis_login.png" alt="" width="80px">
        </a>

        <p class="mt-4 text-sm text-gray-500 :text-gray-300 sm:mt-0">© Copyright 2025. All Rights Reserved.</p>
        </div>
    </div>
    </footer>


<script src="//unpkg.com/alpinejs" defer></script>
<script>
    const scriptURL = 'https://script.google.com/macros/s/AKfycbyS5y5sobra-uU0ImhmOWrHD4GTqjKHjvaclzFdH_fPeZlZQhnyqSvAhEvU4-F2q35aHw/exec'
    const form = document.forms['submit-to-google-sheet']
    const msg = document.getElementById("msg");
    const submit = document.getElementById("submit")

    form.addEventListener('submit', e => {
        e.preventDefault()
        submit.disabled = true;
        fetch(scriptURL, { method: 'POST', body: new FormData(form)})
        .then(response => {
            msg.innerHTML = "Message sent successfully!"
            setTimeout(function(){
                msg.innerHTML = ""
                submit.disabled = false;
            })
            form.reset()
        },2000)
        .catch(error => console.error('Error!', error.message))
    })
  </script>
</body>
</html>

