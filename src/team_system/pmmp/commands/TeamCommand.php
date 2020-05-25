<?php


use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\Plugin;
use team_system\services\PlayersServices;

class TeamCommand extends Command
{

    private $service;

    public function __construct(Plugin $owner, PlayersServices $service) {
        parent::__construct("team", "", "");
        $this->setPermission("Team.Command");

        $this->service = $service;
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): bool {

        if (count($args) === 0) {
            $sender->sendMessage("/team [args]");
            return true;
        }
        $senderName = $sender->getName();
        $method = $args[0];
        switch ($method) {
            case "join":
                //$this->service->joinGame($senderName);
                break;
            case "quit":
                $this->service->quitGame($senderName);
                break;
        }
        return true;
    }

}