<?php
require_once 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();
try {
    echo "Players table rows:\n";
    $players = DB::table('players')->get();
    foreach($players as $player) {
        echo "- player_id: {$player->player_id}, full_name: {$player->full_name}\n";
    }
    if (count($players) === 0) {
        echo "No player profiles found.\n";
    }
} catch(Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}