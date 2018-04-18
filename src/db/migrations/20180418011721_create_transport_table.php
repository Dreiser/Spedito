<?php

use Phinx\Migration\AbstractMigration;

/**
 * Class CreateShipmentTable
 */
class CreateShipmentTable extends AbstractMigration
{
    public function up()
    {
        $this->execute('
            CREATE TABLE transport (
              id INT AUTO_INCREMENT NOT NULL,
              order_id INT DEFAULT NULL,
              car_id INT DEFAULT NULL,
              driver_id INT DEFAULT NULL,
              pickup_address VARCHAR(512) NOT NULL,
              delivery_address VARCHAR(512) NOT NULL,
              pickup_date DATE NOT NULL,
              INDEX IDX_2CB20DC8D9F6D38 (order_id),
              INDEX IDX_2CB20DCC3C6F69F (car_id),
              INDEX IDX_2CB20DCC3423909 (driver_id),
              PRIMARY KEY(id)
            ) DEFAULT CHARACTER SET UTF8 COLLATE UTF8_unicode_ci ENGINE = InnoDB;
        ');
    }
}
