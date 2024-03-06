<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240303174146 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        //this up() migration is auto-generated, please modify it to your needs
        // $this->addSql("INSERT INTO `calendar` (`today`, `morning`, `afternoon`, `all_day`, `is_morning`, `is_afternoon`, `is_all_day`, `code_morning`, `code_afternoon`, `code_all_day`) VALUES
        // ('lundi', '9h-12h', '12h-22h', '', NULL, NULL, NULL, 'lundi-9-12', 'lundi-12-22', 'lundi-all-day');");
        // $this->addSql("INSERT INTO `calendar` (`today`, `morning`, `afternoon`, `all_day`, `is_morning`, `is_afternoon`, `is_all_day`, `code_morning`, `code_afternoon`, `code_all_day`) VALUES
        // ('mardi', '9h-12h', '12h-22h', '', NULL, NULL, NULL, 'mardi-9-12', 'mardi-12-22', 'mardi-all-day');");
        // $this->addSql("INSERT INTO `calendar` (`today`, `morning`, `afternoon`, `all_day`, `is_morning`, `is_afternoon`, `is_all_day`, `code_morning`, `code_afternoon`, `code_all_day`) VALUES
        // ('mercredi', '9h-12h', '12h-22h', '', NULL, NULL, NULL, 'mercredi-9-12', 'mercredi-12-22', 'mercredi-all-day');");
        // $this->addSql("INSERT INTO `calendar` (`today`, `morning`, `afternoon`, `all_day`, `is_morning`, `is_afternoon`, `is_all_day`, `code_morning`, `code_afternoon`, `code_all_day`) VALUES
        // ('jeudi', '9h-12h', '12h-22h', '', NULL, NULL, NULL, 'jeudi-9-12', 'jeudi-12-22', 'jeudi-all-day');");
        // $this->addSql("INSERT INTO `calendar` (`today`, `morning`, `afternoon`, `all_day`, `is_morning`, `is_afternoon`, `is_all_day`, `code_morning`, `code_afternoon`, `code_all_day`) VALUES
        // ('vendredi', '9h-12h', '12h-22h', '', NULL, NULL, NULL, 'vendredi-9-12', 'vendredi-12-22', 'vendredi-all-day');");
        // $this->addSql("INSERT INTO `calendar` (`today`, `morning`, `afternoon`, `all_day`, `is_morning`, `is_afternoon`, `is_all_day`, `code_morning`, `code_afternoon`, `code_all_day`) VALUES
        // ('samedi', '9h-12h', '12h-22h', '', NULL, NULL, NULL, 'samedi-9-12', 'samedi-12-22', 'samedi-all-day');");
        // $this->addSql("INSERT INTO `calendar` (`today`, `morning`, `afternoon`, `all_day`, `is_morning`, `is_afternoon`, `is_all_day`, `code_morning`, `code_afternoon`, `code_all_day`) VALUES
        // ('dimanche', '9h-12h', '12h-22h', '', NULL, NULL, NULL, 'dimanche-9-12', 'dimanche-12-22', 'dimanche-all-day');");
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
