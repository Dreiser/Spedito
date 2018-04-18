<?php

use Phinx\Migration\AbstractMigration;

/**
 * Class CreateCustomerTable
 */
class CreateCustomerTable extends AbstractMigration
{
    public function up()
    {
        $this->execute('
            CREATE TABLE customer (
              id INT AUTO_INCREMENT NOT NULL,
              name VARCHAR(128) NOT NULL,
              UNIQUE INDEX UNIQ_81398E095E237E06 (name),
              PRIMARY KEY(id)
            ) DEFAULT CHARACTER SET UTF8 COLLATE UTF8_unicode_ci ENGINE = InnoDB;
        ');
    }
}
