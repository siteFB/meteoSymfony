<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230525105604 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE messagerie DROP FOREIGN KEY FK_14E8F60C4DA68CE6');
        $this->addSql('DROP INDEX IDX_14E8F60C4DA68CE6 ON messagerie');
        $this->addSql('ALTER TABLE messagerie CHANGE created_at created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE id_destinataire_id users_destinataire_id INT NOT NULL');
        $this->addSql('ALTER TABLE messagerie ADD CONSTRAINT FK_14E8F60C1F8DB0F4 FOREIGN KEY (users_destinataire_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_14E8F60C1F8DB0F4 ON messagerie (users_destinataire_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE messagerie DROP FOREIGN KEY FK_14E8F60C1F8DB0F4');
        $this->addSql('DROP INDEX IDX_14E8F60C1F8DB0F4 ON messagerie');
        $this->addSql('ALTER TABLE messagerie CHANGE created_at created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE users_destinataire_id id_destinataire_id INT NOT NULL');
        $this->addSql('ALTER TABLE messagerie ADD CONSTRAINT FK_14E8F60C4DA68CE6 FOREIGN KEY (id_destinataire_id) REFERENCES users (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_14E8F60C4DA68CE6 ON messagerie (id_destinataire_id)');
    }
}
