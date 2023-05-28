<?php
require_once '../db.php';

$players = DB::queryAll("SELECT id, name FROM players WHERE team_id = ?;", [$_GET["team_id"]]);
echo json_encode($players);
