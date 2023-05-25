<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230525105216 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE messagerie (id INT AUTO_INCREMENT NOT NULL, users_expediteur_id INT NOT NULL, id_destinataire_id INT NOT NULL, sujet VARCHAR(30) NOT NULL, message LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_14E8F60C19D6576C (users_expediteur_id), INDEX IDX_14E8F60C4DA68CE6 (id_destinataire_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE messagerie ADD CONSTRAINT FK_14E8F60C19D6576C FOREIGN KEY (users_expediteur_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE messagerie ADD CONSTRAINT FK_14E8F60C4DA68CE6 FOREIGN KEY (id_destinataire_id) REFERENCES users (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE messagerie DROP FOREIGN KEY FK_14E8F60C19D6576C');
        $this->addSql('ALTER TABLE messagerie DROP FOREIGN KEY FK_14E8F60C4DA68CE6');
        $this->addSql('DROP TABLE messagerie');
    }
}
