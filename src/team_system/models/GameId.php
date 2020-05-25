<?php


namespace team_system\models;


class GameId
{
    private $id;

    public function __construct(string $id) {
        $this->id = $id;
    }

    static function asNew(): GameId {
        return new GameId(uniqid());
    }

    public function equal(?GameId $id): bool {
        if ($id === null)
            return false;

        return $this->id === $id->id;
    }

    /**
     * @return string
     */
    public function getText(): string {
        return $this->id;
    }
}