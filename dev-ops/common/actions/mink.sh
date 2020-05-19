#!/usr/bin/env bash

TEMPLATE: ./../templates/config-mink.php:./../../../config.php

cat config.php
cat tests/Mink/behat.yml

# Disable cookie consent manager
./bin/console dbal:run-sql 'UPDATE s_core_config_elements SET value = "b:0;" WHERE name = "show_cookie_note"'

# Generate sitemap
./bin/console sw:generate:sitemap
