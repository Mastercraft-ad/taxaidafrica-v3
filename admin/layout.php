<?php
// Admin Navigation & Common Layout - TaxAid Africa
function renderAdminHeader($title) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?> - Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#2D8CD5',
                        secondary: '#F2BC1C',
                        accent: '#E64249',
                        light: '#f4f7f6',
                        dark: '#333333',
                    }
                }
            }
        }
    </script>
    <style>
        .glass { background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.3); }
        .sidebar-link.active { background: rgba(255, 255, 255, 0.15); border-left: 4px solid #F2BC1C; font-weight: bold; }
    </style>
</head>
<body class="bg-light font-sans text-dark min-h-screen">
    <div class="flex">
        <aside class="w-64 bg-primary text-white min-h-screen p-6 hidden lg:block sticky top-0 h-screen">
            <div class="mb-10"><a href="../index.html"><img src="../assets/images/logo.png" alt="Logo" class="h-10 brightness-0 invert"></a></div>
            <nav class="space-y-2">
                <a href="dashboard.php" class="sidebar-link block py-2.5 px-4 rounded transition">Dashboard</a>
                <a href="donations.php" class="sidebar-link block py-2.5 px-4 rounded transition">Donations</a>
                <a href="volunteers.php" class="sidebar-link block py-2.5 px-4 rounded transition">Volunteers</a>
                <a href="support.php" class="sidebar-link block py-2.5 px-4 rounded transition">Support Requests</a>
                <a href="adopt.php" class="sidebar-link block py-2.5 px-4 rounded transition">Adopt a Taxpayer</a>
                <div class="pt-6">
                    <p class="text-xs uppercase text-white/50 font-bold mb-2 px-4">Settings</p>
                    <a href="settings.php" class="sidebar-link block py-2.5 px-4 rounded transition">General Settings</a>
                    <a href="users.php" class="sidebar-link block py-2.5 px-4 rounded transition">Admin Users</a>
                    <a href="logs.php" class="sidebar-link block py-2.5 px-4 rounded transition">System Logs</a>
                </div>
            </nav>
        </aside>
        <main class="flex-1 p-6 lg:p-10">
            <header class="flex justify-between items-center mb-10">
                <h1 class="text-3xl font-bold"><?php echo $title; ?></h1>
                <div class="flex items-center gap-4">
                    <div class="flex items-center gap-3 bg-white px-4 py-2 rounded-full shadow-sm border border-gray-100">
                        <div class="w-8 h-8 bg-secondary rounded-full flex items-center justify-center font-bold text-dark text-xs">AD</div>
                        <span class="text-sm font-bold">Admin</span>
                    </div>
                </div>
            </header>
<?php
}

function renderAdminFooter() {
?>
        </main>
    </div>
</body>
</html>
<?php
}
?>