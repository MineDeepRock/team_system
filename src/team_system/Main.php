<?php

namespace team_system;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\plugin\PluginBase;
use team_system\services\PlayerDataServices;

class Main extends PluginBase implements Listener
{
    /**
     * @var PlayerDataServices
     */
    public $playerDataService;

    public function onEnable() {
        $this->playerDataService = new PlayerDataServices();
        new TeamSystem($this->playerDataService);
        $this->getServer()->getPluginManager()->registerEvents($this,$this);
    }

    public function onJoin(PlayerJoinEvent $event) {
        $player = $event->getPlayer();
        $this->playerDataService->register($player->getName());
    }

    public function onQuit(PlayerQuitEvent $event) {
        $player = $event->getPlayer();
        $this->playerDataService->delete($player->getName());
    }
}