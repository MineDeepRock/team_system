<?php


namespace team_system\repositories;


use team_system\models\GameId;
use team_system\models\PlayerData;
use team_system\models\TeamId;

class PlayerDataRepository
{
    private $path;

    public function __construct() {
        $this->path = ".\plugin_data\TeamSystem\players\\";
    }

    public function register(string $name): void {
        $player = new PlayerData($name);
        $data = json_encode($player->toJson());
        file_put_contents($this->path . $name . ".json", $data);
    }

    public function delete(string $name): void {
        if (file_exists($this->path . $name . ".json")) {
            unlink($this->path . $name . ".json");
        }
    }

    public function joinGame(string $name, string $teamId, string $gameId): void {
        $player = new PlayerData($name, new TeamId($teamId), new GameId($gameId));
        file_put_contents($this->path . $name . ".json", json_encode($player->toJson()));
    }

    public function quitGame(string $name): void {
        $player = new PlayerData($name, null, null);
        file_put_contents($this->path . $name . ".json", json_encode($player->toJson()));
    }

    public function getPlayerData(string $name): PlayerData {
        $data = json_decode(file_get_contents($this->path . $name . ".json"), true);
        return PlayerData::fromJson($data);
    }

    public function getAllPlayerData(): array {
        $players = [];
        $dh = opendir($this->path);
        while (($fileName = readdir($dh)) !== false) {
            if (filetype($this->path . $fileName) === "file") {
                $data = json_decode(file_get_contents($this->path . $fileName), true);
                $players[] = PlayerData::fromJson($data);
            }
        }
        closedir($dh);

        return $players;
    }

    public function getTeamPlayerData(TeamId $teamId): array {
        $players = [];

        foreach ($this->getAllPlayerData() as $player) {
            if ($player->getBelongTeamId() !== null) {
                if ($player->getBelongTeamId()->equal($teamId)) {
                    $players[] = $player;
                }
            }
        }

        return $players;
    }

    public function getParticipantData(GameId $gameId): array {
        $players = [];

        foreach ($this->getAllPlayerData() as $player) {
            if ($player->getBelongTeamId() !== null) {
                if ($player->getJoinedGameId()->equal($gameId)) {
                    $players[] = $player;
                }
            }
        }
        return $players;
    }
}