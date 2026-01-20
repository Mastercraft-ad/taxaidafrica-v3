<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $interest = trim($_POST['interest_reason'] ?? ''); // matching <textarea name="interest_reason"> in HTML if exists
    // Wait, let me check the textarea name for firm. It's actually 'expertise' and 'geographic_areas'.
    // In volunteer-firm.html:
    // name="org_name"
    // name="org_type"
    // name="contact_name"
    // name="contact_position"
    // name="contact_email"
    // name="contact_phone"
    // name="street_address"
    // name="city"
    // name="state"
    // name="services"
    // name="geographic_areas"
    // name="expertise"
    
    $firmName = trim($_POST['org_name'] ?? '');
    $contactPerson = trim($_POST['contact_name'] ?? '');
    $email = trim($_POST['contact_email'] ?? '');
    $phone = trim($_POST['contact_phone'] ?? '');
    $website = trim($_POST['website'] ?? '');
    $location = trim($_POST['city'] ?? '') . ', ' . trim($_POST['state'] ?? '');
    $expertise = trim($_POST['expertise'] ?? '');
    $interest = trim($_POST['geographic_areas'] ?? ''); // Using geographic_areas as interest_reason for now or adjust schema

    if (empty($firmName) || empty($contactPerson) || empty($email)) {
        echo "<h2>Submission Error</h2>";
        echo "<p>Organization name, contact person, and email are required.</p>";
        echo "<a href='javascript:history.back()'>Go Back</a>";
        exit;
    }

    try {
        $pdo = get_db_connection();
        $stmt = $pdo->prepare("INSERT INTO volunteer_firms (firm_name, contact_person, email, phone, website, location, expertise, interest_reason) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$firmName, $contactPerson, $email, $phone, $website, $location, $expertise, $interest]);

        header("Location: ../page/volunteer-firm.html?success=1");
        exit;
    } catch (Exception $e) {
        echo "<h2>Database Error</h2>";
        echo "<p>" . htmlspecialchars($e->getMessage()) . "</p>";
        echo "<a href='javascript:history.back()'>Go Back</a>";
        exit;
    }
}
?>