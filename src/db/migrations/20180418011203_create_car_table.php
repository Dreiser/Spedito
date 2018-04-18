<?php

use Phinx\Migration\AbstractMigration;

/**
 * Class CreateCarTable
 */
class CreateCarTable extends AbstractMigration
{
    public function up()
    {
        $this->execute('
          CREATE TABLE car (
            id INT AUTO_INCREMENT NOT NULL,
            name VARCHAR(128) NOT NULL,
            manufacturer VARCHAR(128) NOT NULL,
            model VARCHAR(128) NOT NULL,
            license_plate VARCHAR(24) NOT NULL,
            PRIMARY KEY(id)
          ) DEFAULT CHARACTER SET UTF8 COLLATE UTF8_unicode_ci ENGINE = InnoDB;');
    }
}
