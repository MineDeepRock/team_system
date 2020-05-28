<?php


namespace team_system\models;


class Game
{
    /**
     * @var GameId
     */
    private $id;
    /**
     * @var bool
     */
    private $isStarted = false;


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

    public function start(): void {
        $this->isStarted = true;
    }

    /**
     * @return bool
     */
    public function isStarted(): bool {
        return $this->isStarted;
    }
}