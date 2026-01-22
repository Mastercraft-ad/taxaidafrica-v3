<?php
session_start();

// Demo credentials
$demo_user = 'admin';
$demo_pass = 'admin123';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === $demo_user && $password === $demo_pass) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_user'] = $username;
        header('Location: dashboard.php');
        exit;
    } else {
        $error = 'Invalid username or password.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - TaxAid Nigeria</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .glass {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
    </style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#006d5b',
                        secondary: '#ffc107',
                        accent: '#e63946',
                        dark: '#1d3557'
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="glass p-8 rounded-3xl shadow-xl w-full max-w-md">
        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold text-dark">Admin Portal</h1>
            <p class="text-gray-500">Please sign in to continue</p>
        </div>

        <?php if ($error): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl mb-6 text-sm">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <form method="POST" class="space-y-6">
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Username</label>
                <input type="text" name="username" required 
                    class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none focus:border-primary transition"
                    placeholder="Enter username">
            </div>
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Password</label>
                <input type="password" name="password" required 
                    class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none focus:border-primary transition"
                    placeholder="Enter password">
            </div>
            <button type="submit" 
                class="w-full bg-primary text-white font-bold py-3 rounded-xl hover:bg-opacity-90 transition">
                Sign In
            </button>
        </form>
        
        <div class="mt-8 pt-6 border-t border-gray-100 text-center">
            <p class="text-xs text-gray-400">Demo Access: admin / admin123</p>
        </div>
    </div>
</body>
</html>
