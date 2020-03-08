<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200113162024 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, roles VARCHAR(255) NOT NULL, credit_card_number VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipment (id INT AUTO_INCREMENT NOT NULL, department_id INT DEFAULT NULL, type_id INT NOT NULL, status VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, milleage DOUBLE PRECISION NOT NULL, last_reserved_at DATETIME DEFAULT NULL, INDEX IDX_D338D583AE80F5DF (department_id), INDEX IDX_D338D583C54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE damage_report (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, attached_order_id INT NOT NULL, message VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, INDEX IDX_D7D56F97A76ED395 (user_id), UNIQUE INDEX UNIQ_D7D56F978AB74D1E (attached_order_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE department (id INT AUTO_INCREMENT NOT NULL, manager_id INT DEFAULT NULL, address VARCHAR(255) NOT NULL, slots_count INT NOT NULL, INDEX IDX_CD1DE18A783E3463 (manager_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipment_category (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE transport_order (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, from_department_id INT NOT NULL, to_department_id INT NOT NULL, created_at DATETIME NOT NULL, finished_at DATETIME DEFAULT NULL, status VARCHAR(255) NOT NULL, INDEX IDX_68263460A76ED395 (user_id), INDEX IDX_68263460E7D4F448 (from_department_id), INDEX IDX_682634602131FE83 (to_department_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_t (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, start_department_id INT NOT NULL, end_department_id INT DEFAULT NULL, created_at DATETIME NOT NULL, reserved_at DATETIME DEFAULT NULL, finished_at DATETIME DEFAULT NULL, price DOUBLE PRECISION DEFAULT NULL, INDEX IDX_FB0CD184A76ED395 (user_id), INDEX IDX_FB0CD184339ED470 (start_department_id), INDEX IDX_FB0CD1844F4EDDA5 (end_department_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE notification (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, message VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, INDEX IDX_BF5476CAA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE equipment ADD CONSTRAINT FK_D338D583AE80F5DF FOREIGN KEY (department_id) REFERENCES department (id)');
        $this->addSql('ALTER TABLE equipment ADD CONSTRAINT FK_D338D583C54C8C93 FOREIGN KEY (type_id) REFERENCES equipment_category (id)');
        $this->addSql('ALTER TABLE damage_report ADD CONSTRAINT FK_D7D56F97A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE damage_report ADD CONSTRAINT FK_D7D56F978AB74D1E FOREIGN KEY (attached_order_id) REFERENCES order_t (id)');
        $this->addSql('ALTER TABLE department ADD CONSTRAINT FK_CD1DE18A783E3463 FOREIGN KEY (manager_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE transport_order ADD CONSTRAINT FK_68263460A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE transport_order ADD CONSTRAINT FK_68263460E7D4F448 FOREIGN KEY (from_department_id) REFERENCES department (id)');
        $this->addSql('ALTER TABLE transport_order ADD CONSTRAINT FK_682634602131FE83 FOREIGN KEY (to_department_id) REFERENCES department (id)');
        $this->addSql('ALTER TABLE order_t ADD CONSTRAINT FK_FB0CD184A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE order_t ADD CONSTRAINT FK_FB0CD184339ED470 FOREIGN KEY (start_department_id) REFERENCES department (id)');
        $this->addSql('ALTER TABLE order_t ADD CONSTRAINT FK_FB0CD1844F4EDDA5 FOREIGN KEY (end_department_id) REFERENCES department (id)');
        $this->addSql('ALTER TABLE notification ADD CONSTRAINT FK_BF5476CAA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE damage_report DROP FOREIGN KEY FK_D7D56F97A76ED395');
        $this->addSql('ALTER TABLE department DROP FOREIGN KEY FK_CD1DE18A783E3463');
        $this->addSql('ALTER TABLE transport_order DROP FOREIGN KEY FK_68263460A76ED395');
        $this->addSql('ALTER TABLE order_t DROP FOREIGN KEY FK_FB0CD184A76ED395');
        $this->addSql('ALTER TABLE notification DROP FOREIGN KEY FK_BF5476CAA76ED395');
        $this->addSql('ALTER TABLE equipment DROP FOREIGN KEY FK_D338D583AE80F5DF');
        $this->addSql('ALTER TABLE transport_order DROP FOREIGN KEY FK_68263460E7D4F448');
        $this->addSql('ALTER TABLE transport_order DROP FOREIGN KEY FK_682634602131FE83');
        $this->addSql('ALTER TABLE order_t DROP FOREIGN KEY FK_FB0CD184339ED470');
        $this->addSql('ALTER TABLE order_t DROP FOREIGN KEY FK_FB0CD1844F4EDDA5');
        $this->addSql('ALTER TABLE equipment DROP FOREIGN KEY FK_D338D583C54C8C93');
        $this->addSql('ALTER TABLE damage_report DROP FOREIGN KEY FK_D7D56F978AB74D1E');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE equipment');
        $this->addSql('DROP TABLE damage_report');
        $this->addSql('DROP TABLE department');
        $this->addSql('DROP TABLE equipment_category');
        $this->addSql('DROP TABLE transport_order');
        $this->addSql('DROP TABLE order_t');
        $this->addSql('DROP TABLE notification');
    }
}
