<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check input names against volunteer-individual.html
    $firstName = trim($_POST['first_name'] ?? '');
    $lastName = trim($_POST['last_name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $contactMethod = $_POST['contact_method'] ?? '';
    $street = trim($_POST['street_address'] ?? '');
    $city = trim($_POST['city'] ?? '');
    $state = trim($_POST['state'] ?? '');
    $zip = trim($_POST['zip_code'] ?? '');
    $occupation = $_POST['occupation'] ?? '';
    $occupationOther = trim($_POST['occupation_other'] ?? '');
    $experience = $_POST['experience'] ?? '';
    $employer = trim($_POST['employer'] ?? '');
    $degree = trim($_POST['degree'] ?? '');
    $major = trim($_POST['major'] ?? '');
    
    // Checkboxes handled as arrays
    $days = isset($_POST['days']) ? implode(', ', (array)$_POST['days']) : '';
    $time = isset($_POST['time']) ? implode(', ', (array)$_POST['time']) : '';
    $hours = $_POST['hours'] ?? '';

    if (empty($firstName) || empty($lastName) || empty($email)) {
        echo "<h2>Submission Error</h2>";
        echo "<p>First name, last name, and email are required.</p>";
        echo "<a href='javascript:history.back()'>Go Back</a>";
        exit;
    }

    try {
        $pdo = get_db_connection();
        $sql = "INSERT INTO volunteer_individuals (
            first_name, last_name, email, phone, contact_method, 
            street_address, city, state, zip_code, 
            occupation, occupation_other, experience, employer, 
            degree, major, available_days, available_time, hours_per_week
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $firstName, $lastName, $email, $phone, $contactMethod,
            $street, $city, $state, $zip,
            $occupation, $occupationOther, $experience, $employer,
            $degree, $major, $days, $time, $hours
        ]);

        header("Location: ../page/volunteer-individual.html?success=1");
        exit;
    } catch (Exception $e) {
        echo "<h2>Database Error</h2>";
        echo "<p>" . htmlspecialchars($e->getMessage()) . "</p>";
        echo "<a href='javascript:history.back()'>Go Back</a>";
        exit;
    }
}
?>