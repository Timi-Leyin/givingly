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
    <script
        src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <script src="./tailwind.config.js"></script>
    <!-- TAILWINDCSS CONFIG END -->
</head>

<body>
    <h1 class="text-3xl font-bold underline text-clifford">
        <?php
        echo phpversion();
        ?>
    </h1>
</body>

</html>