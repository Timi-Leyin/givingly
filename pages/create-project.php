<?php
require_once ('../includes/auth_guard.php');
check_login();
require_once ('../includes/create-project.php');
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
  <?php if (isset($success)): ?>
    <div class="bg-green-500 text-white p-4 rounded mb-4">
        <?= htmlspecialchars($success) ?>
    </div>
<?php endif; ?>

<?php if (isset($error)): ?>
    <div class="bg-red-500 text-white p-4 rounded mb-4">
        <?= htmlspecialchars($error) ?>
    </div>
<?php endif; ?>

  <main class="w-full flex flex-col items-center justify-center mt-16 p-14">
    <h1 class="text-3xl font-bold">Kick-off your project</h1>
    <form class="w-full"  method="POST" enctype="multipart/form-data">
      <div class="flex flex-col mt-5 gap-2">
        <label for="name">Name of project:</label>
        <input type="text" name="name" id="name" class="outline-0 border-2 rounded-lg border-black w-[30%] p-3" placeholder="Build a cat shelter with us"/>
      </div>
      <div class="flex flex-col mt-5 gap-2">
        <label for="goal">Add your goal:</label>
        <input type="nubmer" name="goal" id="goal" class="outline-0 border-2 rounded-lg border-black w-[30%] p-3" placeholder="20000"/>
      </div>
      <div class="flex flex-col mt-5 gap-2">
        <label for="about">About your project</label>
        <textarea name="about" id="about" class="outline-0 border-2 rounded-lg border-black w-[30%] p-3 resize-none h-32" placeholder="Build a cat shelter with us"></textarea>
      </div>
      <div class="flex flex-col mt-5 gap-2">
        <label for="date">Add your timeline</label>
        <input type="date" name="date" id="date" class="outline-0 border-2 rounded-lg border-black p-3 w-[30%]"/>
      </div>
      <div class="flex flex-col mt-5 gap-2">
        <label for="banner">Add project banner</label>
        <input type="file" name="banner" id="banner" class="outline-0 border-2 rounded-lg border-black p-3 w-[30%]"/>
      </div>
      </div>
      <button class="bg-black text-white p-2 rounded-md mt-3 w-[30%]">Submit</button>
      </form>
  </main>
  </body>
</html>