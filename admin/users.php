<?php
require_once 'layout.php';
renderAdminHeader('Admin Users');
?>
<div class="glass p-8 rounded-3xl shadow-sm">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold">System Administrators</h2>
        <button class="bg-primary text-white px-4 py-2 rounded-xl text-sm font-bold">+ Add New User</button>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="text-xs text-gray-400 uppercase border-b">
                <tr>
                    <th class="pb-4">User</th>
                    <th class="pb-4">Role</th>
                    <th class="pb-4">Last Login</th>
                </tr>
            </thead>
            <tbody class="text-sm">
                <tr>
                    <td class="py-4 font-bold">Admin</td>
                    <td class="py-4">Super Admin</td>
                    <td class="py-4 text-gray-400">Just now</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php renderAdminFooter(); ?>