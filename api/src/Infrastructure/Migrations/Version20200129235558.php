<?php

declare(strict_types=1);

namespace Infrastructure\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200129235558 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE TABLE light (uuid VARCHAR(36) NOT NULL, house_uuid VARCHAR(36) DEFAULT NULL, type VARCHAR(255) NOT NULL, ip_address VARCHAR(255) NOT NULL, PRIMARY KEY(uuid))');
        $this->addSql('CREATE INDEX IDX_6B1A5CF789117E8C ON light (house_uuid)');
        $this->addSql('CREATE TABLE room (uuid VARCHAR(36) NOT NULL, house_uuid VARCHAR(36) DEFAULT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(uuid))');
        $this->addSql('CREATE INDEX IDX_729F519B89117E8C ON room (house_uuid)');
        $this->addSql('ALTER TABLE light ADD CONSTRAINT FK_6B1A5CF789117E8C FOREIGN KEY (house_uuid) REFERENCES room (uuid) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE room ADD CONSTRAINT FK_729F519B89117E8C FOREIGN KEY (house_uuid) REFERENCES app_house (uuid) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE light DROP CONSTRAINT FK_6B1A5CF789117E8C');
        $this->addSql('DROP TABLE light');
        $this->addSql('DROP TABLE room');
    }
}
