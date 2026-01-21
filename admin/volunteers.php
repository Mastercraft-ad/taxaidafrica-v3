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
        </div>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left">
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