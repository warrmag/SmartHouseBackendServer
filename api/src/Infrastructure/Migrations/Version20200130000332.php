<?php

declare(strict_types=1);

namespace Infrastructure\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200130000332 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE light DROP CONSTRAINT fk_6b1a5cf789117e8c');
        $this->addSql('DROP INDEX idx_6b1a5cf789117e8c');
        $this->addSql('ALTER TABLE light RENAME COLUMN house_uuid TO room_uuid');
        $this->addSql('ALTER TABLE light ADD CONSTRAINT FK_6B1A5CF7B27BBAC2 FOREIGN KEY (room_uuid) REFERENCES room (uuid) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_6B1A5CF7B27BBAC2 ON light (room_uuid)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE light DROP CONSTRAINT FK_6B1A5CF7B27BBAC2');
        $this->addSql('DROP INDEX IDX_6B1A5CF7B27BBAC2');
        $this->addSql('ALTER TABLE light RENAME COLUMN room_uuid TO house_uuid');
        $this->addSql('ALTER TABLE light ADD CONSTRAINT fk_6b1a5cf789117e8c FOREIGN KEY (house_uuid) REFERENCES room (uuid) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_6b1a5cf789117e8c ON light (house_uuid)');
    }
}
