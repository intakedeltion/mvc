<div class="h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded shadow-md w-96">
            <h2 class="text-2xl font-bold mb-4">Login</h2>
            <h1 class="text-xl font-bold text-green-500"><?php echo $_GET['alert'] ?? '' ?></h1>
            <h1 class="text-xl font-bold text-red-500"><?php echo $_GET['alert1'] ?? '' ?></h1>
            <form action="?controller=users&action=dologin" method="POST">
                <div class="mb-4">
                    <label class="block text-gray-600 text-sm font-semibold mb-2">Email:</label>
                    <input type="email" name="email" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-600 text-sm font-semibold mb-2">Password:</label>
                    <input type="password" name="password" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" required>
                </div>

                <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-700">Login</button>
            </form>

            <p class="mt-4 text-gray-600 text-sm">No account yet? <a href="?controller=users&action=registreer" class="text-blue-500">Register here</a></p>
    </div>
</div>