<?php
// Admin Dashboard - TaxAid Africa
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - TaxAid Africa</title>
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
                        'primary-dark': '#2470ab',
                        secondary: '#F2BC1C',
                        accent: '#E64249',
                        light: '#f4f7f6',
                        dark: '#333333',
                    },
                    fontFamily: {
                        sans: ['DM Sans', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    <style>
        .glass {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
    </style>
</head>
<body class="bg-light font-sans text-dark min-h-screen">
    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-primary text-white min-h-screen p-6 hidden lg:block">
            <div class="mb-10">
                <img src="../assets/images/logo.png" alt="TaxAid Africa" class="h-10 brightness-0 invert">
            </div>
            <nav class="space-y-4">
                <a href="#" class="block py-2.5 px-4 rounded transition bg-white/10 font-bold">Dashboard</a>
                <a href="#" class="block py-2.5 px-4 rounded transition hover:bg-white/10">Donations</a>
                <a href="#" class="block py-2.5 px-4 rounded transition hover:bg-white/10">Volunteers</a>
                <a href="#" class="block py-2.5 px-4 rounded transition hover:bg-white/10">Support Requests</a>
                <a href="#" class="block py-2.5 px-4 rounded transition hover:bg-white/10">Adopt a Taxpayer</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6 lg:p-10">
            <header class="flex justify-between items-center mb-10">
                <h1 class="text-3xl font-bold">Dashboard Overview</h1>
                <div class="flex items-center gap-4">
                    <span class="text-sm font-medium bg-white px-4 py-2 rounded-full shadow-sm">Admin User</span>
                    <button class="text-accent font-bold hover:underline">Logout</button>
                </div>
            </header>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                <div class="glass p-6 rounded-3xl shadow-sm">
                    <p class="text-sm text-gray-500 font-bold mb-1">Total Donations</p>
                    <h3 class="text-2xl font-bold text-primary">₦0.00</h3>
                </div>
                <div class="glass p-6 rounded-3xl shadow-sm">
                    <p class="text-sm text-gray-500 font-bold mb-1">Volunteers</p>
                    <h3 class="text-2xl font-bold text-secondary">0</h3>
                </div>
                <div class="glass p-6 rounded-3xl shadow-sm">
                    <p class="text-sm text-gray-500 font-bold mb-1">Support Requests</p>
                    <h3 class="text-2xl font-bold text-accent">0</h3>
                </div>
                <div class="glass p-6 rounded-3xl shadow-sm">
                    <p class="text-sm text-gray-500 font-bold mb-1">Active Adoptions</p>
                    <h3 class="text-2xl font-bold text-dark">0</h3>
                </div>
            </div>

            <!-- Main Sections -->
            <div class="grid grid-cols-1 xl:grid-cols-2 gap-8">
                <!-- Volunteer Listing -->
                <section class="glass p-8 rounded-3xl shadow-sm">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-xl font-bold">Volunteer Listing</h2>
                        <div class="flex gap-2">
                            <select class="text-xs bg-white border rounded-lg px-2 py-1">
                                <option>Sort by Position</option>
                                <option>Individual</option>
                                <option>Professional</option>
                            </select>
                            <select class="text-xs bg-white border rounded-lg px-2 py-1">
                                <option>Sort by State</option>
                            </select>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="text-xs text-gray-400 uppercase border-b">
                                <tr>
                                    <th class="pb-3">Name</th>
                                    <th class="pb-3">Type</th>
                                    <th class="pb-3">State</th>
                                    <th class="pb-3">Qualification</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm">
                                <tr>
                                    <td colspan="4" class="py-10 text-center text-gray-400">No volunteers found yet.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>

                <!-- Support & Adoption -->
                <section class="glass p-8 rounded-3xl shadow-sm">
                    <h2 class="text-xl font-bold mb-6">Support & Adoption</h2>
                    <div class="space-y-6">
                        <div class="p-4 bg-white/50 rounded-2xl border border-dashed border-gray-300 text-center">
                            <p class="text-sm text-gray-500 italic">No support requests or adoption records to display.</p>
                        </div>
                    </div>
                </section>
            </div>
        </main>
    </div>
</body>
</html>