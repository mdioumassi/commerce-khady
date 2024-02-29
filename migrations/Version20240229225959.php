<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240229225959 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, wax_id INT NOT NULL, savon_id INT NOT NULL, path VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_C53D045F343C5676 (wax_id), UNIQUE INDEX UNIQ_C53D045FEEDC9C19 (savon_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, price INT NOT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_D34A04ADA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE savon (id INT AUTO_INCREMENT NOT NULL, product_id INT NOT NULL, UNIQUE INDEX UNIQ_E3D9D2B14584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tresse (id INT AUTO_INCREMENT NOT NULL, product_id INT NOT NULL, is_move TINYINT(1) DEFAULT NULL, my_address VARCHAR(255) DEFAULT NULL, your_address VARCHAR(255) DEFAULT NULL, move_price INT DEFAULT NULL, number_person INT DEFAULT NULL, gender VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_C1E633014584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, nickname VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, is_verified TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649A188FE64 (nickname), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wax (id INT AUTO_INCREMENT NOT NULL, product_id INT NOT NULL, category_id INT NOT NULL, UNIQUE INDEX UNIQ_8CC7042F4584665A (product_id), INDEX IDX_8CC7042F12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F343C5676 FOREIGN KEY (wax_id) REFERENCES wax (id)');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045FEEDC9C19 FOREIGN KEY (savon_id) REFERENCES savon (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE savon ADD CONSTRAINT FK_E3D9D2B14584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE tresse ADD CONSTRAINT FK_C1E633014584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE wax ADD CONSTRAINT FK_8CC7042F4584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE wax ADD CONSTRAINT FK_8CC7042F12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F343C5676');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045FEEDC9C19');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADA76ED395');
        $this->addSql('ALTER TABLE savon DROP FOREIGN KEY FK_E3D9D2B14584665A');
        $this->addSql('ALTER TABLE tresse DROP FOREIGN KEY FK_C1E633014584665A');
        $this->addSql('ALTER TABLE wax DROP FOREIGN KEY FK_8CC7042F4584665A');
        $this->addSql('ALTER TABLE wax DROP FOREIGN KEY FK_8CC7042F12469DE2');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE savon');
        $this->addSql('DROP TABLE tresse');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE wax');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
