<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230512150342 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE circuit ADD sectors_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE circuit ADD CONSTRAINT FK_1325F3A63479DC16 FOREIGN KEY (sectors_id) REFERENCES sector (id)');
        $this->addSql('CREATE INDEX IDX_1325F3A63479DC16 ON circuit (sectors_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE circuit DROP FOREIGN KEY FK_1325F3A63479DC16');
        $this->addSql('DROP INDEX IDX_1325F3A63479DC16 ON circuit');
        $this->addSql('ALTER TABLE circuit DROP sectors_id');
    }
}
