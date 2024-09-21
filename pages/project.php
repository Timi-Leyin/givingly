<?php
require_once('../includes/auth_guard.php');
require_once('../includes/db_connect.php');
check_login();

if (isset($_GET['id'])) {
  $project_id = $_GET['id'];

  // Prepare and execute the query to get project details
  $q = "SELECT * FROM projects WHERE id = ?";
  $stmt = $conn->prepare($q);
  $stmt->bind_param("i", $project_id);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $project = $result->fetch_assoc();
  } else {
    // header("Location: ./404.php");
    echo "<h2>Project not found.</h2>";
    exit;
  }

  $stmt->close();
} else {
  echo "No project ID provided.";
  exit;
}
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

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
    <div class="flex">
      <div class="w-[50%]">
        <img src="<?php echo htmlspecialchars($project['banner']); ?>" class="w-full bg-gray-200 rounded-lg p-3"
          alt="Project Image">
      </div>
      <div class="w-[50%] p-5">
        <h1 class="text-3xl font-bold"><?php echo htmlspecialchars($project['name']); ?></h1>
        <div class="mt-3">
          by <?php echo htmlspecialchars($project['user_email']); ?>
        </div>
        <div class="flex mt-5">
          <div class="w-[50%] border-y-2 border-r-2 p-3">
            <h3 class="text-xl font-bold">About project</h3>
            <p class="mt-3 text-md"><?php echo nl2br(htmlspecialchars($project['about'])); ?></p>
          </div>
          <div class="w-[50%] border-y-2 border-l-2 p-3">
            <div class="flex justify-between">
              <div class="p-3">
                <h6 class="font-black">Raised:</h6>
                <p class="text-xl">₦<?php echo number_format($project['raised'], 2); ?></p>
              </div>
              <div class="bg-[#D4EE26] p-3 rounded-lg">
                <h6 class="font-black">Goal:</h6>
                <p class="text-xl">₦<?php echo number_format($project['goal'], 2); ?></p>
              </div>
            </div>
            <div class="mt-5 w-full bg-gray-200 h-[15px] rounded-xl">
              <div
                class="w-[<?php echo ($project['raised'] / $project['goal']) * 100; ?>%] bg-[#D4EE26] h-full rounded-xl">
              </div>
            </div>
            <div class="mt-5">
              <i class="fa-solid fa-calendar-days"></i> <?php echo htmlspecialchars($project['timeline']); ?> days left
            </div>
          </div>
        </div>


        <?php if ((int)$project["raised"] < (int)$project["goal"]): ?>
          <div class="">
            <div class="mt-5">
              <label for="amount" class="block text-lg font-medium">Enter amount to fund:</label>
              <input type="number" id="amount" name="amount" placeholder="Amount in NGN" min="100"
                class="w-full p-2 border rounded-md" required />
            </div>
            <button id="fundProjectEl" class="mt-3 bg-black p-3 text-white font-bold rounded-md disabled:opacity-50">Fund
              this project
            </button>
          </div>
        <?php endif; ?>

      </div>
    </div>
  </main>

  <script src="https://js.paystack.co/v1/inline.js"></script>
  <script type="text/javascript">

    const funBtn = document.querySelector("#fundProjectEl");
    const fundAmount = document.querySelector("#amount");
    funBtn.setAttribute("disabled", "true")
    fundAmount.addEventListener("change", function () {
      const val = Number(fundAmount.value);
      const total = <?php echo $project['goal']; ?> - <?php echo $project['raised']; ?>;

      console.log(total, val);

      if (val > total) {
        fundAmount.value = total;
        funBtn.setAttribute("disabled", "true");
        console.log("GT than total: ")
        alert("You have reached the project's goal. You cannot fund it anymore.");
        return;
      } else if (val <= 10) {
        console.log("LT 10: ")
        alert("You have cannot fund with less than 10.");
        funBtn.setAttribute("disabled", "true");

      } else {
        console.log("PASSED: ")
        funBtn.removeAttribute("disabled")
        // funBtn.setAttribute("disabled", "false");
      }

    });
    funBtn.addEventListener("click", payWithPaystack);
    function payWithPaystack() {
      let handler = PaystackPop.setup({
        key: 'pk_test_1d4731b23dc9c764d083f434c5c102339228b7f1',
        email: '<?php echo htmlspecialchars($project['user_email']); ?>',
        amount: Number(fundAmount.value) * 100,
        currency: "NGN",
        ref: 'PSK_' + Math.floor((Math.random() * 1000000000) + 1),
        metadata: {
          custom_fields: [
            {
              display_name: "Project Name",
              variable_name: "project_name",
              value: "<?php echo htmlspecialchars($project['name']); ?>"
            }
          ]
        },
        callback: function (response) {

          let reference = response.reference;
          window.location.href = "./verify-payment.php?reference=" + reference + "&id=<?php echo $project_id; ?>";
        },
        onClose: function () {
          alert('Payment window closed');
        }
      });
      handler.openIframe();
    }
  </script>

</body>

</html>