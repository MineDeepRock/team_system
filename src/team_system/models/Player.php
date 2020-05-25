<?php


namespace team_system\models;


class Player
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var TeamId|null
     */
    private $belongTeamId;
    /**
     * @var GameId|null
     */
    private $joinedGameId;

    public function __construct(string $name, TeamId $belongTeamId = null, GameId $joinedGameId = null) {
        $this->name = $name;
        $this->belongTeamId = $belongTeamId;
        $this->joinedGameId = $joinedGameId;
    }

    public function toJson(): string {
        $name = "\"" . $this->name . "\"";
        $belongTeamId = $this->belongTeamId === null ? "null" : "\"" . $this->belongTeamId->getText() . "\"";
        $joinedGameId = $this->joinedGameId === null ? "null" : "\"" . $this->joinedGameId->getText() . "\"";
        return "{\"name\":{$name},\"belong_team_id\":{$belongTeamId},\"joined_game_id\":{$joinedGameId}}";
    }

    public static function fromJson(array $json): Player {
        return new Player(
            $json["name"],
            new TeamId($json["belong_team_id"]),
            new GameId($json["joined_game_id"])
        );
    }

    /**
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * @return TeamId|null
     */
    public function getBelongTeamId(): ?TeamId {
        return $this->belongTeamId;
    }

    /**
     * @return GameId|null
     */
    public function getJoinedGameId(): ?GameId {
        return $this->joinedGameId;
    }
}