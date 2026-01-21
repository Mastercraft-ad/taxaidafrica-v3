<?php
require_once 'layout.php';
renderAdminHeader('Settings');
?>
<div class="glass p-8 rounded-3xl shadow-sm max-w-2xl">
    <h2 class="text-xl font-bold mb-6">System Settings</h2>
    <form class="space-y-6">
        <div>
            <label class="block text-sm font-bold mb-2">Organization Name</label>
            <input type="text" value="TaxAid Africa" class="w-full bg-white border rounded-xl px-4 py-3 outline-none focus:ring-2 focus:ring-primary">
        </div>
        <div>
            <label class="block text-sm font-bold mb-2">Contact Email</label>
            <input type="email" value="admin@taxaidafrica.org" class="w-full bg-white border rounded-xl px-4 py-3 outline-none focus:ring-2 focus:ring-primary">
        </div>
        <button class="bg-primary text-white px-6 py-3 rounded-xl font-bold">Save Changes</button>
    </form>
</div>
<?php renderAdminFooter(); ?>