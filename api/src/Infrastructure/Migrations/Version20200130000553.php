<?php

declare(strict_types=1);

namespace Infrastructure\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200130000553 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE light DROP CONSTRAINT fk_6b1a5cf7b27bbac2');
        $this->addSql('CREATE TABLE app_light (uuid VARCHAR(36) NOT NULL, room_uuid VARCHAR(36) DEFAULT NULL, type VARCHAR(255) NOT NULL, ip_address VARCHAR(255) NOT NULL, PRIMARY KEY(uuid))');
        $this->addSql('CREATE INDEX IDX_BDC9D13AB27BBAC2 ON app_light (room_uuid)');
        $this->addSql('CREATE TABLE app_device (uuid VARCHAR(36) NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(uuid))');
        $this->addSql('CREATE TABLE app_room (uuid VARCHAR(36) NOT NULL, house_uuid VARCHAR(36) DEFAULT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(uuid))');
        $this->addSql('CREATE INDEX IDX_77B1743B89117E8C ON app_room (house_uuid)');
        $this->addSql('ALTER TABLE app_light ADD CONSTRAINT FK_BDC9D13AB27BBAC2 FOREIGN KEY (room_uuid) REFERENCES app_room (uuid) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE app_room ADD CONSTRAINT FK_77B1743B89117E8C FOREIGN KEY (house_uuid) REFERENCES app_house (uuid) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE device');
        $this->addSql('DROP TABLE room');
        $this->addSql('DROP TABLE light');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE app_light DROP CONSTRAINT FK_BDC9D13AB27BBAC2');
        $this->addSql('CREATE TABLE device (uuid VARCHAR(36) NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(uuid))');
        $this->addSql('CREATE TABLE room (uuid VARCHAR(36) NOT NULL, house_uuid VARCHAR(36) DEFAULT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(uuid))');
        $this->addSql('CREATE INDEX idx_729f519b89117e8c ON room (house_uuid)');
        $this->addSql('CREATE TABLE light (uuid VARCHAR(36) NOT NULL, room_uuid VARCHAR(36) DEFAULT NULL, type VARCHAR(255) NOT NULL, ip_address VARCHAR(255) NOT NULL, PRIMARY KEY(uuid))');
        $this->addSql('CREATE INDEX idx_6b1a5cf7b27bbac2 ON light (room_uuid)');
        $this->addSql('ALTER TABLE room ADD CONSTRAINT fk_729f519b89117e8c FOREIGN KEY (house_uuid) REFERENCES app_house (uuid) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE light ADD CONSTRAINT fk_6b1a5cf7b27bbac2 FOREIGN KEY (room_uuid) REFERENCES room (uuid) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE app_light');
        $this->addSql('DROP TABLE app_device');
        $this->addSql('DROP TABLE app_room');
    }
}
