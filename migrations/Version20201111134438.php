<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201111134438 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, price VARCHAR(255) NOT NULL, ingredient VARCHAR(255) NOT NULL, weight VARCHAR(255) NOT NULL, description VARCHAR(9999) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_types (product_id INT NOT NULL, types_id INT NOT NULL, INDEX IDX_F86CF26C4584665A (product_id), INDEX IDX_F86CF26C8EB23357 (types_id), PRIMARY KEY(product_id, types_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE types (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE product_types ADD CONSTRAINT FK_F86CF26C4584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_types ADD CONSTRAINT FK_F86CF26C8EB23357 FOREIGN KEY (types_id) REFERENCES types (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product_types DROP FOREIGN KEY FK_F86CF26C4584665A');
        $this->addSql('ALTER TABLE product_types DROP FOREIGN KEY FK_F86CF26C8EB23357');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE product_types');
        $this->addSql('DROP TABLE types');
    }
}
