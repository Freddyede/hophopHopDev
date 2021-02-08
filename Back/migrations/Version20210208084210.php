<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210208084210 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD envoyeur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6494795A786 FOREIGN KEY (envoyeur_id) REFERENCES messages (id)');
        $this->addSql('CREATE INDEX IDX_8D93D6494795A786 ON user (envoyeur_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6494795A786');
        $this->addSql('DROP INDEX IDX_8D93D6494795A786 ON user');
        $this->addSql('ALTER TABLE user DROP envoyeur_id');
    }
}
