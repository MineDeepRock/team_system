<?php


namespace team_system\models;


class Game
{
    /**
     * @var GameId
     */
    private $id;
    /**
     * @var TeamId
     */
    private $redTeamId;
    /**
     * @var TeamId
     */
    private $blueTeamId;

    public function __construct(GameId $id, TeamId $redTeamId, TeamId $blueTeamId) {
        $this->id = $id;
        $this->redTeamId = $redTeamId;
        $this->blueTeamId = $blueTeamId;
    }

    static function asNew(): Game {
        return new Game(GameId::asNew(), TeamId::asNew(), TeamId::asNew());
    }

    /**
     * @return GameId
     */
    public function getId(): GameId {
        return $this->id;
    }

    /**
     * @return TeamId
     */
    public function getRedTeamId(): TeamId {
        return $this->redTeamId;
    }

    /**
     * @return TeamId
     */
    public function getBlueTeamId(): TeamId {
        return $this->blueTeamId;
    }
}