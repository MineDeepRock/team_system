<?php


namespace team_system\models;


class TeamId
{
    private $id;

    public function __construct(string $id) {
        $this->id = $id;
    }

    static function asNew(): TeamId {
        return new TeamId(uniqid());
    }

    public function equal(?TeamId $id): bool {
        if ($id === null)
            return false;

        return $this->id === $id->getText();
    }

    /**
     * @return string
     */
    public function getText(): string {
        return $this->id;
    }
}