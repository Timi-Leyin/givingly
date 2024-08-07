<?php
session_start();
require_once('../includes/db_connect.php');

$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $email = $_POST['email'];
  $password = $_POST['password'];

  
  $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->store_result();

  if ($stmt->num_rows > 0) {
    $stmt->bind_result($id, $hashed_password);
    $stmt->fetch();

    if (password_verify($password, $hashed_password)) {
      // Set session variables
      $_SESSION['email'] = $email;
      $_SESSION['loggedin'] = true;

      header("Location: home.php");
      exit();
    } else {
      $error_message = "Incorrect password";
    }
  } else {
    $error_message = "No user found with that email";
  }

  $stmt->close();
  $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Givingly | Login</title>
  <!-- TAILWINDCSS CONFIG START -->
  <script src="https://cdn.tailwindcss.com"></script>
  <style type="text/tailwindcss">
    @layer utilities {
            .content-auto {
                content-visibility: auto;
            }
        }
        </style>
  <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
  <script src="./tailwind.config.js"></script>
  <!-- TAILWINDCSS CONFIG END -->

  <!-- POPPINS FONT CONFIG START -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
    rel="stylesheet">
  <!-- POPPINS FONT CONFIG STOP -->

  <!-- CSS IMPORT -->
  <link rel="stylesheet" href="../styles/index.css">

</head>

<body class="bg-[#D4EE26] h-screen w-full overflow-hidden">
  <header class="bg-[#D4EE26] p-6 flex flex-row gap-5 items-center justify-between">
    <div class="text-2xl font-semibold">Givingly</div>
    <div>
    <div class="hidden lg:block">
      <ul class="flex items-center gap-8 font-medium">
        <li><a href="../pages/login.php">Login</a></li>
        <div className="">
          <a href="../pages/signup.php"><button class="bg-black text-white p-2 rounded-md ">
              Sign Up
            </button></a>
        </div>
      </ul>
    </div>
  </header>
  <main class="w-full overflow-hidden h-[89.1%] flex items-center justify-center">
    <div class="w-1/3 bg-white h-5/6 rounded-lg p-5 flex flex-col items-center">
      <div class="text-2xl font-semibold">Givingly</div>
      <form action="login.php" method="POST" class="mt-5 w-full flex flex-col items-center">
        <?php if (!empty($error_message)): ?>
          <div class="bg-red-100 text-red-700 p-3 rounded-md mb-4 w-5/6">
            <?php echo $error_message; ?>
          </div>
        <?php endif; ?>
        <div class="flex flex-col w-5/6">
          <label for="email">Email:</label>
          <input type="email" name="email" placeholder="Enter email" class="p-3 rounded-md" required>
        </div>
        <div class="flex flex-col mt-5 w-5/6">
          <label for="password">Password:</label>
          <input type="password" name="password" placeholder="Enter password" class="p-3 rounded-md" required>
        </div>
        <button class="bg-black text-white p-3 w-5/6 rounded-md text-2xl mt-5" type="submit">Login</button>
      </form>
    </div>
  </main>
</body>

</html>
