<?php


namespace team_system;


use team_system\models\GameId;
use team_system\models\Player;
use team_system\models\TeamId;
use team_system\services\PlayersServices;

class TeamSystem
{
    /**
     * @var PlayersServices
     */
    private static $playersService;
    private static $instance;

    public function __construct(PlayersServices $playersService) {
        self::$playersService = $playersService;
        self::$instance = $this;
    }

    static function joinGame(string $name, TeamId $teamId, GameId $gameId): void {
        self::$playersService->joinGame($name, $teamId, $gameId);
    }

    static function quitGame(string $name): void {
        self::$playersService->quitGame($name);
    }

    static function getPlayer(string $name): Player {
        return self::$playersService->getPlayer($name);
    }

    static function getPlayers(): array {
        return self::$playersService->getPlayers();

    }

    static function getTeamPlayers(TeamId $teamId): array {
        return self::$playersService->getTeamPlayers($teamId);
    }

    static function getParticipants(GameId $gameId): array {
        return self::$playersService->getParticipants($gameId);
    }

    /**
     * @return TeamSystem
     */
    public static function getInstance(): TeamSystem {
        return self::$instance;
    }
}