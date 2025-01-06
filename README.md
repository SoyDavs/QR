# QR

**QR** is a PocketMine-MP plugin that allows players to generate QR codes and display them on in-game maps using the ImageOnMap plugin.

## Features
- Generate QR codes from any text provided by the player.
- Display the generated QR codes on maps that can be scanned using a mobile device.
- Uses the QuickChart API to create QR codes quickly and efficiently.

## Requirements
- PocketMine-MP API 5.0.0
- [ImageOnMap plugin](https://poggit.pmmp.io/p/ImageOnMap) for displaying QR codes on maps.

## Installation
1. Download the latest release of **QRPlugin** from the [Releases](#) section.
2. Ensure you have the **ImageOnMap** plugin installed on your PocketMine-MP server.
3. Place the downloaded `QRPlugin.phar` file into the `plugins` folder of your PocketMine-MP server.
4. Restart your server.

## Usage
1. Join the game and use the `/qrcode <text>` command.
2. The plugin will generate a QR code and give you a map item containing the QR code.
3. Open your inventory and hold the map to view the QR code.
4. Scan the QR code using a mobile device to access the encoded information.

## Commands
| Command         | Description                       | Usage              | Permission                |
|-----------------|-----------------------------------|--------------------|---------------------------|
| `/qrcode <text>`| Generates a QR code on a map     | `/qrcode Hello!`  | `qrplugin.command.qrcode` |

## Permissions
| Permission                | Description                        | Default |
|---------------------------|------------------------------------|---------|
| `qrplugin.command.qrcode` | Allows using the `/qrcode` command | `true`  |

## Configuration
No configuration is required. Simply install the plugin and start using it!

## License
This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

## Credits
- Developed by **SoyDavs**.
- QR code generation powered by [QuickChart](https://quickchart.io/qr/).
- Map rendering provided by [ImageOnMap](https://poggit.pmmp.io/p/ImageOnMap).

