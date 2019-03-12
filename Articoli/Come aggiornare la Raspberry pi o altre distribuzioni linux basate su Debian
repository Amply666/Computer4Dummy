#!/bin/bash

logger "Script di Aggiornamento: INIZIO..."

echo '[*] Aggiornamento repository cache...'
sudo apt-get update -y
echo '[*] Repository cache Aggiornata.'

echo '[*] Aggiornamento di tutti i pacchetti esistenti...'
sudo apt-get upgrade -y
echo '[*] Pacchetti esistenti aggiornati.'

echo '[*] Aggiornamento distribuzione Linux (se diponibile)...'
sudo apt-get dist-upgrade -y
echo '[*] Aggiornamento distribuzione Linux verificata.'

echo '[*] Pulizia dei pacchetti cache non utilizzati...'
sudo apt-get autoclean -y
sudo apt-get autoremove -y
echo '[*] Pulizia pacchetti cache terminata.'

if [ $(which raspi-config | wc -l) -gt 0 ]; then
        echo '[*] Raspberry Pi Trovata.'
        echo '[*] Aggiornamento Raspberry Pi firmware (ultimo disponibile...)'
        sudo rpi-update
        echo '[*] Aggiornamento firmware terminato.'
fi

logger "Script di aggiornamento terminato!"

while true; do
        read -r -p "Vuoi riavviare il sistema? " choice
        case "$choice" in
                s|S ) echo "[*] Riavvio..."; sudo reboot; break;;
                n|N ) echo "[*] OK."; break;;
                * ) echo "[-] Risposta sbagliata . Usa 's' o 'n'.";;
        esac
done
