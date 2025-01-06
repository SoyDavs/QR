<?php

namespace SoyDavs\QRPlugin;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use pocketmine\utils\TextFormat;
use czechpmdevs\imageonmap\ImageOnMap;
use czechpmdevs\imageonmap\item\FilledMap;

class QRPlugin extends PluginBase implements Listener {

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool {
        if (strtolower($command->getName()) === "qrcode") {
            if (!$sender instanceof Player) {
                $sender->sendMessage(TextFormat::RED . "This command can only be used in-game.");
                return false;
            }
            if (count($args) < 1) {
                $sender->sendMessage(TextFormat::RED . "Usage: /qrcode <text>");
                return false;
            }

            $text = implode(" ", $args);
            $qrUrl = "https://quickchart.io/qr?text=" . urlencode($text) . "&size=300";

            try {
                // Descargar la imagen del QR y guardarla en el directorio del plugin
                $imagePath = $this->getDataFolder() . "qrcode.png";
                $this->downloadImage($qrUrl, $imagePath);

                // Obtener instancia de ImageOnMap
                $api = ImageOnMap::getInstance();

                // Cargar la imagen y obtener el ID del mapa
                $id = $api->getImageFromFile(
                    file: $imagePath,
                    xChunkCount: 1,
                    yChunkCount: 1,
                    xOffset: 0,
                    yOffset: 0
                );

                // Crear el mapa y dárselo al jugador
                $map = (FilledMap::get())->setMapId($id);
                $sender->getInventory()->addItem($map);

                $sender->sendMessage(TextFormat::GOLD . "QR code generated and added to your inventory.");
            } catch (\Exception $e) {
                $sender->sendMessage(TextFormat::RED . "Error generating QR code: " . $e->getMessage());
            }
            return true;
        }
        return false;
    }

    private function downloadImage(string $url, string $savePath): void {
        $imageData = file_get_contents($url);
        if ($imageData === false) {
            throw new \RuntimeException("Failed to download QR code image.");
        }
        file_put_contents($savePath, $imageData);
    }
}
