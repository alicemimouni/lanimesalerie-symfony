<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211031153604 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE state (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `order` ADD tva_rate_id INT NOT NULL, ADD cart_id INT NOT NULL, ADD state_id INT NOT NULL, ADD means_payment_id INT NOT NULL');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F529939838C0512E FOREIGN KEY (tva_rate_id) REFERENCES tva_rate (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F52993981AD5CDBF FOREIGN KEY (cart_id) REFERENCES cart (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F52993985D83CC1 FOREIGN KEY (state_id) REFERENCES state (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F529939817157679 FOREIGN KEY (means_payment_id) REFERENCES meanspayment (id)');
        $this->addSql('CREATE INDEX IDX_F529939838C0512E ON `order` (tva_rate_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F52993981AD5CDBF ON `order` (cart_id)');
        $this->addSql('CREATE INDEX IDX_F52993985D83CC1 ON `order` (state_id)');
        $this->addSql('CREATE INDEX IDX_F529939817157679 ON `order` (means_payment_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F52993985D83CC1');
        $this->addSql('DROP TABLE state');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F529939838C0512E');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F52993981AD5CDBF');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F529939817157679');
        $this->addSql('DROP INDEX IDX_F529939838C0512E ON `order`');
        $this->addSql('DROP INDEX UNIQ_F52993981AD5CDBF ON `order`');
        $this->addSql('DROP INDEX IDX_F52993985D83CC1 ON `order`');
        $this->addSql('DROP INDEX IDX_F529939817157679 ON `order`');
        $this->addSql('ALTER TABLE `order` DROP tva_rate_id, DROP cart_id, DROP state_id, DROP means_payment_id');
    }
}
