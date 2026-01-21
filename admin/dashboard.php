<?php
require_once 'layout.php';
renderAdminHeader('Dashboard Overview');
?>
<p class="text-gray-500 mb-10">Welcome back, Administrator.</p>

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
                <select class="text-sm bg-white border border-gray-200 rounded-xl px-3 py-2 outline-none">
                    <option>All Positions</option>
                    <option>Individual</option>
                    <option>Professional Firm</option>
                </select>
                <select class="text-sm bg-white border border-gray-200 rounded-xl px-3 py-2 outline-none">
                    <option>All States</option>
                    <option>Lagos</option>
                    <option>Abuja</option>
                    <option>Rivers</option>
                </select>
                <button onclick="exportTableToExcel('dashboard-volunteers', 'recent_volunteers')" class="bg-primary text-white px-4 py-2 rounded-xl text-xs font-bold flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
                    Export
                </button>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table id="dashboard-volunteers" class="w-full text-left">
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
                        <td class="py-4 font-bold">Chukwudi Obi</td>
                        <td class="py-4"><span class="px-2 py-1 bg-primary/10 text-primary rounded-lg text-xs font-bold">Professional</span></td>
                        <td class="py-4 text-gray-600">Lagos</td>
                        <td class="py-4 text-gray-600">Chartered Accountant</td>
                        <td class="py-4"><button class="text-primary hover:underline">View</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Support Requests -->
    <section class="glass p-8 rounded-3xl shadow-sm">
        <h2 class="text-xl font-bold mb-6">Recent Requests</h2>
        <div class="space-y-4">
            <div class="p-4 bg-white/50 rounded-2xl border border-gray-100">
                <span class="text-[10px] font-bold text-accent uppercase bg-accent/10 px-2 py-0.5 rounded-full">High Priority</span>
                <h4 class="font-bold text-sm mt-2 mb-1">Tax Audit Support</h4>
                <p class="text-xs text-gray-500">Small business in Kano facing audit.</p>
            </div>
        </div>
        <a href="support.php" class="block text-center mt-6 text-sm font-bold text-primary hover:underline">View All Requests &rarr;</a>
    </section>
</div>
<?php renderAdminHeader(); ?>