<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200114221348 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE damage_report_equipment (damage_report_id INT NOT NULL, equipment_id INT NOT NULL, INDEX IDX_1E90ECC88AC13AA1 (damage_report_id), INDEX IDX_1E90ECC8517FE9FE (equipment_id), PRIMARY KEY(damage_report_id, equipment_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE transport_order_equipment (transport_order_id INT NOT NULL, equipment_id INT NOT NULL, INDEX IDX_BBDE886347B17872 (transport_order_id), INDEX IDX_BBDE8863517FE9FE (equipment_id), PRIMARY KEY(transport_order_id, equipment_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE damage_report_equipment ADD CONSTRAINT FK_1E90ECC88AC13AA1 FOREIGN KEY (damage_report_id) REFERENCES damage_report (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE damage_report_equipment ADD CONSTRAINT FK_1E90ECC8517FE9FE FOREIGN KEY (equipment_id) REFERENCES equipment (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE transport_order_equipment ADD CONSTRAINT FK_BBDE886347B17872 FOREIGN KEY (transport_order_id) REFERENCES transport_order (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE transport_order_equipment ADD CONSTRAINT FK_BBDE8863517FE9FE FOREIGN KEY (equipment_id) REFERENCES equipment (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE damage_report_equipment');
        $this->addSql('DROP TABLE transport_order_equipment');
    }
}
