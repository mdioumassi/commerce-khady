<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240315165026 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADDA818DBB');
        $this->addSql('DROP INDEX IDX_D34A04ADDA818DBB ON product');
        $this->addSql('ALTER TABLE product DROP tresse_id');
        $this->addSql('ALTER TABLE user ADD fullname VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product ADD tresse_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADDA818DBB FOREIGN KEY (tresse_id) REFERENCES tresse (id)');
        $this->addSql('CREATE INDEX IDX_D34A04ADDA818DBB ON product (tresse_id)');
        $this->addSql('ALTER TABLE user DROP fullname');
    }
}
