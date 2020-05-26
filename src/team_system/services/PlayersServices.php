<?php

namespace team_system\services;


use team_system\models\GameId;
use team_system\models\Player;
use team_system\models\TeamId;
use team_system\repositories\PlayersRepository;

class PlayersServices
{
    private $repository;

    public function __construct() {
        $this->repository = new PlayersRepository();
    }

    public function register(string $name): void {
        $this->repository->register($name);
    }

    public function logout(string $name): void {
        $this->repository->logout($name);
    }

    public function joinGame(string $name, TeamId $teamId, GameId $gameId): void {
        $this->repository->joinGame($name, $teamId->getText(), $gameId->getText());
    }

    public function quitGame(string $name): void {
        $this->repository->quitGame($name);
    }

    public function getPlayer(string $name): Player {
        return $this->repository->getPlayer($name);
    }

    public function getPlayers(): array {
        return self::getPlayers();
    }

    public function getTeamPlayers(TeamId $teamId): array {
        return self::getTeamPlayers($teamId);
    }

    public function getParticipants(GameId $gameId): array {
        return self::getParticipants($gameId);
    }
}