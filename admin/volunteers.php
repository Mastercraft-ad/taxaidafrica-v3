<?php
require_once 'layout.php';
renderAdminHeader('Volunteers');
?>
<div class="glass p-8 rounded-3xl shadow-sm">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold">Volunteer Management</h2>
        <div class="flex gap-2">
            <select class="text-sm bg-white border border-gray-200 rounded-xl px-3 py-2"><option>All Positions</option></select>
            <select class="text-sm bg-white border border-gray-200 rounded-xl px-3 py-2"><option>All States</option></select>
            <button onclick="exportTableToExcel('volunteers-table', 'volunteers_list')" class="bg-primary text-white px-4 py-2 rounded-xl text-sm font-bold flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
                Export
            </button>
        </div>
    </div>
    <div class="overflow-x-auto">
        <table id="volunteers-table" class="w-full text-left">
            <thead class="text-xs text-gray-400 uppercase border-b">
                <tr>
                    <th class="pb-4">Name</th>
                    <th class="pb-4">Type</th>
                    <th class="pb-4">Qualification</th>
                    <th class="pb-4">State</th>
                </tr>
            </thead>
            <tbody class="text-sm">
                <tr><td colspan="4" class="py-10 text-center text-gray-400">No volunteers registered yet.</td></tr>
            </tbody>
        </table>
    </div>
</div>
<?php renderAdminFooter(); ?>