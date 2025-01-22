<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250122140019 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE card_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE news_status (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_items (id INT AUTO_INCREMENT NOT NULL, order_id_id INT NOT NULL, pack_id_id INT NOT NULL, quantity INT NOT NULL, INDEX IDX_62809DB0FCDAEAAA (order_id_id), INDEX IDX_62809DB0CDB01426 (pack_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_status (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_role (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE order_items ADD CONSTRAINT FK_62809DB0FCDAEAAA FOREIGN KEY (order_id_id) REFERENCES orders (id)');
        $this->addSql('ALTER TABLE order_items ADD CONSTRAINT FK_62809DB0CDB01426 FOREIGN KEY (pack_id_id) REFERENCES packs (id)');
        $this->addSql('DROP TABLE product');
        $this->addSql('ALTER TABLE cards ADD pack_id_id INT NOT NULL, ADD type_id_id INT NOT NULL, ADD quantity INT NOT NULL');
        $this->addSql('ALTER TABLE cards ADD CONSTRAINT FK_4C258FDCDB01426 FOREIGN KEY (pack_id_id) REFERENCES packs (id)');
        $this->addSql('ALTER TABLE cards ADD CONSTRAINT FK_4C258FD714819A0 FOREIGN KEY (type_id_id) REFERENCES card_type (id)');
        $this->addSql('CREATE INDEX IDX_4C258FDCDB01426 ON cards (pack_id_id)');
        $this->addSql('CREATE INDEX IDX_4C258FD714819A0 ON cards (type_id_id)');
        $this->addSql('ALTER TABLE news ADD status_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE news ADD CONSTRAINT FK_1DD39950881ECFA7 FOREIGN KEY (status_id_id) REFERENCES news_status (id)');
        $this->addSql('CREATE INDEX IDX_1DD39950881ECFA7 ON news (status_id_id)');
        $this->addSql('ALTER TABLE orders ADD status_id_id INT NOT NULL, ADD user_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEE881ECFA7 FOREIGN KEY (status_id_id) REFERENCES order_status (id)');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEE9D86650F FOREIGN KEY (user_id_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_E52FFDEE881ECFA7 ON orders (status_id_id)');
        $this->addSql('CREATE INDEX IDX_E52FFDEE9D86650F ON orders (user_id_id)');
        $this->addSql('ALTER TABLE rules ADD pack_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE rules ADD CONSTRAINT FK_899A993CCDB01426 FOREIGN KEY (pack_id_id) REFERENCES packs (id)');
        $this->addSql('CREATE INDEX IDX_899A993CCDB01426 ON rules (pack_id_id)');
        $this->addSql('ALTER TABLE users ADD role_id_id INT NOT NULL, ADD is_verified TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E988987678 FOREIGN KEY (role_id_id) REFERENCES user_role (id)');
        $this->addSql('CREATE INDEX IDX_1483A5E988987678 ON users (role_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cards DROP FOREIGN KEY FK_4C258FD714819A0');
        $this->addSql('ALTER TABLE news DROP FOREIGN KEY FK_1DD39950881ECFA7');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEE881ECFA7');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E988987678');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE order_items DROP FOREIGN KEY FK_62809DB0FCDAEAAA');
        $this->addSql('ALTER TABLE order_items DROP FOREIGN KEY FK_62809DB0CDB01426');
        $this->addSql('DROP TABLE card_type');
        $this->addSql('DROP TABLE news_status');
        $this->addSql('DROP TABLE order_items');
        $this->addSql('DROP TABLE order_status');
        $this->addSql('DROP TABLE user_role');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEE9D86650F');
        $this->addSql('DROP INDEX IDX_E52FFDEE881ECFA7 ON orders');
        $this->addSql('DROP INDEX IDX_E52FFDEE9D86650F ON orders');
        $this->addSql('ALTER TABLE orders DROP status_id_id, DROP user_id_id');
        $this->addSql('ALTER TABLE cards DROP FOREIGN KEY FK_4C258FDCDB01426');
        $this->addSql('DROP INDEX IDX_4C258FDCDB01426 ON cards');
        $this->addSql('DROP INDEX IDX_4C258FD714819A0 ON cards');
        $this->addSql('ALTER TABLE cards DROP pack_id_id, DROP type_id_id, DROP quantity');
        $this->addSql('ALTER TABLE rules DROP FOREIGN KEY FK_899A993CCDB01426');
        $this->addSql('DROP INDEX IDX_899A993CCDB01426 ON rules');
        $this->addSql('ALTER TABLE rules DROP pack_id_id');
        $this->addSql('DROP INDEX IDX_1DD39950881ECFA7 ON news');
        $this->addSql('ALTER TABLE news DROP status_id_id');
        $this->addSql('DROP INDEX IDX_1483A5E988987678 ON users');
        $this->addSql('ALTER TABLE users DROP role_id_id, DROP is_verified');
    }
}
