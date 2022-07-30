# ApplySystem
## >> Information:
 - This plugin applications to your Server!
## >> Features:
- Everything is configurable in config.yml
- All messages are configurable in messages.yml
- Setup the command, your own
- Discord webhook support in config.yml
## >> Permissions:
```yaml
permissions:
  apply.see:
    default: OP
```
## >> Command:
- You can setup the command, your own -> config.yml

## >> Config.yml:
```yaml

#Config by vP3aZy

#Here you can setup the command!
Command: "apply"
Description: "Opens the apply form!"
Usage: "/apply"

############################################################################################

#Here you can setup the Form
Title: "§bBewerben§7:"
Label: "§7Hier kannst du dich bewerben, fülle bitte alles aus!"
Slider: "§eAge§7: §f"
Input1: "§3Name?"
Input2: "§3As what do you want to Apply?"
Input3: "§3Strengthen?"
Input4: "§3Weaknesses?"
Input5: "§3Why YourServer.net?"

############################################################################################

#Do you want to use Discord Webhook? [true, false]
DiscordWebhook: true

```

## >> Messages.yml:
```yaml

#Messages by vP3aZy

#Here you can set the error messages!
NoSlider: "§cNo age given!"
NoInput1: "§cNo name given!"
NoInput2: "§cNo Input given!"
NoInput3: "§cNo Input given!"
NoInput4: "§cNo Input given!"
NoInput5: "§cno Input given!"

############################################################################################

#Here you can set the success message!
Successfull: "§aYour Applycation was successfully sended!"

############################################################################################

#If you choose DiscordWebhook false setup this!
#You can use [ {Slider}, {Input1}, {Input2}, {Input3}, {Input4}, {Input5}, {Player} ]
newApply: "§aA new Applycation from §e{Player}§a!"
ApplySlider: "§fHis age§7: §e{Slider}"
ApplyInput1: "§fHis name§7: §e{Input1}"
ApplyInput2: "§fApply as§7: §e{Input2}"
ApplyInput3: "§fHis Strengthen§7: §e{Input3}"
ApplyInput4: "§fHis Weaknesses§7: §e{Input4}"
ApplyInput5: "§fWhy YourServer.net?§7: §e{Input5}"

############################################################################################

#Here you can setup the DiscordEmbed, if you choose false, leave it empty!
Link: ""
Username: ""
AvatarURL: ""

#If you choose DiscordWebhook true setup this!
#You can use [ {Slider}, {Input1}, {Input2}, {Input3}, {Input4}, {Input5}, {Player} ]
EmbedTitle: "New Apply!"
DApply: "A new Applycation from {Player}!"
DApplySlider: "His age: {Slider}"
DApplyInput1: "His name: {Input1}"
DApplyInput2: "Apply as: {Input2}"
DApplyInput3: "His Strengthen: {Input3}"
DApplyInput4: "His Weaknesses: {Input4}"
DApplyInput5: "Why YourServer.net?: {Input5}"
EmbedFooter: "Yes or No?"

```
