<?php

use Phinx\Migration\AbstractMigration;

/**
 * Class AddDriverForeignKeyToShipment
 */
class AddDriverForeignKeyToShipment extends AbstractMigration
{
    public function up()
    {
        $this->execute('
            ALTER TABLE shipment ADD CONSTRAINT FK_2CB20DCC3423909 FOREIGN KEY (driver_id) REFERENCES driver (id);
        ');
    }
}
