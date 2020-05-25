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
    public static $playersService;

    public function __construct(PlayersServices $playersService) {
        self::$playersService = $playersService;
    }

    static function joinGame(string $name, TeamId $teamId, GameId $gameId): void {
    }

    static function quitGame(string $name): void {
        self::$playersService->quitGame($name);
    }

    static function getPlayer(string $name): Player {
        return self::$playersService->getPlayer($name);
    }

    static function getPlayers(): void {
        //TODO
    }

    static function getTeamPlayers(TeamId $teamId): void {
        //TODO
    }

    static function getParticipants(GameId $gameId): void {
        //TODO
    }
}