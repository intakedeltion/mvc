    <div class="container mx-auto">
        <p class="font-bold text-3xl text-center">editten:</p>
    </div>
    <br>
    <div class="container mx-auto ">
        <form method="post" class="flex justify-center flex-col" action="?controller=posts&action=edit&id=<?php echo $_GET['id']?>">
            <br>
            <label>title:</label><input name="title" type="text" value="<?php echo $post->title;?>"required>
            <br>
            <label>slug:</label><input name="slug" type="slug" value="<?php echo $post->slug;?>" required>
            <br>
            <label>date:</label><input name="datum" type="date" value="<?php echo $post->datum;?>" required>
            <br>
            <label>content:</label>
            <br>
            <textarea name="content" cols="30" rows="10"><?php echo $post->content?></textarea required>
            <br>
            <input  class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 mb-10 rounded" type="submit" name="create" value="editten">
            <br>
        </form>
    </div>
