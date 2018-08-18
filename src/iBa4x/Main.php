<?php
namespace: iBa4x;
# this plugin by iBa4x
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\math\Vector3;
use pocketmine\utils\TextFormat;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;

class Main extends PluginBase implements Listener{
  public function onEnable(){
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    $this->getLogger()->info(TextFormat::GREEN . "By iBa4x");
    @mkdir($this->getDataFolder());
    $config = new Config($this->getDataFolder()."config.yml",Config::YAML);
  }
  public function onCommand(CommandSender $sender,Command $command, $label,array $args){
		switch($command->getName()){
			case "Join":
				$name = $sender->getPlayer()->getName();
				$config = new Config($this->getDataFolder()."config.yml",Config::YAML);
        
			return true;
		}
	}
  public function onDeath(PlayerDeathEvent $event){
		$entity = $event->getEntity();
		$cause = $entity->getLastDamageCause();
		if($entity instanceof Player){
			$name = $entity->getName();
			$deaths = new Config($this->getDataFolder()."config.yml",Config::YAML);
      $deaths->set($name,$deaths->get($name) - 2);
			$deaths->save();
		}
		if($cause instanceof EntityDamageByEntityEvent){
			$killer = $event->getEntity()->getLastDamageCause()->getDamage();
			if($killer instanceof Player){
				$kills = new Config($this->getDataFolder()."config.yml",Config::YAML);
				$name = $killer->getName();
				$kills->set($name,$kills->get($name) + 1);
				$kills->save();
				}
			}
		}
	}
}
