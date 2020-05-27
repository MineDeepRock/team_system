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
        $this->repository->register($name);
    }

    public function delete(string $name): void {
        $this->repository->delete($name);
    }

    public function joinGame(string $name, TeamId $teamId, GameId $gameId): void {
        $this->repository->joinGame($name, $teamId->getText(), $gameId->getText());
    }

    public function quitGame(string $name): void {
        $this->repository->quitGame($name);
    }

    public function getPlayerData(string $name): PlayerData {
        return $this->repository->getPlayerData($name);
    }

    public function getAllPlayerData(): array {
        return $this->repository->getAllPlayerData();
    }

    public function getTeamPlayerData(TeamId $teamId): array {
        return $this->repository->getTeamPlayerData($teamId);
    }

    public function getParticipantData(GameId $gameId): array {
        return $this->repository->getParticipantData($gameId);
    }
}