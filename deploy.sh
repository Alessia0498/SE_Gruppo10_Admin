#!/bin/bash

SERVER_ADDRESS="167.99.254.2"
ssh -t root@${SERVER_ADDRESS} "su - arma -c 'cd /var/www/SE_Gruppo10_Admin && git fetch --all && git pull --force && git checkout develop'"
