<?php
require_once 'layout.php';
renderAdminHeader('Donations');
?>
<div class="glass p-8 rounded-3xl shadow-sm">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold">Donation Records</h2>
        <button onclick="exportTableToExcel('donations-table', 'donations_report')" class="bg-primary text-white px-4 py-2 rounded-xl text-sm font-bold flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
            Export Excel
        </button>
    </div>
    <div class="overflow-x-auto">
        <table id="donations-table" class="w-full text-left">
            <thead class="text-xs text-gray-400 uppercase border-b">
                <tr>
                    <th class="pb-4">Donor Name</th>
                    <th class="pb-4">Amount</th>
                    <th class="pb-4">Date</th>
                    <th class="pb-4">Status</th>
                </tr>
            </thead>
            <tbody class="text-sm">
                <tr><td colspan="4" class="py-10 text-center text-gray-400">No donation records available.</td></tr>
            </tbody>
        </table>
    </div>
</div>
<?php renderAdminFooter(); ?>