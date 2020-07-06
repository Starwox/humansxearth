<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200706163603 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE challenge (id INT AUTO_INCREMENT NOT NULL, tips_id INT NOT NULL, news_id INT NOT NULL, step_id INT NOT NULL, content VARCHAR(255) NOT NULL, to_know VARCHAR(255) NOT NULL, INDEX IDX_D7098951B3E8864B (tips_id), INDEX IDX_D7098951B5A459A0 (news_id), INDEX IDX_D709895173B21E9C (step_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE challenge ADD CONSTRAINT FK_D7098951B3E8864B FOREIGN KEY (tips_id) REFERENCES tips (id)');
        $this->addSql('ALTER TABLE challenge ADD CONSTRAINT FK_D7098951B5A459A0 FOREIGN KEY (news_id) REFERENCES news (id)');
        $this->addSql('ALTER TABLE challenge ADD CONSTRAINT FK_D709895173B21E9C FOREIGN KEY (step_id) REFERENCES step (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE challenge');
    }
}
