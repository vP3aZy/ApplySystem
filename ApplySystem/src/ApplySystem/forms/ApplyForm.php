<?php

namespace ApplySystem\forms;

use ApplySystem\ApplySystem;
use CortexPE\DiscordWebhookAPI\Embed;
use CortexPE\DiscordWebhookAPI\Message;
use CortexPE\DiscordWebhookAPI\Webhook;
use jojoe77777\FormAPI\CustomForm;
use pocketmine\player\Player;
use pocketmine\Server;
use pocketmine\utils\SingletonTrait;

class ApplyForm {
    use SingletonTrait;

    public $bewerbung;

    public static function applyForm(Player $player) {
        $form = new CustomForm(function (Player $player, $data = null){
            if($data === null) {
                return;
            }

            if($data[1] === null) {
                $player->sendMessage(ApplySystem::getInstance()->messages->get("NoSlider"));
                return;
            }

            if($data[2] === null) {
                $player->sendMessage(ApplySystem::getInstance()->messages->get("NoInput1"));
                return;
            }

            if($data[3] === null) {
                $player->sendMessage(ApplySystem::getInstance()->messages->get("NoInput2"));
                return;
            }

            if($data[4] === null) {
                $player->sendMessage(ApplySystem::getInstance()->messages->get("NoInput3"));
                return;
            }

            if($data[5] === null) {
                $player->sendMessage(ApplySystem::getInstance()->messages->get("NoInput4"));
                return;
            }

            if($data[6] === null) {
                $player->sendMessage(ApplySystem::getInstance()->messages->get("NoInput5"));
                return;
            }

            $player->sendMessage(ApplySystem::getInstance()->messages->get("Successfull"));

            if(ApplySystem::getInstance()->config->get("DiscordWebhook") == false) {
                foreach (Server::getInstance()->getOnlinePlayers() as $onlinePlayer) {
                    if ($onlinePlayer->hasPermission("apply.see")) {
                        $player->sendMessage(str_replace("{Player}", $player->getName(), ApplySystem::getInstance()->messages->get("newApply")));
                        $player->sendMessage(str_replace("{Slider}", $data[1], ApplySystem::getInstance()->messages->get("ApplySlider")));
                        $player->sendMessage(str_replace("{Input1}", $data[2], ApplySystem::getInstance()->messages->get("ApplyInput1")));
                        $player->sendMessage(str_replace("{Input2}", $data[3], ApplySystem::getInstance()->messages->get("ApplyInput2")));
                        $player->sendMessage(str_replace("{Input3}", $data[4], ApplySystem::getInstance()->messages->get("ApplyInput3")));
                        $player->sendMessage(str_replace("{Input4}", $data[5], ApplySystem::getInstance()->messages->get("ApplyInput4")));
                        $player->sendMessage(str_replace("{Input5}", $data[6], ApplySystem::getInstance()->messages->get("ApplyInput5")));
                    }
                }
            }

            if(ApplySystem::getInstance()->config->get("DiscordWebhook") == true) {
                $webhook = new Webhook(ApplySystem::getInstance()->messages->get("Link"));
                $msg = new Message();
                $embed = new Embed();

                $msg->setUsername(ApplySystem::getInstance()->messages->get("Username"));
                $msg->setAvatarURL(ApplySystem::getInstance()->messages->get("AvatarURL"));

                $embed->setTitle(ApplySystem::getInstance()->messages->get("EmbedTitle"));
                $embed->addField("Player", str_replace("{Player}", $player->getName(), ApplySystem::getInstance()->messages->get("DApply")));
                $embed->addField("Age:", str_replace("{Slider}", $data[1], ApplySystem::getInstance()->messages->get("DApplySlider")));
                $embed->addField("Name:", str_replace("{Input1}", $data[2], ApplySystem::getInstance()->messages->get("DApplyInput1")));
                $embed->addField("Apply as:", str_replace("{Input2}", $data[3], ApplySystem::getInstance()->messages->get("DApplyInput2")));
                $embed->addField("Strenghs:", str_replace("{Input3}", $data[4], ApplySystem::getInstance()->messages->get("DApplyInput3")));
                $embed->addField("Weaknesses:", str_replace("{Input4}", $data[5], ApplySystem::getInstance()->messages->get("DApplyInput4")));
                $embed->addField("Why this Server?", str_replace("{Input5}", $data[6], ApplySystem::getInstance()->messages->get("DApplyInput5")));
                $embed->setFooter(ApplySystem::getInstance()->messages->get("EmbedFooter"));

                $msg->addEmbed($embed);
                $webhook->send($msg);
            }
        });
        $form->setTitle(ApplySystem::getInstance()->config->get("Title"));
        $form->addLabel(ApplySystem::getInstance()->config->get("Label"));
        $form->addSlider(ApplySystem::getInstance()->config->get("Slider"), 0, 30);
        $form->addInput(ApplySystem::getInstance()->config->get("Input1"));
        $form->addInput(ApplySystem::getInstance()->config->get("Input2"));
        $form->addInput(ApplySystem::getInstance()->config->get("Input3"));
        $form->addInput(ApplySystem::getInstance()->config->get("Input4"));
        $form->addInput(ApplySystem::getInstance()->config->get("Input5"));
        $form->sendToPlayer($player);
    }
}