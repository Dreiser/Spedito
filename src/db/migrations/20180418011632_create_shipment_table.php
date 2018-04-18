<?php

use Phinx\Migration\AbstractMigration;

/**
 * Class CreateOrderTable
 */
class CreateOrderTable extends AbstractMigration
{
    public function up()
    {
        $this->execute('
            CREATE TABLE `shipment` (
              id INT AUTO_INCREMENT NOT NULL,
              customer_id INT DEFAULT NULL,
              number VARCHAR(128) NOT NULL, 
              INDEX IDX_F52993989395C3F3 (customer_id),
              PRIMARY KEY(id)
            ) DEFAULT CHARACTER SET UTF8 COLLATE UTF8_unicode_ci ENGINE = InnoDB;
        ');
    }
}
