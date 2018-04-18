<?php

use Phinx\Migration\AbstractMigration;

/**
 * Class AddCustomerForeignKeyToOrder
 */
class AddCustomerForeignKeyToOrder extends AbstractMigration
{
    public function up()
    {
        $this->execute('
            ALTER TABLE `order` ADD CONSTRAINT FK_F52993989395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id);
        ');
    }
}
