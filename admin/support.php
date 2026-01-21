<?php
require_once 'layout.php';
renderAdminHeader('Support Requests');
?>
<div class="glass p-8 rounded-3xl shadow-sm">
    <h2 class="text-xl font-bold mb-6">Pending Requests</h2>
    <div class="space-y-4">
        <div class="p-6 bg-white/50 rounded-2xl border border-gray-100 text-center py-20">
            <p class="text-gray-400">No active support requests found.</p>
        </div>
    </div>
</div>
<?php renderAdminFooter(); ?>