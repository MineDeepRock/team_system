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

    public function toJson(): array {
        return [
            "name" => $this->name,
            "belong_team_id" => $this->belongTeamId === null ? null : $this->belongTeamId->getText(),
            "joined_game_id" => $this->joinedGameId === null ? null : $this->joinedGameId->getText(),
        ];
    }

    public static function fromJson(array $json): Player {
        return new Player(
            $json["name"],
            $json["belong_team_id"] === null ? null : new TeamId($json["belong_team_id"]),
            $json["joined_game_id"] === null ? null : new GameId($json["joined_game_id"])
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