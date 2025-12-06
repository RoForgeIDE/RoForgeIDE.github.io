<?php
header("Content-Type: application/json");

// 1. Receive user code
$data = json_decode(file_get_contents("php://input"), true);
$phpCode = $data['code'] ?? '';

// 2. Reset LuaBuilder static state
include_once __DIR__ . '/../../Libraries/php/Main.php';
$reflect = new ReflectionClass('LuaBuilder');
$prop = $reflect->getProperty('lines');
$prop->setAccessible(true);
$prop->setValue([]);
$propCounter = $reflect->getProperty('varCounter');
$propCounter->setAccessible(true);
$propCounter->setValue(0);

// 3. Execute user code in a sandboxed function
$luaOutput = '';
try {
    // Using anonymous function to avoid polluting global scope
    $sandbox = function() use ($phpCode) {
        eval($phpCode);  // WARNING: evaluate safely in production
    };
    $sandbox();

    $luaOutput = LuaBuilder::getLua();
} catch (Throwable $e) {
    $luaOutput = "-- Error: " . $e->getMessage();
}

// 4. Return Lua
echo json_encode([
    'lua' => $luaOutput
]);
