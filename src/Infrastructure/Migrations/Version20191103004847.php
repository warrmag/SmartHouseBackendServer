<?php

declare(strict_types=1);

namespace Infrastructure\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191103004847 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE TABLE app_user (uuid VARCHAR(36) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, roles TEXT NOT NULL, active BOOLEAN NOT NULL, PRIMARY KEY(uuid))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_88BDF3E9E7927C74 ON app_user (email)');
        $this->addSql('COMMENT ON COLUMN app_user.roles IS \'(DC2Type:array)\'');
        $this->addSql('DROP TABLE "user"');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE TABLE "user" (uuid VARCHAR(36) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, roles TEXT NOT NULL, active BOOLEAN NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, PRIMARY KEY(uuid))');
        $this->addSql('CREATE UNIQUE INDEX uniq_8d93d649e7927c74 ON "user" (email)');
        $this->addSql('COMMENT ON COLUMN "user".roles IS \'(DC2Type:array)\'');
        $this->addSql('DROP TABLE app_user');
    }
}
