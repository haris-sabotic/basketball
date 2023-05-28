<?php
require_once '../db.php';

$player = DB::querySingle("SELECT * FROM players WHERE id = ?;", [$_GET["player_id"]]);
echo json_encode($player);
