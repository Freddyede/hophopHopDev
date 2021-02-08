<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210208083148 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE messages_user DROP FOREIGN KEY FK_5F7E9CF4A5905F5A');
        $this->addSql('DROP TABLE messages');
        $this->addSql('DROP TABLE messages_user');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE messages (id INT AUTO_INCREMENT NOT NULL, envoyeur_id INT DEFAULT NULL, contenu LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_DB021E964795A786 (envoyeur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE messages_user (messages_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_5F7E9CF4A5905F5A (messages_id), INDEX IDX_5F7E9CF4A76ED395 (user_id), PRIMARY KEY(messages_id, user_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE messages ADD CONSTRAINT FK_DB021E964795A786 FOREIGN KEY (envoyeur_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE messages_user ADD CONSTRAINT FK_5F7E9CF4A5905F5A FOREIGN KEY (messages_id) REFERENCES messages (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE messages_user ADD CONSTRAINT FK_5F7E9CF4A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE CASCADE');
    }
}
