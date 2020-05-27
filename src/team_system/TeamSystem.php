<?php


namespace team_system;


use team_system\models\GameId;
use team_system\models\PlayerData;
use team_system\models\TeamId;
use team_system\services\PlayerDataServices;

class TeamSystem
{
    /**
     * @var PlayerDataServices
     */
    private static $playersService;
    private static $instance;

    public function __construct(PlayerDataServices $playersService) {
        self::$playersService = $playersService;
        self::$instance = $this;
    }

    static function joinGame(string $name, TeamId $teamId, GameId $gameId): void {
        self::$playersService->joinGame($name, $teamId, $gameId);
    }

    static function quitGame(string $name): void {
        self::$playersService->quitGame($name);
    }

    static function getPlayerData(string $name): PlayerData {
        return self::$playersService->getPlayerData($name);
    }

    static function getAllPlayerData(): array {
        return self::$playersService->getAllPlayerData();

    }

    static function getTeamPlayerData(TeamId $teamId): array {
        return self::$playersService->getTeamPlayerData($teamId);
    }

    static function getParticipantData(GameId $gameId): array {
        return self::$playersService->getParticipantData($gameId);
    }

    /**
     * @return TeamSystem
     */
    public static function getInstance(): TeamSystem {
        return self::$instance;
    }
}