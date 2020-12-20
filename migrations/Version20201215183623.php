<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201215183623 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_bank_account ADD bankaccount_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user_bank_account ADD CONSTRAINT FK_D36E4208A51AA83E FOREIGN KEY (bankaccount_id) REFERENCES bank_account (id)');
        $this->addSql('CREATE INDEX IDX_D36E4208A51AA83E ON user_bank_account (bankaccount_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_bank_account DROP FOREIGN KEY FK_D36E4208A51AA83E');
        $this->addSql('DROP INDEX IDX_D36E4208A51AA83E ON user_bank_account');
        $this->addSql('ALTER TABLE user_bank_account DROP bankaccount_id');
    }
}
