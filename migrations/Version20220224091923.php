<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220224091923 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE porttypecompatible (idaistype INT NOT NULL, idport INT NOT NULL, INDEX IDX_2C02FFDB53BA86F9 (idaistype), INDEX IDX_2C02FFDB905EAC6C (idport), PRIMARY KEY(idaistype, idport)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE porttypecompatible ADD CONSTRAINT FK_2C02FFDB53BA86F9 FOREIGN KEY (idaistype) REFERENCES aisshiptype (id)');
        $this->addSql('ALTER TABLE porttypecompatible ADD CONSTRAINT FK_2C02FFDB905EAC6C FOREIGN KEY (idport) REFERENCES port (id)');
        $this->addSql('DROP TABLE ais_ship_type_port');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ais_ship_type_port (ais_ship_type_id INT NOT NULL, port_id INT NOT NULL, INDEX IDX_E2C18803479E0B84 (ais_ship_type_id), INDEX IDX_E2C1880376E92A9C (port_id), PRIMARY KEY(ais_ship_type_id, port_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE ais_ship_type_port ADD CONSTRAINT FK_E2C18803479E0B84 FOREIGN KEY (ais_ship_type_id) REFERENCES aisshiptype (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ais_ship_type_port ADD CONSTRAINT FK_E2C1880376E92A9C FOREIGN KEY (port_id) REFERENCES port (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE porttypecompatible');
    }
}
