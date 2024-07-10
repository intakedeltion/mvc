<?php//this is layout of alle pages?>
<DOCTYPE html>
<html>
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/stylesheet.css">
  </head>
  <body class="font-sans bg-gray-100">
  <nav class="bg-black py-4">
        <div class="justify-between flex items-center">
          <div class="mx-5 ">
            <img src="img/bloglogo.png" alt="Apple Logo" class="w-25 h-16 rounded-lg shadow-md">
          </div>
          <div class="space-x-4 mr-5 header">
                <a href="?controller=pages&action=home" class="text-white font-bold text-xl hover:text-blue-300 hover:underline">Home</a>
                <a href="?controller=posts&action=index" class="text-white font-bold text-xl hover:text-blue-300 hover:underline">Posts</a>
                <?php if(isset($_SESSION["user_id"])){ ?>
                  <a href="?controller=posts&action=createpage" class="text-white font-bold text-xl hover:text-blue-300 hover:underline">New Post</a>
                <?php }?>
                <a href="?controller=users&action=login" ><i class="fa-solid fa-user ml-10 mr-2" style="color: #74C0FC; font-size: 35px;" onmouseover="this.style.color='#197dca'" onmouseout="this.style.color='#74C0FC'"></i></a>
            </div>
        </div>
  </nav>

    <?php require_once('routes.php'); ?>

    <footer class="bg-black py-4 border-4 border-black">
      <a class="text-white font-bold text-xl p-4">@Copyright</a>
    </footer>
  </body>
<html>