<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200318163652 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bike ADD mark_id INT DEFAULT NULL, CHANGE img img VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE bike ADD CONSTRAINT FK_4CBC37804290F12B FOREIGN KEY (mark_id) REFERENCES marks (id)');
        $this->addSql('CREATE INDEX IDX_4CBC37804290F12B ON bike (mark_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bike DROP FOREIGN KEY FK_4CBC37804290F12B');
        $this->addSql('DROP INDEX IDX_4CBC37804290F12B ON bike');
        $this->addSql('ALTER TABLE bike DROP mark_id, CHANGE img img VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
    }
}
