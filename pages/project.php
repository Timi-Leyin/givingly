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
          <a href="pages/signup.php"><button class="bg-black text-white p-2 rounded-md ">
              Create project
            </button></a>
        </div>
      </ul>
    </div>
  </header>
  <main class="w-full relative mt-16 p-14">
    <div class="flex">
        <div class="w-[50%]"><img src="../assets/images/egg.png" class="w-full bg-gray-200 rounded-lg p-3" alt="An egg getting fryed"></div>
        <div class="w-[50%] p-5">
          <h1 class="text-3xl font-bold">Help us release a cookbook for parents and kids</h1>
          <div class="mt-3">
            by shindara@gmail.co
          </div>
          <div class="flex mt-5">
            <div class="w-[50%] border-y-2 border-r-2 p-3">
              <h3 class="text-xl font-bold">About project</h3>
              <p class="mt-3 text-md">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga accusamus quaerat reprehenderit architecto nulla esse ab cumque blanditiis beatae laborum, nostrum vero eius maxime. Labore voluptatem repudiandae magnam tenetur reiciendis?</p>
            </div>
            <div class="w-[50%] border-y-2 border-l-2 p-3">
              <div class="flex justify-between">
                <div class="p-3">
                  <h6 class="font-black">Raised:</h6>
                  <p class="text-xl">$2,500</p>
                </div>
                <div class="bg-[#D4EE26] p-3 rounded-lg">
                  <h6 class="font-black">Goal:</h6>
                  <p class="text-xl">$3,500</p>
              </div>
              </div>
              <div class="mt-5 w-full bg-gray-200 h-[15px] rounded-xl">
                <div class="w-[70%] bg-[#D4EE26] h-full rounded-xl"></div>
              </div>
              <div class="mt-5">
                18 days left
              </div>
            </div>
          </div>
          <button class="mt-3 bg-black p-3 text-white font-bold rounded-md">Fund this project</button>
        </div>
    </div>
  </main>
</body>

</html>