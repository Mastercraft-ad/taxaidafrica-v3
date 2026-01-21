<?php
require_once 'layout.php';
renderAdminHeader('System Logs');
?>
<div class="glass p-8 rounded-3xl shadow-sm">
    <h2 class="text-xl font-bold mb-6">Activity Logs</h2>
    <div class="space-y-2">
        <div class="p-3 bg-white/50 rounded-lg text-xs font-mono">
            <span class="text-gray-400">[2026-01-21 13:05:22]</span> INFO: Admin dashboard accessed.
        </div>
        <div class="p-3 bg-white/50 rounded-lg text-xs font-mono">
            <span class="text-gray-400">[2026-01-21 13:00:10]</span> INFO: PHP Server started.
        </div>
    </div>
</div>
<?php renderAdminFooter(); ?>