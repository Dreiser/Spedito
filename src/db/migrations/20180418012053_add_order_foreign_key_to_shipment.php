<?php

use Phinx\Migration\AbstractMigration;

/**
 * Class AddOrderForeignKeyToShipment
 */
class AddOrderForeignKeyToShipment extends AbstractMigration
{
    public function up()
    {
        $this->execute('
            ALTER TABLE shipment ADD CONSTRAINT FK_2CB20DC8D9F6D38 FOREIGN KEY (order_id) REFERENCES `order` (id);
        ');
    }
}
