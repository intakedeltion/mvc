<div class="h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded shadow-md w-96">
            <h2 class="text-2xl font-bold mb-4">Register</h2>
            <h1 class="text-xl font-bold text-red-500"><?php echo $_GET['alert'] ?? '' ?></h1>
            <br>
            <form action="?controller=users&action=registreering" method="POST">
                <div class="mb-4">
                    <label class="block text-gray-600 text-sm font-semibold mb-2">Name:</label>
                    <input type="text" name="name" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-600 text-sm font-semibold mb-2">Authors Name:</label>
                    <input type="text" name="authorsName" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-600 text-sm font-semibold mb-2">E-mail:</label>
                    <input type="email" name="email" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-600 text-sm font-semibold mb-2">Password:</label>
                    <input type="password" name="password" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" required>
                    <label class="block text-gray-600 text-sm font-semibold mb-2">Repeat Password:</label>
                    <input type="password" name="rePassword" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" required>
                </div>

                <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-700">registereen</button>

            </form>

            <p class="mt-4 text-gray-600 text-sm">You have account? <a href="?controller=users&action=login" class="text-blue-500">login here</a></p>
    </div>
</div>