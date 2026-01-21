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
        .sidebar-link.active {
            background: rgba(255, 255, 255, 0.15);
            font-weight: bold;
            border-left: 4px solid #F2BC1C;
        }
    </style>
</head>
<body class="bg-light font-sans text-dark min-h-screen">
    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-primary text-white min-h-screen p-6 hidden lg:block sticky top-0 h-screen">
            <div class="mb-10">
                <a href="../index.html">
                    <img src="../assets/images/logo.png" alt="TaxAid Africa" class="h-10 brightness-0 invert">
                </a>
            </div>
            <nav class="space-y-4">
                <a href="#" class="sidebar-link active block py-2.5 px-4 rounded transition">Dashboard</a>
                <a href="#" class="sidebar-link block py-2.5 px-4 rounded transition hover:bg-white/10">Donations</a>
                <a href="#" class="sidebar-link block py-2.5 px-4 rounded transition hover:bg-white/10">Volunteers</a>
                <a href="#" class="sidebar-link block py-2.5 px-4 rounded transition hover:bg-white/10">Support Requests</a>
                <a href="#" class="sidebar-link block py-2.5 px-4 rounded transition hover:bg-white/10">Adopt a Taxpayer</a>
                <div class="pt-10">
                    <p class="text-xs uppercase text-white/50 font-bold mb-4 px-4">Settings</p>
                    <a href="#" class="sidebar-link block py-2.5 px-4 rounded transition hover:bg-white/10">Admin Users</a>
                    <a href="#" class="sidebar-link block py-2.5 px-4 rounded transition hover:bg-white/10 text-white/70">System Logs</a>
                </div>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6 lg:p-10">
            <header class="flex justify-between items-center mb-10">
                <div>
                    <h1 class="text-3xl font-bold">Dashboard Overview</h1>
                    <p class="text-gray-500">Welcome back, Administrator.</p>
                </div>
                <div class="flex items-center gap-4">
                    <div class="relative group">
                        <button class="bg-white p-2 rounded-full shadow-sm border border-gray-100 relative">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-600"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/></svg>
                            <span class="absolute top-0 right-0 w-2 h-2 bg-accent rounded-full border-2 border-white"></span>
                        </button>
                    </div>
                    <div class="flex items-center gap-3 bg-white px-4 py-2 rounded-full shadow-sm border border-gray-100">
                        <div class="w-8 h-8 bg-secondary rounded-full flex items-center justify-center font-bold text-dark text-xs">AD</div>
                        <span class="text-sm font-bold">Admin</span>
                    </div>
                    <a href="../index.html" class="text-accent font-bold hover:underline text-sm">Logout</a>
                </div>
            </header>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                <div class="glass p-6 rounded-3xl shadow-sm border-l-4 border-primary">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-10 h-10 bg-primary/10 rounded-xl flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-primary"><circle cx="12" cy="12" r="10"/><path d="M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8"/><path d="M12 18V6"/></svg>
                        </div>
                        <span class="text-xs font-bold text-green-500">+12%</span>
                    </div>
                    <p class="text-sm text-gray-500 font-bold mb-1">Total Donations</p>
                    <h3 class="text-2xl font-bold text-dark">₦1,250,500</h3>
                </div>
                <div class="glass p-6 rounded-3xl shadow-sm border-l-4 border-secondary">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-10 h-10 bg-secondary/10 rounded-xl flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-secondary-dark"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                        </div>
                        <span class="text-xs font-bold text-green-500">+5</span>
                    </div>
                    <p class="text-sm text-gray-500 font-bold mb-1">Total Volunteers</p>
                    <h3 class="text-2xl font-bold text-dark">42</h3>
                </div>
                <div class="glass p-6 rounded-3xl shadow-sm border-l-4 border-accent">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-10 h-10 bg-accent/10 rounded-xl flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-accent"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
                        </div>
                        <span class="text-xs font-bold text-accent">Pending</span>
                    </div>
                    <p class="text-sm text-gray-500 font-bold mb-1">Support Requests</p>
                    <h3 class="text-2xl font-bold text-dark">18</h3>
                </div>
                <div class="glass p-6 rounded-3xl shadow-sm border-l-4 border-dark">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-10 h-10 bg-dark/10 rounded-xl flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-dark"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/></svg>
                        </div>
                        <span class="text-xs font-bold text-primary">Active</span>
                    </div>
                    <p class="text-sm text-gray-500 font-bold mb-1">Active Adoptions</p>
                    <h3 class="text-2xl font-bold text-dark">24</h3>
                </div>
            </div>

            <!-- Main Sections -->
            <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
                <!-- Volunteer Listing -->
                <section class="glass p-8 rounded-3xl shadow-sm xl:col-span-2">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 gap-4">
                        <h2 class="text-xl font-bold">Recent Volunteers</h2>
                        <div class="flex flex-wrap gap-2">
                            <select class="text-sm bg-white border border-gray-200 rounded-xl px-3 py-2 focus:ring-2 focus:ring-primary outline-none transition">
                                <option>All Positions</option>
                                <option>Individual</option>
                                <option>Professional Firm</option>
                            </select>
                            <select class="text-sm bg-white border border-gray-200 rounded-xl px-3 py-2 focus:ring-2 focus:ring-primary outline-none transition">
                                <option>All States</option>
                                <option>Lagos</option>
                                <option>Abuja</option>
                                <option>Rivers</option>
                            </select>
                            <select class="text-sm bg-white border border-gray-200 rounded-xl px-3 py-2 focus:ring-2 focus:ring-primary outline-none transition">
                                <option>All Qualifications</option>
                                <option>Chartered Accountant</option>
                                <option>Tax Consultant</option>
                                <option>Legal Practitioner</option>
                            </select>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="text-xs text-gray-400 uppercase border-b">
                                <tr>
                                    <th class="pb-4 font-bold">Volunteer Name</th>
                                    <th class="pb-4 font-bold">Type</th>
                                    <th class="pb-4 font-bold">State</th>
                                    <th class="pb-4 font-bold">Qualification</th>
                                    <th class="pb-4 font-bold">Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm divide-y divide-gray-100">
                                <tr class="hover:bg-white/30 transition">
                                    <td class="py-4">
                                        <div class="font-bold">Chukwudi Obi</div>
                                        <div class="text-xs text-gray-400">chukwudi@example.com</div>
                                    </td>
                                    <td class="py-4"><span class="px-2 py-1 bg-primary/10 text-primary rounded-lg text-xs font-bold">Professional</span></td>
                                    <td class="py-4 text-gray-600">Lagos</td>
                                    <td class="py-4 text-gray-600">Chartered Accountant</td>
                                    <td class="py-4">
                                        <button class="text-primary hover:text-primary-dark font-bold">View</button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-white/30 transition">
                                    <td class="py-4">
                                        <div class="font-bold">Amina Yusuf</div>
                                        <div class="text-xs text-gray-400">amina@example.com</div>
                                    </td>
                                    <td class="py-4"><span class="px-2 py-1 bg-secondary/10 text-secondary-dark rounded-lg text-xs font-bold">Individual</span></td>
                                    <td class="py-4 text-gray-600">Abuja</td>
                                    <td class="py-4 text-gray-600">General Support</td>
                                    <td class="py-4">
                                        <button class="text-primary hover:text-primary-dark font-bold">View</button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-white/30 transition">
                                    <td class="py-4">
                                        <div class="font-bold">Adekunle Smith & Co.</div>
                                        <div class="text-xs text-gray-400">contact@adekunlesmith.com</div>
                                    </td>
                                    <td class="py-4"><span class="px-2 py-1 bg-primary/10 text-primary rounded-lg text-xs font-bold">Professional Firm</span></td>
                                    <td class="py-4 text-gray-600">Lagos</td>
                                    <td class="py-4 text-gray-600">Tax Consultancy Firm</td>
                                    <td class="py-4">
                                        <button class="text-primary hover:text-primary-dark font-bold">View</button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-white/30 transition">
                                    <td class="py-4">
                                        <div class="font-bold">Blessing Ekaette</div>
                                        <div class="text-xs text-gray-400">blessing@example.com</div>
                                    </td>
                                    <td class="py-4"><span class="px-2 py-1 bg-secondary/10 text-secondary-dark rounded-lg text-xs font-bold">Individual</span></td>
                                    <td class="py-4 text-gray-600">Rivers</td>
                                    <td class="py-4 text-gray-600">Financial Advisor</td>
                                    <td class="py-4">
                                        <button class="text-primary hover:text-primary-dark font-bold">View</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-6 flex justify-center">
                        <button class="text-sm font-bold text-gray-400 hover:text-primary transition">View All Volunteers &rarr;</button>
                    </div>
                </section>

                <!-- Support & Adoption -->
                <div class="space-y-8">
                    <section class="glass p-8 rounded-3xl shadow-sm">
                        <h2 class="text-xl font-bold mb-6">Recent Requests</h2>
                        <div class="space-y-4">
                            <div class="p-4 bg-white/50 rounded-2xl border border-gray-100 hover:border-primary/20 transition group">
                                <div class="flex justify-between items-start mb-2">
                                    <span class="text-xs font-bold text-accent px-2 py-0.5 bg-accent/10 rounded-full">High Priority</span>
                                    <span class="text-[10px] text-gray-400 uppercase font-bold">2h ago</span>
                                </div>
                                <h4 class="font-bold text-sm mb-1">Tax Audit Support</h4>
                                <p class="text-xs text-gray-500 mb-3">Small business in Kano facing unexpected FIRS audit.</p>
                                <button class="w-full py-2 bg-primary text-white text-xs font-bold rounded-xl opacity-0 group-hover:opacity-100 transition shadow-lg shadow-primary/20">Assign Expert</button>
                            </div>
                            <div class="p-4 bg-white/50 rounded-2xl border border-gray-100 hover:border-primary/20 transition group">
                                <div class="flex justify-between items-start mb-2">
                                    <span class="text-xs font-bold text-primary px-2 py-0.5 bg-primary/10 rounded-full">Individual</span>
                                    <span class="text-[10px] text-gray-400 uppercase font-bold">5h ago</span>
                                </div>
                                <h4 class="font-bold text-sm mb-1">PAYE Clarification</h4>
                                <p class="text-xs text-gray-500 mb-3">Teacher seeking help with income tax over-deduction.</p>
                                <button class="w-full py-2 bg-primary text-white text-xs font-bold rounded-xl opacity-0 group-hover:opacity-100 transition shadow-lg shadow-primary/20">Assign Expert</button>
                            </div>
                        </div>
                        <button class="w-full mt-6 py-3 border-2 border-dashed border-gray-200 text-gray-400 rounded-2xl font-bold text-sm hover:border-primary/30 hover:text-primary transition">All Requests</button>
                    </section>

                    <section class="glass p-8 rounded-3xl shadow-sm bg-gradient-to-br from-primary/5 to-transparent">
                        <h2 class="text-xl font-bold mb-4">Adoption Matches</h2>
                        <p class="text-sm text-gray-500 mb-6">Match adopters with taxpayers in need.</p>
                        <div class="p-4 bg-primary text-white rounded-2xl shadow-xl shadow-primary/20 relative overflow-hidden group">
                            <div class="relative z-10">
                                <h4 class="font-bold mb-1">New Potential Match</h4>
                                <p class="text-xs opacity-80 mb-4">A corporate firm wants to adopt 5 small businesses in Lagos.</p>
                                <button class="px-4 py-2 bg-white text-primary text-xs font-bold rounded-lg hover:bg-secondary hover:text-dark transition">Manage Match</button>
                            </div>
                            <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-white/10 rounded-full group-hover:scale-125 transition-transform duration-500"></div>
                        </div>
                    </section>
                </div>
            </div>
        </main>
    </div>

    <!-- Mobile Menu Button (Overlay) -->
    <div class="lg:hidden fixed bottom-6 right-6 z-50">
        <button class="w-14 h-14 bg-primary text-white rounded-full shadow-2xl flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" x2="21" y1="12" y2="12"/><line x1="3" x2="21" y1="6" y2="6"/><line x1="3" x2="21" y1="18" y2="18"/></svg>
        </button>
    </div>
</body>
</html>