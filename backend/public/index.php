<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

$agents = [
    [
        'id' => 1,
        'name' => 'Receptionist Agent',
        'category' => 'Front Office',
        'salary' => 'KES 15,000 / mo',
        'tokens' => 120000,
        'dedicated' => true,
    ],
    [
        'id' => 2,
        'name' => 'Data Entry Clerk',
        'category' => 'Operations',
        'salary' => 'KES 22,000 / mo',
        'tokens' => 180000,
        'dedicated' => true,
    ],
];

function json_response(array $data, int $status = 200): void {
    http_response_code($status);
    echo json_encode($data, JSON_PRETTY_PRINT);
    exit;
}

if ($path === '/api/health' && $method === 'GET') {
    json_response(['status' => 'ok', 'service' => 'agency-skillmind-api']);
}

if ($path === '/api/agents' && $method === 'GET') {
    json_response(['data' => $agents]);
}

if ($path === '/api/billing/usage' && $method === 'GET') {
    json_response([
        'data' => [
            'monthly_tokens' => 20000,
            'used_tokens' => 12400,
            'overtime_enabled' => false,
        ]
    ]);
}

if ($path === '/api/agents/custom-request' && $method === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true) ?? [];
    json_response([
        'message' => 'Custom agent request received.',
        'data' => [
            'company' => $input['company'] ?? null,
            'job_description' => $input['job_description'] ?? null,
        ]
    ], 201);
}

json_response([
    'error' => 'Not Found',
    'path' => $path,
], 404);
