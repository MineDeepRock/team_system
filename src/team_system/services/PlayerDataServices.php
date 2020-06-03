<?php

namespace team_system\services;


use team_system\models\GameId;
use team_system\models\PlayerData;
use team_system\models\TeamId;
use team_system\repositories\PlayerDataRepository;

class PlayerDataServices
{
    private $repository;

    public function __construct() {
        $this->repository = new PlayerDataRepository();
    }

    public function register(string $name): void {
        $playerData = new PlayerData($name);
        $this->repository->register($playerData);
    }

    public function delete(string $name): void {
        $playerData = $this->getPlayerData($name);
        $this->repository->delete($playerData);
    }

    public function joinGame(string $name, TeamId $teamId, GameId $gameId): void {
        $playerData = new PlayerData($name, new TeamId($teamId), new GameId($gameId));
        $this->repository->update($playerData);
    }

    public function quitGame(string $name): void {
        $playerData = new PlayerData($name, null, null);
        $this->repository->update($playerData);
    }

    public function getPlayerData(string $name): PlayerData {
        return $this->repository->get($name);
    }

    public function getAllPlayerData(): array {
        return $this->repository->getAll();
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