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
    /**
     * @var bool
     */
    private $isOpen = false;

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
        $this->isOpen = true;
    }

    public function close(): void {
        $this->isOpen = false;
    }

    /**
     * @return bool
     */
    public function isStarted(): bool {
        return $this->isStarted;
    }

    /**
     * @return bool
     */
    public function isOpen(): bool {
        return $this->isOpen;
    }
}