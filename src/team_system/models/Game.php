<?php


namespace team_system\models;


class Game
{
    /**
     * @var GameId
     */
    private $id;


    public function __construct(GameId $id) {
        $this->id = $id;
    }

    static function asNew(): Game {
        return new Game(GameId::asNew());
    }

    /**
     * @return GameId
     */
    public function getId(): GameId {
        return $this->id;
    }
}