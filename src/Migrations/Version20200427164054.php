<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200427164054 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE mark (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bike CHANGE mark_id mark_id INT DEFAULT NULL, CHANGE img img VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE test ADD marks_id INT DEFAULT NULL, CHANGE link link VARCHAR(255) DEFAULT NULL, CHANGE title title VARCHAR(255) DEFAULT NULL, CHANGE price price VARCHAR(255) DEFAULT NULL, CHANGE mark mark VARCHAR(255) DEFAULT NULL, CHANGE img img VARCHAR(255) DEFAULT NULL, CHANGE groupe groupe VARCHAR(255) DEFAULT NULL, CHANGE material material VARCHAR(255) DEFAULT NULL, CHANGE speed speed INT DEFAULT NULL, CHANGE poid poid INT DEFAULT NULL, CHANGE type type VARCHAR(255) DEFAULT NULL, CHANGE years years INT DEFAULT NULL, CHANGE poids_fabricant poids_fabricant INT DEFAULT NULL, CHANGE friens friens VARCHAR(255) DEFAULT NULL, CHANGE size1 size1 INT DEFAULT NULL, CHANGE size2 size2 INT DEFAULT NULL, CHANGE size3 size3 INT DEFAULT NULL, CHANGE size4 size4 INT DEFAULT NULL, CHANGE size5 size5 INT DEFAULT NULL');
        $this->addSql('ALTER TABLE test ADD CONSTRAINT FK_D87F7E0C4B8FD494 FOREIGN KEY (marks_id) REFERENCES marks (id)');
        $this->addSql('CREATE INDEX IDX_D87F7E0C4B8FD494 ON test (marks_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE mark');
        $this->addSql('ALTER TABLE bike CHANGE mark_id mark_id INT DEFAULT NULL, CHANGE img img VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE test DROP FOREIGN KEY FK_D87F7E0C4B8FD494');
        $this->addSql('DROP INDEX IDX_D87F7E0C4B8FD494 ON test');
        $this->addSql('ALTER TABLE test DROP marks_id, CHANGE link link VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE title title VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE price price VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE mark mark VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE img img VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE groupe groupe VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE material material VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE speed speed INT DEFAULT NULL, CHANGE poid poid INT DEFAULT NULL, CHANGE type type VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE years years INT DEFAULT NULL, CHANGE poids_fabricant poids_fabricant INT DEFAULT NULL, CHANGE friens friens VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE size1 size1 INT DEFAULT NULL, CHANGE size2 size2 INT DEFAULT NULL, CHANGE size3 size3 INT DEFAULT NULL, CHANGE size4 size4 INT DEFAULT NULL, CHANGE size5 size5 INT DEFAULT NULL');
    }
}
