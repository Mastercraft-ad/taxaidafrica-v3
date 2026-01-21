<?php
require_once 'layout.php';
renderAdminHeader('Donations');
?>
<div class="glass p-8 rounded-3xl shadow-sm">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold">Donation Records</h2>
        <button class="bg-primary text-white px-4 py-2 rounded-xl text-sm font-bold">Export CSV</button>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left">
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