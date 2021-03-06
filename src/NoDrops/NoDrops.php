<?php
namespace NoDrops;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class NoDrops extends PluginBase implements Listener
{

    public function onEnable()
    {

        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info("Abilitato");
      @mkdir($this->getDataFolder());
        $wconfig = new Config($this->getDataFolder(). "config.yml",Config::YAML, array(
            "Mondi dove il drop è disabilitato" => "world"

        ));

        $wconfig->save();

    }

public function onDeath(PlayerDeathEvent $event){
   $wconfig = new Config($this->getDataFolder()."config.yml", Config::YAML);


 if(in_array($event->getPlayer()->getLevel()->getName(), [$wconfig->get("Mondi dove il drop è disabilitato")])){
        $event->setDrops([]);
    }
  }
}
