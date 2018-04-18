<?php

use Phinx\Migration\AbstractMigration;

/**
 * Class CreateDriverTable
 */
class CreateDriverTable extends AbstractMigration
{
    public function up()
    {
        $this->execute('
            CREATE TABLE driver (
              id INT AUTO_INCREMENT NOT NULL,
              firstname VARCHAR(32) NOT NULL,
              lastname VARCHAR(64) NOT NULL,
              PRIMARY KEY(id)
            ) DEFAULT CHARACTER SET UTF8 COLLATE UTF8_unicode_ci ENGINE = InnoDB;
        ');
    }
}
