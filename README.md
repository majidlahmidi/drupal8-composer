# Composer template for Drupal projects

Steps to follow :

1. git clone https://github.com/drupal-composer/drupal-project.git drupal8-folder 

2. Modify composer.json if necessary

3. cd drupal8-folder && composer install

4. other commands

chmod -R 775 .
chgrp -R apache .  

Execute this command :

vendor/bin/drush site-install standard --account-name=admin --account-pass=admin --db-url=mysql://root:root@mysql_server/drupal8 -y
   Or 
visit the website url and follow the instructions

5. To install a contrib module with composer use this :

composer require "drupal/token:1.x-dev"

6. Drush

No need to install drush, use instead this command :

vendor/bin/drush

7. Drupal Console

vendor/bin/drupal