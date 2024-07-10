<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
</head>
<body>
    <br>
    <div class="container mx-auto">
        <p class="font-bold text-3xl text-center">all posts:</p>
    </div>

    <table class="min-w-full bg-white border border-gray-300 my-10">
        <tr>
            <th class="py-2 px-4 font-bold border border-black ">Author</th>
            <th class="py-2 px-4 font-bold border border-black">Content</th>
            <th class="py-2 px-4 font-bold border border-black">Edit</th>
            <th class="py-2 px-4 font-bold border border-black">Delete</th>
        </tr>
        <?php foreach($posts as $post){ ?>
        <tr>
            <td class=" text-center py-2 px-4 border-b border" ><?php echo $post->author; ?></td>
            <td class=" text-center py-2 px-4 border-b border">
                <a href='?controller=posts&action=show&id=<?php echo $post->id;?>' class="text-blue-700">|see content|</a>
            </td>
            <?php if(isset($_SESSION['user_id'])){
                if($usergegevens->rol == "admin" || $post->author == $usergegevens->authorsName){
            ?>xx
            <td class="text-center py-2 px-4 border-b border">
                <a href='?controller=posts&action=editpage&id=<?php echo $post->id;?>'>
                    <i class="fa-sharp fa-solid fa-pen-to-square" style='color:blue'></i>
                </a>
            </td>
            <td class=" text-center py-2 px-4 border-b border">
                <a href='?controller=posts&action=delete&id=<?php echo $post->id;?>'>
                    <i class="fa-solid fa-trash" style='color:blue'></i>
                </a>
            </td>
            <?php }
            }?> 
        </tr>
        <?php } ?>
    </table>
</body>
</html>
