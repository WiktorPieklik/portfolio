<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200123204306 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE damage_report DROP FOREIGN KEY FK_D7D56F97A76ED395');
        $this->addSql('DROP INDEX IDX_D7D56F97A76ED395 ON damage_report');
        $this->addSql('ALTER TABLE damage_report CHANGE user_id serviceman_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE damage_report ADD CONSTRAINT FK_D7D56F97C0497EB3 FOREIGN KEY (serviceman_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_D7D56F97C0497EB3 ON damage_report (serviceman_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE damage_report DROP FOREIGN KEY FK_D7D56F97C0497EB3');
        $this->addSql('DROP INDEX IDX_D7D56F97C0497EB3 ON damage_report');
        $this->addSql('ALTER TABLE damage_report CHANGE serviceman_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE damage_report ADD CONSTRAINT FK_D7D56F97A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_D7D56F97A76ED395 ON damage_report (user_id)');
    }
}
