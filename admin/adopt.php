<?php
require_once 'layout.php';
renderAdminHeader('Adopt a Taxpayer');
?>
<div class="glass p-8 rounded-3xl shadow-sm">
    <h2 class="text-xl font-bold mb-6">Adoption Program</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="p-6 bg-primary/5 rounded-2xl border border-primary/20">
            <h3 class="font-bold mb-2">Available for Adoption</h3>
            <p class="text-sm text-gray-500">List of taxpayers seeking support will appear here.</p>
        </div>
        <div class="p-6 bg-secondary/5 rounded-2xl border border-secondary/20">
            <h3 class="font-bold mb-2">Ready to Adopt</h3>
            <p class="text-sm text-gray-500">List of potential adopters will appear here.</p>
        </div>
    </div>
</div>
<?php renderAdminFooter(); ?>