<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Sign Up!</title>
</head>
<body>
<div class="flex min-h-screen items-center justify-center bg-green-100">
  <div class="w-full max-w-md p-8 space-y-3 rounded-xl bg-green-600 shadow-lg">
    <h1 class="text-center text-2xl font-bold text-white">SIGN UP</h1>
    <form class="space-y-6">
      <div>
        <label for="name" class="sr-only">Name</label>
        <input class="flex h-10 rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 w-full" id="name" placeholder="Name" type="text" fdprocessedid="drtkc">
      </div>
      <div>
        <label for="email" class="sr-only">Email</label>
        <input class="flex h-10 rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 w-full" id="email" placeholder="Email" type="email" fdprocessedid="57hie">
      </div>
      <div>
        <label for="city" class="sr-only">City</label>
        <input class="flex h-10 rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 w-full" id="city" placeholder="City" type="text" fdprocessedid="j9hbye">
      </div>
      <div>
        <label for="userType" class="sr-only">User Type</label>
        <button type="button" role="combobox" aria-controls="radix-:rd:" aria-expanded="false" aria-autocomplete="none" dir="ltr" data-state="closed" data-placeholder="" class="flex h-10 w-full items-center justify-between rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" id="userType" fdprocessedid="tenrr8">
          <span style="pointer-events: none;">User Type</span>
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 opacity-50" aria-hidden="true">
            <path d="m6 9 6 6 6-6"></path>
          </svg>
        </button>
        <select aria-hidden="true" tabindex="-1" style="position: absolute; border: 0px; width: 1px; height: 1px; padding: 0px; margin: -1px; overflow: hidden; clip: rect(0px, 0px, 0px, 0px); white-space: nowrap; overflow-wrap: normal;">
          <option value=""></option>
          <option value="individual">Individual</option>
          <option value="organization">Organization</option>
          <option value="government">Government</option>
        </select>
      </div>
      <div>
        <label for="password" class="sr-only">Password</label>
        <input class="flex h-10 rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 w-full" id="password" placeholder="Password" type="password" fdprocessedid="6n6gq">
      </div>
      <div>
        <label for="confirmPassword" class="sr-only">Confirm Password</label>
        <input class="flex h-10 rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 w-full" id="confirmPassword" placeholder="Confirm Password" type="password" fdprocessedid="whns63">
      </div>
      <div>
        <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-primary/90 h-10 px-4 py-2 w-full bg-white text-green-600" fdprocessedid="r7gs1e">SignUp</button>
      </div>
    </form>
    <p class="text-center text-sm text-white">Already Have an Account? <a class="text-green-200 underline" href="#">Sign in</a></p>
  </div>
</div>

</body>
</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Add User!</title>
</head>
<body>
<div class="flex min-h-screen items-center justify-center bg-green-100">
  <div class="w-full max-w-md p-8 space-y-3 rounded-xl bg-green-600 shadow-lg">
    <h1 class="text-center text-2xl font-bold text-white">Add User</h1>
    <form class="space-y-6" action="add_user.php" method="POST"> <!-- Update action to point to signup.php and use POST method -->
      <div>
        <label for="name" class="sr-only">Name</label>
        <input name="name" class="flex h-10 rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 w-full" id="name" placeholder="Name" type="text" fdprocessedid="drtkc">
      </div>
      <div>
        <label for="email" class="sr-only">Email</label>
        <input name="email" class="flex h-10 rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 w-full" id="email" placeholder="Email" type="email" fdprocessedid="57hie">
      </div>
      <div>
        <label for="city" class="sr-only">City</label>
        <input name="city" class="flex h-10 rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 w-full" id="city" placeholder="City" type="text" fdprocessedid="j9hbye">
      </div>
      <div>
        <label for="password" class="sr-only">Password</label>
        <input name="password" class="flex h-10 rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 w-full" id="password" placeholder="Password" type="password" fdprocessedid="6n6gq">
      </div>
      <div>
        <button type="submit" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-primary/90 h-10 px-4 py-2 w-full bg-white text-green-600" fdprocessedid="r7gs1e">ADD</button> <!-- Change button type to submit -->
      </div>
    </form>
  </div>
</div>

</body>
</html>
