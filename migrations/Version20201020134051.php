<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201020134051 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql("INSERT INTO `customer_status` (`id`, `code`, `name`) VALUES
(1, 'AC', 'Active'),
(2, 'RE', 'Removed');");
        $this->addSql("INSERT INTO `customers` (`id`, `status_id`, `name`) VALUES
(1, 2, 'Linus Torvalds'),
(2, 1, 'Bill Gates'),
(3, 1, 'Joe Bloggs'),
(4, 1, 'Donald Trump'),
(5, 1, 'Scott Morrison'),
(6, 1, 'Donald Duck'),
(7, 1, 'Daffy Duck'),
(8, 1, 'Mickey Mouse'),
(9, 1, 'Malcolm Turnbull'),
(10, 1, 'Anthony Albenese'),
(11, 1, 'Peter Dutton');");

        $this->addSql("INSERT INTO `orders` (`id`, `customer_id`, `order_status`, `order_total`, `created`) VALUES
    (1, 1, 'Completed', 100, '2020-10-21 00:00:31'),
(2, 1, 'Completed', 150, '2020-10-21 00:03:50'),
(3, 2, 'Completed', 150, '2020-10-21 00:05:13'),
(4, 2, 'Completed', 150, '2020-10-21 00:05:13'),
(5, 3, 'Completed', 150, '2020-10-21 00:05:13'),
(6, 4, 'Completed', 150, '2020-10-21 00:05:13'),
(7, 5, 'Completed', 150, '2020-10-21 00:05:13'),
(8, 6, 'Completed', 150, '2020-10-21 00:05:13'),
(9, 7, 'Pending', 150, '2020-10-21 00:05:13'),
(10, 8, 'Declined', 150, '2020-10-21 00:05:13'),
(11, 9, 'Completed', 150, '2018-10-21 00:05:13');");
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
    }
}
