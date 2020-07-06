<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200706212850 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE news DROP FOREIGN KEY FK_1DD3995098A21AC6');
        $this->addSql('DROP INDEX IDX_1DD3995098A21AC6 ON news');
        $this->addSql('ALTER TABLE news DROP challenge_id');
        $this->addSql('ALTER TABLE step DROP FOREIGN KEY FK_43B9FE3C98A21AC6');
        $this->addSql('DROP INDEX IDX_43B9FE3C98A21AC6 ON step');
        $this->addSql('ALTER TABLE step DROP challenge_id');
        $this->addSql('ALTER TABLE tips DROP FOREIGN KEY FK_642C410898A21AC6');
        $this->addSql('DROP INDEX IDX_642C410898A21AC6 ON tips');
        $this->addSql('ALTER TABLE tips DROP challenge_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE news ADD challenge_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE news ADD CONSTRAINT FK_1DD3995098A21AC6 FOREIGN KEY (challenge_id) REFERENCES challenge (id)');
        $this->addSql('CREATE INDEX IDX_1DD3995098A21AC6 ON news (challenge_id)');
        $this->addSql('ALTER TABLE step ADD challenge_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE step ADD CONSTRAINT FK_43B9FE3C98A21AC6 FOREIGN KEY (challenge_id) REFERENCES challenge (id)');
        $this->addSql('CREATE INDEX IDX_43B9FE3C98A21AC6 ON step (challenge_id)');
        $this->addSql('ALTER TABLE tips ADD challenge_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tips ADD CONSTRAINT FK_642C410898A21AC6 FOREIGN KEY (challenge_id) REFERENCES challenge (id)');
        $this->addSql('CREATE INDEX IDX_642C410898A21AC6 ON tips (challenge_id)');
    }
}
