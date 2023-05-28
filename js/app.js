const POSITIONS = {
    "PG": "Point Guard",
    "SG": "Shooting Guard",
    "SF": "Small Forward",
    "PF": "Power Forward",
    "C": "Center",
};

function playerPreviewHTML(data) {
    return "<p class=\"player\" onclick=\"loadPlayerInfo(" + data.id + ")\">" + data.name + "</p>"
}

function playerInfoHTML(data) {
    return "\
    <img src=\"" + ((data.photo != "") ? data.photo : "https://placeholder.co/350x300") + "\" alt=\"headshot\" class=\"headshot\">\
    <p class=\"name\"><strong>Name:</strong> " + data.name + "</p>\
    <p class=\"position\"><strong>Position:</strong> " + POSITIONS[data.position] + "</p>\
    ";
}

function loadPlayers(teamID) {
    $.get("api/players.php?team_id=" + teamID, function (data, status) {
        $("#container-players").removeClass("invisible");
        $("#container-player-info").addClass("invisible");

        $("#container-players .content").html(JSON.parse(data).map(playerPreviewHTML).join(""));
    });
}

function loadPlayerInfo(playerID) {
    $.get("api/player_info.php?player_id=" + playerID, function (data, status) {
        $("#container-player-info").removeClass("invisible");

        $("#container-player-info .content").html(playerInfoHTML(JSON.parse(data)));
    });
}