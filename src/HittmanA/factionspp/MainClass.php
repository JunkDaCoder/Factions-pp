<?php

namespace HittmanA\factionspp;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat;
use pocketmine\utils\Config;

class MainClass extends PluginBase implements Listener {

    public function onEnable() {
        @mkdir($this->getDataFolder());
        $this->saveResource("factions.json");
        $this->facs = new Config($this->getDataFolder() . "factions.json", Config::JSON);
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getServer()->getPluginManager()->registerEvents(new Events($this), $this);
        $this->getLogger()->info(TextFormat::YELLOW . "[FactionsPP] Loaded!");
    }

    public function onDisable() {
        $this->getLogger()->info(TextFormat::YELLOW . "[FactionsPP] Unloading!");
    }
##BASIC FILE SAVING METHODS IMPLMENT \FACTIONS FOLDER SOON
    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
    if($cmd->getName() == "factionspp"){
        if(empty($args)){
            $sender->sendMessage("Soon");
        }
        if(count($args == 2)){
            if($args[0] == "create"){
                if(!isset($args[1])){
                    $sender->sendmessage("do /f create (name)");
                }else{
                     $file = ($this->getDataFolder().$args[1].".json");
                    if(!file_exists($file)){
                $this->facs = new Config($this->getDataFolder() . $args[1].".json", Config::JSON);
                $cfgfac = $args[1];
                $this->facs->set("Name", $args[1]);
                $this->facs->set("Leader", $sender->getName());
                $this->facs->set("Officers", array());
                $this->facs->set("Members", array());
                $this->facs->save();
                $sender->sendmessage("faction made dawg");
            }
        }
    }

}
}
}

}
