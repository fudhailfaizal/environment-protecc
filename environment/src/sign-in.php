<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Sign In!</title>
</head>
<body>
<div class="flex min-h-screen items-center justify-center bg-green-100">
  <div class="w-full max-w-md p-8 space-y-3 rounded-xl bg-green-600 shadow-lg">
    <h1 class="text-center text-2xl font-bold text-white">SIGN IN</h1>
    <form class="space-y-6" action="signin.php" method="post"> <!-- Update action to point to signin.php and use POST method -->
      <div>
        <label for="name" class="sr-only">Name</label>
        <input name="name" class="flex h-10 rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 w-full" id="name" placeholder="Name" type="text" fdprocessedid="drtkc">
      </div>
      <div>
        <label for="password" class="sr-only">Password</label>
        <input name="password" class="flex h-10 rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 w-full" id="password" placeholder="Password" type="password" fdprocessedid="6n6gq">
      </div>
      <div>
        <button type="submit" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-primary/90 h-10 px-4 py-2 w-full bg-white text-green-600" fdprocessedid="r7gs1e">SignIn</button> <!-- Change button type to submit -->
      </div>
    </form>
    <p class="text-center text-sm text-white">Don't have an account yet? <a class="text-green-200 underline" href="sign-up.php">Sign up</a></p>
  </div>
</div>
</body>
</html>
