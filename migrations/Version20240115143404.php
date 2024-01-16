<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240115143404 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE customer (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, licence_number VARCHAR(255) NOT NULL, age INT NOT NULL, phone INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE renting (id INT AUTO_INCREMENT NOT NULL, vehicle_id INT DEFAULT NULL, customer_id INT DEFAULT NULL, date_start DATE NOT NULL, date_end DATE NOT NULL, coef_price DOUBLE PRECISION NOT NULL, INDEX IDX_13533C0F545317D1 (vehicle_id), INDEX IDX_13533C0F9395C3F3 (customer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicle (id INT AUTO_INCREMENT NOT NULL, car_brand VARCHAR(255) NOT NULL, model VARCHAR(255) NOT NULL, registration_number VARCHAR(255) NOT NULL, color VARCHAR(255) NOT NULL, base_price DOUBLE PRECISION NOT NULL, number_kilometers INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE renting ADD CONSTRAINT FK_13533C0F545317D1 FOREIGN KEY (vehicle_id) REFERENCES vehicle (id)');
        $this->addSql('ALTER TABLE renting ADD CONSTRAINT FK_13533C0F9395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE renting DROP FOREIGN KEY FK_13533C0F545317D1');
        $this->addSql('ALTER TABLE renting DROP FOREIGN KEY FK_13533C0F9395C3F3');
        $this->addSql('DROP TABLE customer');
        $this->addSql('DROP TABLE renting');
        $this->addSql('DROP TABLE vehicle');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
