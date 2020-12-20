<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201215163732 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bank_account DROP FOREIGN KEY FK_53A23E0AFBB5756');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6497AC95F15');
        $this->addSql('DROP TABLE user_bank_account');
        $this->addSql('DROP INDEX IDX_53A23E0AFBB5756 ON bank_account');
        $this->addSql('ALTER TABLE bank_account ADD user_id INT NOT NULL, DROP bank_account_owner_id');
        $this->addSql('ALTER TABLE bank_account ADD CONSTRAINT FK_53A23E0AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_53A23E0AA76ED395 ON bank_account (user_id)');
        $this->addSql('DROP INDEX IDX_8D93D6497AC95F15 ON user');
        $this->addSql('ALTER TABLE user DROP bank_account_owned_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_bank_account (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE bank_account DROP FOREIGN KEY FK_53A23E0AA76ED395');
        $this->addSql('DROP INDEX IDX_53A23E0AA76ED395 ON bank_account');
        $this->addSql('ALTER TABLE bank_account ADD bank_account_owner_id INT DEFAULT NULL, DROP user_id');
        $this->addSql('ALTER TABLE bank_account ADD CONSTRAINT FK_53A23E0AFBB5756 FOREIGN KEY (bank_account_owner_id) REFERENCES user_bank_account (id)');
        $this->addSql('CREATE INDEX IDX_53A23E0AFBB5756 ON bank_account (bank_account_owner_id)');
        $this->addSql('ALTER TABLE user ADD bank_account_owned_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6497AC95F15 FOREIGN KEY (bank_account_owned_id) REFERENCES user_bank_account (id)');
        $this->addSql('CREATE INDEX IDX_8D93D6497AC95F15 ON user (bank_account_owned_id)');
    }
}
