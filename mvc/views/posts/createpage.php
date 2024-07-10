    <br>
    <div class="container mx-auto">
        <p class="font-bold text-3xl text-center">Create new post:</p>
    </div>
    <div class="container mx-auto ">
        <form method="post" class="flex justify-center flex-col" action="?controller=posts&action=create">
            <br>
            <label>Title:</label><input name="title" type="text" required>
            <br>
            <label>Slug:</label><input name="slug" type="slug" required>
            <br>
            <label>Date:</label><input name="datum" type="date" value="<?php echo date("Y-m-d")?>" required>
            <br>
            <label>Content:</label>
            <textarea name="content" cols="30" rows="10"></textarea required>
            <br>
            <input  class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-10" type="submit" name="create" value="Create">
            <br>
        </form>
    </div>
    <br>
