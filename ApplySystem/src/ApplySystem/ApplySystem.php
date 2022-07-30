<?php

namespace ApplySystem;

use ApplySystem\commands\ApplyCommand;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\utils\SingletonTrait;

class ApplySystem extends PluginBase {
    use SingletonTrait;

    public $config;
    public $messages;

    public function onLoad(): void {
        self::setInstance($this);
    }

    public function onEnable(): void {
        $this->saveResource("config.yml");
        $this->saveResource("messages.yml");
        $this->config = (new Config($this->getDataFolder() . "config.yml", Config::YAML, []));
        $this->messages = (new Config($this->getDataFolder() . "messages.yml", Config::YAML, []));
        $this->getServer()->getCommandMap()->register("apply", new ApplyCommand());
    }
}