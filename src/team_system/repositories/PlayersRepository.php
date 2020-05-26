<?php


namespace team_system\repositories;


use team_system\models\GameId;
use team_system\models\Player;
use team_system\models\TeamId;

class PlayersRepository
{
    private $path;

    public function __construct() {
        $this->path = ".\plugin_data\TeamSystem\players\\";
    }

    public function register(string $name): void {
        $player = new Player($name);
        $data = json_encode($player->toJson());
        file_put_contents($this->path . $name . ".json", $data);
    }

    public function logout(string $name): void {
        if (file_exists($this->path . $name . ".json")) {
            unlink($this->path . $name . ".json");
        }
    }

    public function joinGame(string $name, string $teamId, string $gameId): void {
        $player = new Player($name, new TeamId($teamId), new GameId($gameId));
        file_put_contents($this->path . $name . ".json", json_encode($player->toJson()));
    }

    public function quitGame(string $name): void {
        $player = new Player($name, null, null);
        file_put_contents($this->path . $name . ".json", json_encode($player->toJson()));
    }

    public function getPlayer(string $name): Player {
        $data = json_decode(file_get_contents($this->path . $name . ".json"), true);
        return Player::fromJson($data);
    }

    public function getPlayers(): array {
        $players = [];
        $dh = opendir($this->path);
        while (($fileName = readdir($dh)) !== false) {
            if (filetype($this->path . $fileName) === "file") {
                $data = json_decode(file_get_contents($this->path . $fileName), true);
                $players[] = Player::fromJson($data);
            }
        }
        closedir($dh);

        return $players;
    }

    public function getTeamPlayers(TeamId $teamId): array {
        $players = [];

        foreach ($this->getPlayers() as $player) {
            if ($player->getBelongTeamId() !== null) {
                if ($player->getBelongTeamId()->equal($teamId)) {
                    $players[] = $player;
                }
            }
        }

        return $players;
    }

    public function getParticipants(GameId $gameId): array {
        $players = [];

        foreach ($this->getPlayers() as $player) {
            if ($player->getBelongTeamId() !== null) {
                if ($player->getJoinedGameId()->equal($gameId)) {
                    $players[] = $player;
                }
            }
        }
        return $players;
    }
}