<?php


namespace team_system\models;


class Game
{
    private $id;
    private $redTeamId;
    private $blueTeamId;

    public function __construct(GameId $id, int $redTeamId, int $blueTeamId) {
        $this->id = $id;
        $this->redTeamId = $redTeamId;
        $this->blueTeamId = $blueTeamId;
    }

    /**
     * @return GameId
     */
    public function getId(): GameId {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getRedTeamId(): int {
        return $this->redTeamId;
    }

    /**
     * @return int
     */
    public function getBlueTeamId(): int {
        return $this->blueTeamId;
    }
}