<?php
require_once 'auth.php';
handleLogout();

function renderAdminHeader($title) {
    checkAdminAuth();
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
    <!-- Table Export Library -->
    <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
    <script>
        function exportTableToExcel(tableId, filename = '') {
            const table = document.getElementById(tableId);
            const wb = XLSX.utils.table_to_book(table, { sheet: "Sheet1" });
            XLSX.writeFile(wb, filename ? filename + '.xlsx' : 'export.xlsx');
        }
    </script>
</head>
<body class="bg-light font-sans text-dark min-h-screen">
    <!-- Mobile Nav Toggle -->
    <div class="lg:hidden fixed top-4 right-4 z-[60]">
        <button id="sidebar-toggle" class="p-2 bg-primary text-white rounded-lg shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" x2="21" y1="12" y2="12"></line><line x1="3" x2="21" y1="6" y2="6"></line><line x1="3" x2="21" y1="18" y2="18"></line></svg>
        </button>
    </div>

    <div class="flex">
        <aside id="admin-sidebar" class="w-64 bg-primary text-white min-h-screen p-6 fixed lg:sticky top-0 h-screen transition-transform duration-300 -translate-x-full lg:translate-x-0 z-50">
            <div class="mb-10 flex items-center justify-between">
                <a href="../index.html"><img src="../assets/images/logo.png" alt="Logo" class="h-10 brightness-0 invert"></a>
                <button id="sidebar-close" class="lg:hidden text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg>
                </button>
            </div>
            <nav class="space-y-2">
                <a href="dashboard.php" class="sidebar-link block py-2.5 px-4 rounded transition">Dashboard</a>
                <a href="donations.php" class="sidebar-link block py-2.5 px-4 rounded transition">Donations</a>
                <a href="volunteers.php" class="sidebar-link block py-2.5 px-4 rounded transition">Volunteers</a>
                <a href="support.php" class="sidebar-link block py-2.5 px-4 rounded transition">Support Requests</a>
                <div class="pt-6">
                    <a href="?logout=1" class="sidebar-link block py-2.5 px-4 rounded transition text-accent-light hover:text-white mt-4">Logout</a>
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
    <script>
        const sidebar = document.getElementById('admin-sidebar');
        const toggle = document.getElementById('sidebar-toggle');
        const close = document.getElementById('sidebar-close');

        if (toggle) {
            toggle.addEventListener('click', () => {
                sidebar.classList.remove('-translate-x-full');
            });
        }

        if (close) {
            close.addEventListener('click', () => {
                sidebar.classList.add('-translate-x-full');
            });
        }
    </script>
</body>
</html>
<?php
}
?>
