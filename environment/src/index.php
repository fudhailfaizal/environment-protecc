<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Custom styles */
        html,
        body {
            height: 100%;
        }

        .container {
            margin-left: auto;
            margin-right: auto;
            max-width: 1200px;
            /* Adjust as needed */
            padding-left: 20px;
            padding-right: 20px;
        }

        footer {
            margin-top: auto;
            background-color: #f9f9f9;
            padding: 20px 0;
            text-align: center;
        }

        .custom-btn {
            background-color: white;
            border: 2px solid #10B981;
            color: #10B981;
            transition: background-color 0.3s, color 0.3s;
        }

        .custom-btn:hover {
            background-color: #10B981;
            color: white;
        }
    </style>
</head>

<body class="flex flex-col min-h-screen">
    <nav class="bg-white px-4 py-2 flex justify-between items-center">
        <div class="flex items-center space-x-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="text-green-700 h-6 w-6">
                <path
                    d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"></path>
                <line x1="4" x2="4" y1="22" y2="15"></line>
            </svg>
            <a class="text-gray-700 hover:text-gray-900" href="#">About Us</a>
            <a class="text-gray-700 hover:text-gray-900" href="#">Meet The Team</a>
            <a class="text-gray-700 hover:text-gray-900" href="#">Our Projects</a>
            <a class="text-gray-700 hover:text-gray-900" href="#">Contact Us</a>
        </div>

        <div class="flex items-center space-x-2">
            <a href="sign-in.php">
                <button
                    class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-10 px-4 py-2 bg-green-700 hover:bg-green-600 text-white">Login</button>
            </a>
            <a href="sign-up.php">
                <button
                    class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-white border border-green-700 hover:bg-green-700 hover:text-white h-10 px-4 py-2">Sign
                    Up</button>
            </a>
        </div>

    </nav>
    

    <div class="container mx-auto px-4 md:px-6 mt-8 flex flex-col justify-center items-center h-full">
        <h1 class="text-center text-4xl font-bold tracking-tighter sm:text-5xl md:text-6xl lg:text-7xl/none mb-6 text-green-700">
            Lodge a Complaint
        </h1>
        <p class="max-w-[600px] text-center text-gray-500 md:text-xl/relaxed lg:text-base/relaxed xl:text-xl/relaxed mx-auto dark:text-gray-400 mb-10">
            Report environmental issues in your area. Your voice can help protect our planet.
        </p>
        <div class="flex space-x-4">
            <a href="sign-in.php" class="custom-btn py-2 px-4 rounded-lg">Login to view complaints</a>
            <a href="sign-up.php" class="custom-btn py-2 px-4 rounded-lg">Sign up to create complaints</a>
        </div>
    </div>
    

    <footer class="border-t mt-auto">
        <div class="container flex flex-col md:flex-row items-center justify-between py-4 space-y-4 md:space-y-0">
            <nav class="flex flex-col md:flex-row gap-4 md:gap-8">
                <a class="font-medium" href="#">
                    About Us
                </a>
                <a class="font-medium" href="#">
                    Meet The Team
                </a>
                <a class="font-medium" href="#">
                    Our Projects
                </a>
                <a class="font-medium" href="#">
                    Contact Us
                </a>
            </nav>
            <nav class="flex flex-col md:flex-row gap-4 md:gap-8">
                <a class="font-medium" href="#">
                    Terms
                </a>
                <a class="font-medium" href="#">
                    Privacy
                </a>
                <a class="font-medium" href="#">
                    Contact
                </a>
            </nav>
            <p class="text-sm text-gray-500 dark:text-gray-400 sm:order-first">
                Copyright © 2023 Enviro Inc. All rights reserved.
            </p>
        </div>
    </footer>
</body>

</html>
