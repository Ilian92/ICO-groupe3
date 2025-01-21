<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250121161808 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE product');
        $this->addSql('ALTER TABLE cards ADD pack_id_id INT NOT NULL, ADD type_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE cards ADD CONSTRAINT FK_4C258FDCDB01426 FOREIGN KEY (pack_id_id) REFERENCES packs (id)');
        $this->addSql('ALTER TABLE cards ADD CONSTRAINT FK_4C258FD714819A0 FOREIGN KEY (type_id_id) REFERENCES card_type (id)');
        $this->addSql('CREATE INDEX IDX_4C258FDCDB01426 ON cards (pack_id_id)');
        $this->addSql('CREATE INDEX IDX_4C258FD714819A0 ON cards (type_id_id)');
        $this->addSql('ALTER TABLE news ADD status_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE news ADD CONSTRAINT FK_1DD39950881ECFA7 FOREIGN KEY (status_id_id) REFERENCES news_status (id)');
        $this->addSql('CREATE INDEX IDX_1DD39950881ECFA7 ON news (status_id_id)');
        $this->addSql('ALTER TABLE order_items ADD order_id_id INT NOT NULL, ADD pack_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE order_items ADD CONSTRAINT FK_62809DB0FCDAEAAA FOREIGN KEY (order_id_id) REFERENCES orders (id)');
        $this->addSql('ALTER TABLE order_items ADD CONSTRAINT FK_62809DB0CDB01426 FOREIGN KEY (pack_id_id) REFERENCES packs (id)');
        $this->addSql('CREATE INDEX IDX_62809DB0FCDAEAAA ON order_items (order_id_id)');
        $this->addSql('CREATE INDEX IDX_62809DB0CDB01426 ON order_items (pack_id_id)');
        $this->addSql('ALTER TABLE orders ADD status_id_id INT NOT NULL, ADD user_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEE881ECFA7 FOREIGN KEY (status_id_id) REFERENCES order_status (id)');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEE9D86650F FOREIGN KEY (user_id_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_E52FFDEE881ECFA7 ON orders (status_id_id)');
        $this->addSql('CREATE INDEX IDX_E52FFDEE9D86650F ON orders (user_id_id)');
        $this->addSql('ALTER TABLE users ADD role_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E988987678 FOREIGN KEY (role_id_id) REFERENCES user_role (id)');
        $this->addSql('CREATE INDEX IDX_1483A5E988987678 ON users (role_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE cards DROP FOREIGN KEY FK_4C258FDCDB01426');
        $this->addSql('ALTER TABLE cards DROP FOREIGN KEY FK_4C258FD714819A0');
        $this->addSql('DROP INDEX IDX_4C258FDCDB01426 ON cards');
        $this->addSql('DROP INDEX IDX_4C258FD714819A0 ON cards');
        $this->addSql('ALTER TABLE cards DROP pack_id_id, DROP type_id_id');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEE881ECFA7');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEE9D86650F');
        $this->addSql('DROP INDEX IDX_E52FFDEE881ECFA7 ON orders');
        $this->addSql('DROP INDEX IDX_E52FFDEE9D86650F ON orders');
        $this->addSql('ALTER TABLE orders DROP status_id_id, DROP user_id_id');
        $this->addSql('ALTER TABLE news DROP FOREIGN KEY FK_1DD39950881ECFA7');
        $this->addSql('DROP INDEX IDX_1DD39950881ECFA7 ON news');
        $this->addSql('ALTER TABLE news DROP status_id_id');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E988987678');
        $this->addSql('DROP INDEX IDX_1483A5E988987678 ON users');
        $this->addSql('ALTER TABLE users DROP role_id_id');
        $this->addSql('ALTER TABLE order_items DROP FOREIGN KEY FK_62809DB0FCDAEAAA');
        $this->addSql('ALTER TABLE order_items DROP FOREIGN KEY FK_62809DB0CDB01426');
        $this->addSql('DROP INDEX IDX_62809DB0FCDAEAAA ON order_items');
        $this->addSql('DROP INDEX IDX_62809DB0CDB01426 ON order_items');
        $this->addSql('ALTER TABLE order_items DROP order_id_id, DROP pack_id_id');
    }
}
