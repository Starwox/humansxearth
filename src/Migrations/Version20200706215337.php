<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200706215337 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE challenge_tips (challenge_id INT NOT NULL, tips_id INT NOT NULL, INDEX IDX_6D83468E98A21AC6 (challenge_id), INDEX IDX_6D83468EB3E8864B (tips_id), PRIMARY KEY(challenge_id, tips_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE challenge_news (challenge_id INT NOT NULL, news_id INT NOT NULL, INDEX IDX_147C9ED698A21AC6 (challenge_id), INDEX IDX_147C9ED6B5A459A0 (news_id), PRIMARY KEY(challenge_id, news_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE challenge_tips ADD CONSTRAINT FK_6D83468E98A21AC6 FOREIGN KEY (challenge_id) REFERENCES challenge (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE challenge_tips ADD CONSTRAINT FK_6D83468EB3E8864B FOREIGN KEY (tips_id) REFERENCES tips (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE challenge_news ADD CONSTRAINT FK_147C9ED698A21AC6 FOREIGN KEY (challenge_id) REFERENCES challenge (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE challenge_news ADD CONSTRAINT FK_147C9ED6B5A459A0 FOREIGN KEY (news_id) REFERENCES news (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE challenge ADD step_id INT NOT NULL');
        $this->addSql('ALTER TABLE challenge ADD CONSTRAINT FK_D709895173B21E9C FOREIGN KEY (step_id) REFERENCES step (id)');
        $this->addSql('CREATE INDEX IDX_D709895173B21E9C ON challenge (step_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE challenge_tips');
        $this->addSql('DROP TABLE challenge_news');
        $this->addSql('ALTER TABLE challenge DROP FOREIGN KEY FK_D709895173B21E9C');
        $this->addSql('DROP INDEX IDX_D709895173B21E9C ON challenge');
        $this->addSql('ALTER TABLE challenge DROP step_id');
    }
}
