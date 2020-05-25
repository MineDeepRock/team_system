<?php

namespace team_system;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\plugin\PluginBase;
use team_system\services\PlayersServices;

class Main extends PluginBase implements Listener
{
    /**
     * @var PlayersServices
     */
    public $playersService;

    public function onEnable() {
        $this->playersService = new PlayersServices();
        new TeamSystem($this->playersService);
        $this->getServer()->getPluginManager()->registerEvents($this,$this);
    }

    public function onJoin(PlayerJoinEvent $event) {
        $player = $event->getPlayer();
        $this->playersService->register($player->getName());
    }

    public function onQuit(PlayerQuitEvent $event) {
        $player = $event->getPlayer();
        $this->playersService->logout($player->getName());
    }
}