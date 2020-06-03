<?php


namespace team_system\repositories;


use team_system\models\PlayerData;

class PlayerDataRepository
{
    private $path;

    public function __construct() {
        $this->path = ".\plugin_data\TeamSystem\players\\";
    }

    public function register(PlayerData $playerData): void {
        file_put_contents($this->path . $playerData->getName() . ".json", json_encode($playerData->toJson()));
    }

    public function delete(PlayerData $playerData): void {
        if (file_exists($this->path . $playerData->getName() . ".json")) {
            unlink($this->path . $playerData->getName() . ".json");
        }
    }

    public function update(PlayerData $playerData): void {
        file_put_contents($this->path . $playerData->getName() . ".json", json_encode($playerData->toJson()));
    }

    public function get(string $name): PlayerData {
        $data = json_decode(file_get_contents($this->path . $name . ".json"), true);
        return PlayerData::fromJson($data);
    }

    public function getAll(): array {
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
}