<?php
require_once 'layout.php';
require_once 'includes/Matchmaker.php';
renderAdminHeader('Taxpayer Adoptions');

// Demo Data for Beneficiaries (Those requesting tax assistance)
$beneficiaries = [
    ['id' => 1, 'name' => 'John Doe', 'type' => 'individual', 'category' => 'Artisan', 'location' => 'Lagos', 'priority' => 'high', 'description' => 'Needs help with PAYE back taxes.'],
    ['id' => 2, 'name' => 'Fast Lane Logistics', 'type' => 'sme', 'category' => 'Transport', 'location' => 'Abuja', 'priority' => 'medium', 'description' => 'VAT compliance for new startup.'],
    ['id' => 3, 'name' => 'Mama Put Catering', 'type' => 'sme', 'category' => 'Food Services', 'location' => 'Rivers', 'priority' => 'low', 'description' => 'Tax registration and ID acquisition.'],
];

// Demo Data for Adoption Interests (Donors)
$adoption_interests = [
    ['id' => 101, 'name' => 'Aliko Foundation', 'preferred_type' => 'sme', 'preferred_category' => 'Transport', 'preferred_location' => 'Abuja'],
    ['id' => 102, 'name' => 'Sarah Williams', 'preferred_type' => 'individual', 'preferred_category' => 'Artisan', 'preferred_location' => 'Lagos'],
];

$matchmaker = new Matchmaker();
?>

<div class="space-y-8">
    <!-- Beneficiaries List -->
    <section class="glass p-8 rounded-3xl shadow-sm">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold">Tax Assistance Requests</h2>
            <span class="text-sm text-gray-500"><?php echo count($beneficiaries); ?> Pending Requests</span>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="text-xs text-gray-400 uppercase border-b">
                    <tr>
                        <th class="pb-4 font-bold">Beneficiary</th>
                        <th class="pb-4 font-bold">Type</th>
                        <th class="pb-4 font-bold">Category</th>
                        <th class="pb-4 font-bold">Location</th>
                        <th class="pb-4 font-bold">Priority</th>
                        <th class="pb-4 font-bold">Action</th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-gray-100">
                    <?php foreach ($beneficiaries as $b): ?>
                    <tr class="hover:bg-white/30 transition">
                        <td class="py-4">
                            <div class="font-bold"><?php echo $b['name']; ?></div>
                            <div class="text-xs text-gray-400"><?php echo $b['description']; ?></div>
                        </td>
                        <td class="py-4"><span class="px-2 py-1 bg-primary/10 text-primary rounded-lg text-xs font-bold"><?php echo ucfirst($b['type']); ?></span></td>
                        <td class="py-4 text-gray-600"><?php echo $b['category']; ?></td>
                        <td class="py-4 text-gray-600"><?php echo $b['location']; ?></td>
                        <td class="py-4">
                            <?php if ($b['priority'] === 'high'): ?>
                                <span class="text-accent font-bold">High</span>
                            <?php else: ?>
                                <span class="text-gray-500"><?php echo ucfirst($b['priority']); ?></span>
                            <?php endif; ?>
                        </td>
                        <td class="py-4">
                            <button class="text-primary font-bold hover:underline" onclick="showMatches(<?php echo htmlspecialchars(json_encode($b)); ?>)">Find Donors</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Matchmaking Logic Demo Section -->
    <section class="grid lg:grid-cols-2 gap-8">
        <?php foreach ($adoption_interests as $donor): 
            $matches = $matchmaker->findMatchesForDonor($donor, $beneficiaries);
        ?>
        <div class="glass p-8 rounded-3xl shadow-sm border-l-4 border-secondary">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <h3 class="font-bold text-lg"><?php echo $donor['name']; ?></h3>
                    <p class="text-xs text-gray-500">Interested in adopting: <?php echo ucfirst($donor['preferred_type']); ?> in <?php echo $donor['preferred_location']; ?></p>
                </div>
                <span class="bg-secondary/20 text-secondary-dark px-3 py-1 rounded-full text-xs font-bold">Donor Interest</span>
            </div>

            <h4 class="text-sm font-bold mt-6 mb-4 text-gray-400 uppercase tracking-wider">Top Match Suggestions</h4>
            <div class="space-y-4">
                <?php if (empty($matches)): ?>
                    <p class="text-sm text-gray-400 italic">No direct matches found currently.</p>
                <?php else: ?>
                    <?php foreach (array_slice($matches, 0, 2) as $match): ?>
                    <div class="p-4 bg-white/50 rounded-2xl border border-gray-100 flex justify-between items-center">
                        <div>
                            <div class="font-bold text-sm"><?php echo $match['name']; ?></div>
                            <div class="text-[10px] text-green-600 font-bold uppercase">Score: <?php echo $match['match_score']; ?>% Match</div>
                            <ul class="mt-1">
                                <?php foreach ($match['match_reasons'] as $reason): ?>
                                    <li class="text-[10px] text-gray-500 flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="text-green-500"><polyline points="20 6 9 17 4 12"/></svg>
                                        <?php echo $reason; ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <button class="bg-primary text-white px-4 py-2 rounded-xl text-xs font-bold hover:bg-primary-dark transition">
                            Link Now
                        </button>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
        <?php endforeach; ?>
    </section>
</div>

<?php renderAdminFooter(); ?>
