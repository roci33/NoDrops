<?php
namespace NoDrops;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;

class NoDrops extends PluginBase implements Listener
{

    public function onEnable()
    {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info("Abilitato");
    }

public function onDeath(PlayerDeathEvent $event){
    if(in_array($event->getPlayer()->getLevel()->getName(), ["fps", "mondo2"])){
        $event->setDrops([]);
    }
  }
}
