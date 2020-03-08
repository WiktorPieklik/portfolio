<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200114001439 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE order_t_equipment (order_t_id INT NOT NULL, equipment_id INT NOT NULL, INDEX IDX_43E0F3F311E8CEE2 (order_t_id), INDEX IDX_43E0F3F3517FE9FE (equipment_id), PRIMARY KEY(order_t_id, equipment_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE order_t_equipment ADD CONSTRAINT FK_43E0F3F311E8CEE2 FOREIGN KEY (order_t_id) REFERENCES order_t (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE order_t_equipment ADD CONSTRAINT FK_43E0F3F3517FE9FE FOREIGN KEY (equipment_id) REFERENCES equipment (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE order_t_equipment');
    }
}
