<?php
namespace: iBa4x;
# this plugin by iBa4x
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\math\Vector3;
use pocketmine\utils\TextFormat;

class Main extends PluginBase implements Listener{
  public function onEnable(){
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    $this->getLogger()->info(TextFormat::GREEN . "By iBa4x");
    @mkdir($this->getDataFolder());
    $config = new Config($this->getDataFolder()."config.yml",Config::YAML);
  }
  
}
