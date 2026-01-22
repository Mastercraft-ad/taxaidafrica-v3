<?php
require_once 'layout.php';
renderAdminHeader('Support Requests');
?>
<div class="glass p-8 rounded-3xl shadow-sm">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold">Pending Requests</h2>
        <div class="flex gap-2">
            <button onclick="exportToExcel('support-table', 'Support_Requests')" class="px-4 py-2 bg-primary/10 text-primary rounded-lg text-sm font-semibold hover:bg-primary/20 transition-all flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
                Export Excel
            </button>
        </div>
    </div>
    <div class="overflow-x-auto">
        <table id="support-table" class="w-full text-left">
            <thead>
                <tr class="border-b border-gray-100">
                    <th class="pb-4 font-semibold text-sm">Date</th>
                    <th class="pb-4 font-semibold text-sm">Name</th>
                    <th class="pb-4 font-semibold text-sm">Type</th>
                    <th class="pb-4 font-semibold text-sm">Location</th>
                    <th class="pb-4 font-semibold text-sm">Reason</th>
                    <th class="pb-4 font-semibold text-sm">Status</th>
                    <th class="pb-4 font-semibold text-sm">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr><td colspan="7" class="py-10 text-center text-gray-400">No support requests found.</td></tr>
            </tbody>
        </table>
    </div>
</div>
<?php renderAdminFooter(); ?>