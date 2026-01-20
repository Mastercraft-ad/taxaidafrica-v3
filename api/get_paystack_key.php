<?php
header('Content-Type: application/json');
echo json_encode(['publicKey' => getenv('PAYSTACK_PUBLIC_KEY') ?: '']);
?>