<?php

namespace ApplySystem\commands;

use ApplySystem\ApplySystem;
use ApplySystem\forms\ApplyForm;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;

class ApplyCommand extends Command {

    public function __construct() {
        parent::__construct(ApplySystem::getInstance()->config->get("Command"), ApplySystem::getInstance()->config->get("Description"), ApplySystem::getInstance()->config->get("Usage"), []);
    }

    public function execute(CommandSender $p, string $commandLabel, array $args) {
         if(!$p instanceof Player) {
             $p->sendMessage("§4Error!");
         }
         ApplyForm::applyForm($p);
    }
}