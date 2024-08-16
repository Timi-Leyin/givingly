<?php
require_once ('../includes/auth_guard.php');
check_login();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Givingly</title>
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
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
  <!-- POPPINS FONT CONFIG STOP -->

  <!-- CSS IMPORT -->
  <link rel="stylesheet" href="../styles/index.css">

</head>

<body class="w-full overflow-auto">
  <header class="bg-[#D4EE26] p-6 flex flex-row gap-5 items-center justify-between fixed top-0 w-full z-10">
    <div class="text-2xl font-semibold">Givingly</div>

    <div>
      <input type="text" placeholder="Search for projects" name="search" id="search"
        class="text-xl rounded-md p-2 px-3 outline-none w-[600px]" />
    </div>
    <div class="hidden lg:block">
      <ul class="flex items-center gap-8 font-medium text-xl">
        <li><a href="./home.php">Home</a></li>
        <li>My Projects</li>
        <li><a href="logout.php">Logout</a></li>
        <div className="">
          <a href="./create-project.php"><button class="bg-black text-white p-2 rounded-md ">
              Create project
            </button></a>
        </div>
      </ul>
    </div>
  </header>
  <main class="w-full relative mt-16 p-14">
  <h1 class="text-3xl font-semibold">Welcome, <?php echo htmlspecialchars($_SESSION['email']); ?>!</h1>
    <h1 class="text-4xl font-semibold">Projects</h1>
    <div class="mt-8 flex flex-wrap justify-around">
      <a href="./project.php">
      <div class="w-[400px] cursor-pointer m-10">
        <img src="../assets/images/egg.png" class="w-full bg-gray-200 rounded-lg p-3" alt="An egg getting fryed">
        <p class="mt-1 text-center text-2xl p-3">Build a cat shelter with us</p>
        <div class="w-full bg-gray-200 h-[15px] rounded-xl">
          <div class="w-[20%] bg-[#D4EE26] h-full rounded-xl"></div>
        </div>
        <div class="flex justify-between p-1 mt-2">
          <div>
            <p class="text-xl font-bold">Raised:</p>
            <p class="text-2xl font-semibold">$2500</p>
          </div>
          <div>
            <p class="text-xl font-bold">Goal:</p>
            <p class="text-2xl font-semibold">$11500</p>
          </div>
        </div>
      </div>
      </a>
      <div class="w-[400px] cursor-pointer m-10">
        <img src="../assets/images/egg.png" class="w-full bg-gray-200 rounded-lg p-3" alt="An egg getting fryed">
        <p class="mt-1 text-center text-2xl p-3">Build a cat shelter with us</p>
        <div class="w-full bg-gray-200 h-[15px] rounded-xl">
          <div class="w-[20%] bg-[#D4EE26] h-full rounded-xl"></div>
        </div>
        <div class="flex justify-between p-1 mt-2">
          <div>
            <p class="text-xl font-bold">Raised:</p>
            <p class="text-2xl font-semibold">$2500</p>
          </div>
          <div>
            <p class="text-xl font-bold">Goal:</p>
            <p class="text-2xl font-semibold">$11500</p>
          </div>
        </div>
      </div>
      <div class="w-[400px] cursor-pointer m-10">
        <img src="../assets/images/egg.png" class="w-full bg-gray-200 rounded-lg p-3" alt="An egg getting fryed">
        <p class="mt-1 text-center text-2xl p-3">Build a cat shelter with us</p>
        <div class="w-full bg-gray-200 h-[15px] rounded-xl">
          <div class="w-[20%] bg-[#D4EE26] h-full rounded-xl"></div>
        </div>
        <div class="flex justify-between p-1 mt-2">
          <div>
            <p class="text-xl font-bold">Raised:</p>
            <p class="text-2xl font-semibold">$2500</p>
          </div>
          <div>
            <p class="text-xl font-bold">Goal:</p>
            <p class="text-2xl font-semibold">$11500</p>
          </div>
        </div>
      </div>
      <div class="w-[400px] cursor-pointer m-10">
        <img src="../assets/images/egg.png" class="w-full bg-gray-200 rounded-lg p-3" alt="An egg getting fryed">
        <p class="mt-1 text-center text-2xl p-3">Build a cat shelter with us</p>
        <div class="w-full bg-gray-200 h-[15px] rounded-xl">
          <div class="w-[20%] bg-[#D4EE26] h-full rounded-xl"></div>
        </div>
        <div class="flex justify-between p-1 mt-2">
          <div>
            <p class="text-xl font-bold">Raised:</p>
            <p class="text-2xl font-semibold">$2500</p>
          </div>
          <div>
            <p class="text-xl font-bold">Goal:</p>
            <p class="text-2xl font-semibold">$11500</p>
          </div>
        </div>
      </div>
      <div class="w-[400px] cursor-pointer m-10">
        <img src="../assets/images/egg.png" class="w-full bg-gray-200 rounded-lg p-3" alt="An egg getting fryed">
        <p class="mt-1 text-center text-2xl p-3">Build a cat shelter with us</p>
        <div class="w-full bg-gray-200 h-[15px] rounded-xl">
          <div class="w-[20%] bg-[#D4EE26] h-full rounded-xl"></div>
        </div>
        <div class="flex justify-between p-1 mt-2">
          <div>
            <p class="text-xl font-bold">Raised:</p>
            <p class="text-2xl font-semibold">$2500</p>
          </div>
          <div>
            <p class="text-xl font-bold">Goal:</p>
            <p class="text-2xl font-semibold">$11500</p>
          </div>
        </div>
      </div>
      <div class="w-[400px] cursor-pointer m-10">
        <img src="../assets/images/egg.png" class="w-full bg-gray-200 rounded-lg p-3" alt="An egg getting fryed">
        <p class="mt-1 text-center text-2xl p-3">Build a cat shelter with us</p>
        <div class="w-full bg-gray-200 h-[15px] rounded-xl">
          <div class="w-[20%] bg-[#D4EE26] h-full rounded-xl"></div>
        </div>
        <div class="flex justify-between p-1 mt-2">
          <div>
            <p class="text-xl font-bold">Raised:</p>
            <p class="text-2xl font-semibold">$2500</p>
          </div>
          <div>
            <p class="text-xl font-bold">Goal:</p>
            <p class="text-2xl font-semibold">$11500</p>
          </div>
        </div>
      </div>
    </div>
  </main>
</body>

</html>