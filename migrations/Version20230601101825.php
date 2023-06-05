<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230601101825 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ephemeride DROP image_id');
        $this->addSql('ALTER TABLE images ADD upload_images_id INT NOT NULL');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6AE9D0E7CA FOREIGN KEY (upload_images_id) REFERENCES ephemeride (id)');
        $this->addSql('CREATE INDEX IDX_E01FBE6AE9D0E7CA ON images (upload_images_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ephemeride ADD image_id INT NOT NULL');
        $this->addSql('ALTER TABLE images DROP FOREIGN KEY FK_E01FBE6AE9D0E7CA');
        $this->addSql('DROP INDEX IDX_E01FBE6AE9D0E7CA ON images');
        $this->addSql('ALTER TABLE images DROP upload_images_id');
    }
}
