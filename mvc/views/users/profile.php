<br>
<div class="container mx-auto">
    <p class="font-bold text-3xl text-center">Profile data:</p>
</div>
<br>
<h1 class="text-xl font-bold text-green-500"><?php echo $_GET['alert'] ?? '' ?></h1>
<h1 class="text-xl font-bold text-red-500"><?php echo $_GET['alert1'] ?? '' ?></h1>
<br>
<div class="container mx-auto">
    <form method="post" class="flex justify-center flex-col space-y-4" action="?controller=users&action=edit">
        <label for="name">Name:</label>
        <input id="name" name="name" type="text" value="<?php echo $usergegevens->name; ?>" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
        
        <label for="authorsName">AuthorName:</label>
        <input id="authorsName" name="authorsName" type="text" value="<?php echo $usergegevens->authorsName; ?>" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">

        <label for="email">Email:</label>
        <input id="email" name="email" type="email" value="<?php echo $usergegevens->email; ?>" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
        
        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 mb-10 rounded" type="submit" name="create">Opslaan</button>
    </form>

    <form method="post" class="flex justify-center flex-col" action="?controller=users&action=logout">
        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 mb-10 rounded" type="submit" name="create">Logout</button>
    </form>

    <form method="post" class="flex justify-center flex-col" action="?controller=users&action=delete">
        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 mb-10 rounded" type="submit" name="create">Account verwijderen</button>
    </form>
</div>