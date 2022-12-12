<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221212123354 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, warehouse_id INT DEFAULT NULL, product_name VARCHAR(255) NOT NULL, quantity DOUBLE PRECISION NOT NULL, price_unit DOUBLE PRECISION NOT NULL, mass DOUBLE PRECISION NOT NULL, date_creation DATE DEFAULT NULL, cell_occupation INT NOT NULL, product_image VARCHAR(255) DEFAULT NULL, INDEX IDX_D34A04AD5080ECDE (warehouse_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE warehouse (id INT AUTO_INCREMENT NOT NULL, warehouse_name VARCHAR(255) NOT NULL, location VARCHAR(255) NOT NULL, phone_number VARCHAR(255) DEFAULT NULL, max_cells INT NOT NULL, warehouse_image VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD5080ECDE FOREIGN KEY (warehouse_id) REFERENCES warehouse (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD5080ECDE');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE warehouse');
    }
}
