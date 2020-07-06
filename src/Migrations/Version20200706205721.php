<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200706205721 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE challenge DROP FOREIGN KEY FK_D709895173B21E9C');
        $this->addSql('ALTER TABLE challenge DROP FOREIGN KEY FK_D7098951B3E8864B');
        $this->addSql('ALTER TABLE challenge DROP FOREIGN KEY FK_D7098951B5A459A0');
        $this->addSql('DROP INDEX IDX_D7098951B5A459A0 ON challenge');
        $this->addSql('DROP INDEX IDX_D709895173B21E9C ON challenge');
        $this->addSql('DROP INDEX IDX_D7098951B3E8864B ON challenge');
        $this->addSql('ALTER TABLE challenge DROP tips_id, DROP news_id, DROP step_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE challenge ADD tips_id INT NOT NULL, ADD news_id INT NOT NULL, ADD step_id INT NOT NULL');
        $this->addSql('ALTER TABLE challenge ADD CONSTRAINT FK_D709895173B21E9C FOREIGN KEY (step_id) REFERENCES step (id)');
        $this->addSql('ALTER TABLE challenge ADD CONSTRAINT FK_D7098951B3E8864B FOREIGN KEY (tips_id) REFERENCES tips (id)');
        $this->addSql('ALTER TABLE challenge ADD CONSTRAINT FK_D7098951B5A459A0 FOREIGN KEY (news_id) REFERENCES news (id)');
        $this->addSql('CREATE INDEX IDX_D7098951B5A459A0 ON challenge (news_id)');
        $this->addSql('CREATE INDEX IDX_D709895173B21E9C ON challenge (step_id)');
        $this->addSql('CREATE INDEX IDX_D7098951B3E8864B ON challenge (tips_id)');
    }
}
