<?php

  namespace DonateInfo;

  use pocketmine\plugin\PluginBase;
  use pocketmine\utils\TextFormat as TF;
  use pocketmine\utils\Config;
  use pockemtine\command\CommandSender;
  use pocketmine\command\Command;
  use pocketmine\Player;

  class Main extends PluginBase
  {

    public function onEnable()
    {

      @mkdir($this->getDataFolder());

      $this->cfg = new Config($this->getDataFolder() . "config.yml", Config::YAML, array("message" => "Donate on PayPal @ me@example.com"));

      $this->getLogger()->info(TextFormat::GREEN . "Enabled.");

    }

    public function onCommand(CommadnSender $sender, Command $cmd, $label, array $args)
    {

      switch($cmd->getName())
      {

        case "donate":

          $message = $this->cfg->get("message");

          $sender->sendMessage($message);

          return true;

        break;

      }

    }

    public function onDisable()
    {

      $this->getLogger()->info(TextFormat::RED . "Disabled.");

    }

  }

?>
