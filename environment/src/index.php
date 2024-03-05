<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Save Our Environment</title>
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

        /* Overlay styles */
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            backdrop-filter: blur(8px); /* Apply blur effect */
            -webkit-backdrop-filter: blur(8px); /* For Safari */
        }

        .overlay-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(255, 255, 255, 1.0); /* Semi-transparent white */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
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
            <a href="#" onclick="showOverlay('signInOverlay')" class="text-green-700">Login</a>
            <a href="#" onclick="showOverlay('signUpOverlay')" class="text-green-700">Sign Up</a>
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
            <a href="#" onclick="showOverlay('signInOverlay')" class="custom-btn py-2 px-4 rounded-lg">Login to view complaints</a>
            <a href="#" onclick="showOverlay('signUpOverlay')" class="custom-btn py-2 px-4 rounded-lg">Sign up to create complaints</a>
        </div>
    </div>

    <!-- Sign In Overlay -->
    <div id="signInOverlay" class="overlay">
        <div class="overlay-content">
            <button class="absolute top-4 right-4 text-gray-700 hover:text-gray-900" onclick="hideOverlay('signInOverlay')">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
            <h1 class="text-center text-2xl font-bold text-gray-800 mb-4">Sign In</h1>
            <form class="space-y-6" action="signin.php" method="post">
                <div>
                    <label for="signInName" class="sr-only">Name</label>
                    <input name="name" class="flex h-10 rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 w-full" id="signInName" placeholder="Name" type="text" fdprocessedid="drtkc">
                </div>
                <div>
                    <label for="signInPassword" class="sr-only">Password</label>
                    <input name="password" class="flex h-10 rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 w-full" id="signInPassword" placeholder="Password" type="password" fdprocessedid="6n6gq">
                </div>
                <div>
                    <button type="submit" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-primary/90 h-10 px-4 py-2 w-full bg-white text-green-600" fdprocessedid="r7gs1e">SignIn</button>
                </div>
            </form>
            <p class="text-center text-sm text-gray-800">Don't have an account yet? <a class="text-green-600 underline" href="#" onclick="showOverlay('signUpOverlay'); hideOverlay('signInOverlay')">Sign up</a></p>
        </div>
    </div>

    <!-- Sign Up Overlay -->
    <div id="signUpOverlay" class="overlay">
        <div class="overlay-content">
            <button class="absolute top-4 right-4 text-gray-700 hover:text-gray-900" onclick="hideOverlay('signUpOverlay')">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
            <h1 class="text-center text-2xl font-bold text-gray-800 mb-4">Sign Up</h1>
            <form class="space-y-6" action="signup.php" method="post">
                <div>
                    <label for="signUpName" class="sr-only">Name</label>
                    <input name="name" class="flex h-10 rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 w-full" id="signUpName" placeholder="Name" type="text" fdprocessedid="drtkc">
                </div>
                <div>
                    <label for="signUpEmail" class="sr-only">Email</label>
                    <input name="email" class="flex h-10 rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 w-full" id="signUpEmail" placeholder="Email" type="email" fdprocessedid="57hie">
                </div>
                <div>
                    <label for="signUpCity" class="sr-only">City</label>
                    <input name="city" class="flex h-10 rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 w-full" id="signUpCity" placeholder="City" type="text" fdprocessedid="j9hbye">
                </div>
                <div>
                    <label for="signUpPassword" class="sr-only">Password</label>
                    <input name="password" class="flex h-10 rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 w-full" id="signUpPassword" placeholder="Password" type="password" fdprocessedid="6n6gq">
                </div>
                <div>
                    <label for="signUpConfirmPassword" class="sr-only">Confirm Password</label>
                    <input name="confirmPassword" class="flex h-10 rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 w-full" id="signUpConfirmPassword" placeholder="Confirm Password" type="password" fdprocessedid="whns63">
                </div>
                <div>
                    <button type="submit" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-primary/90 h-10 px-4 py-2 w-full bg-white text-green-600" fdprocessedid="r7gs1e">SignUp</button>
                </div>
            </form>
            <p class="text-center text-sm text-gray-800">Already have an account? <a class="text-green-600 underline" href="#" onclick="showOverlay('signInOverlay'); hideOverlay('signUpOverlay')">Sign in</a></p>
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
            <p class="text-sm text-gray-500 dark:text-gray-400">&copy; 2024 Save Our Environment. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // JavaScript functions to show/hide overlay
        function showOverlay(overlayId) {
            document.getElementById(overlayId).style.display = "block";
            document.body.style.overflow = "hidden"; // Prevent scrolling when overlay is open
        }

        function hideOverlay(overlayId) {
            document.getElementById(overlayId).style.display = "none";
            document.body.style.overflow = ""; // Restore scrolling
        }
    </script>
</body>

</html>
