<?php

use Phinx\Migration\AbstractMigration;

/**
 * Class AddCarForeignKeyToShipment
 */
class AddCarForeignKeyToShipment extends AbstractMigration
{
    public function up()
    {
        $this->execute('
            ALTER TABLE shipment ADD CONSTRAINT FK_2CB20DCC3C6F69F FOREIGN KEY (car_id) REFERENCES car (id);
        ');
    }
}
