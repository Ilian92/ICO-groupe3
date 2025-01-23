<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250123235049 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE card_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cards (id INT AUTO_INCREMENT NOT NULL, pack_id_id INT NOT NULL, type_id_id INT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, image VARCHAR(255) NOT NULL, quantity INT NOT NULL, INDEX IDX_4C258FDCDB01426 (pack_id_id), INDEX IDX_4C258FD714819A0 (type_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE news (id INT AUTO_INCREMENT NOT NULL, status_id_id INT NOT NULL, title VARCHAR(150) NOT NULL, content LONGTEXT NOT NULL, image VARCHAR(255) NOT NULL, start_date DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', end_date DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_1DD39950881ECFA7 (status_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE news_status (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_items (id INT AUTO_INCREMENT NOT NULL, order_id_id INT NOT NULL, pack_id_id INT NOT NULL, quantity INT NOT NULL, INDEX IDX_62809DB0FCDAEAAA (order_id_id), INDEX IDX_62809DB0CDB01426 (pack_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_status (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE orders (id INT AUTO_INCREMENT NOT NULL, status_id_id INT NOT NULL, user_id_id INT DEFAULT NULL, total_price NUMERIC(5, 2) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_E52FFDEE881ECFA7 (status_id_id), INDEX IDX_E52FFDEE9D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE packs (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, price NUMERIC(5, 2) NOT NULL, image VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', fnac_link VARCHAR(255) DEFAULT NULL, amazon_link VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pages (id INT AUTO_INCREMENT NOT NULL, slug VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rules (id INT AUTO_INCREMENT NOT NULL, pack_id_id INT NOT NULL, content LONGTEXT NOT NULL, section VARCHAR(50) NOT NULL, title VARCHAR(255) DEFAULT NULL, INDEX IDX_899A993CCDB01426 (pack_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(320) NOT NULL, password VARCHAR(72) NOT NULL, first_name VARCHAR(100) NOT NULL, last_name VARCHAR(100) NOT NULL, address VARCHAR(255) DEFAULT NULL, is_verified TINYINT(1) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', roles JSON NOT NULL COMMENT \'(DC2Type:json)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cards ADD CONSTRAINT FK_4C258FDCDB01426 FOREIGN KEY (pack_id_id) REFERENCES packs (id)');
        $this->addSql('ALTER TABLE cards ADD CONSTRAINT FK_4C258FD714819A0 FOREIGN KEY (type_id_id) REFERENCES card_type (id)');
        $this->addSql('ALTER TABLE news ADD CONSTRAINT FK_1DD39950881ECFA7 FOREIGN KEY (status_id_id) REFERENCES news_status (id)');
        $this->addSql('ALTER TABLE order_items ADD CONSTRAINT FK_62809DB0FCDAEAAA FOREIGN KEY (order_id_id) REFERENCES orders (id)');
        $this->addSql('ALTER TABLE order_items ADD CONSTRAINT FK_62809DB0CDB01426 FOREIGN KEY (pack_id_id) REFERENCES packs (id)');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEE881ECFA7 FOREIGN KEY (status_id_id) REFERENCES order_status (id)');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEE9D86650F FOREIGN KEY (user_id_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE rules ADD CONSTRAINT FK_899A993CCDB01426 FOREIGN KEY (pack_id_id) REFERENCES packs (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cards DROP FOREIGN KEY FK_4C258FDCDB01426');
        $this->addSql('ALTER TABLE cards DROP FOREIGN KEY FK_4C258FD714819A0');
        $this->addSql('ALTER TABLE news DROP FOREIGN KEY FK_1DD39950881ECFA7');
        $this->addSql('ALTER TABLE order_items DROP FOREIGN KEY FK_62809DB0FCDAEAAA');
        $this->addSql('ALTER TABLE order_items DROP FOREIGN KEY FK_62809DB0CDB01426');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEE881ECFA7');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEE9D86650F');
        $this->addSql('ALTER TABLE rules DROP FOREIGN KEY FK_899A993CCDB01426');
        $this->addSql('DROP TABLE card_type');
        $this->addSql('DROP TABLE cards');
        $this->addSql('DROP TABLE news');
        $this->addSql('DROP TABLE news_status');
        $this->addSql('DROP TABLE order_items');
        $this->addSql('DROP TABLE order_status');
        $this->addSql('DROP TABLE orders');
        $this->addSql('DROP TABLE packs');
        $this->addSql('DROP TABLE pages');
        $this->addSql('DROP TABLE rules');
        $this->addSql('DROP TABLE users');
    }
}
