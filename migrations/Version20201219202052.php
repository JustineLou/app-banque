<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201219202052 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE beneficiary DROP INDEX IDX_7ABF446AA76ED395, ADD UNIQUE INDEX UNIQ_7ABF446AA76ED395 (user_id)');
        $this->addSql('ALTER TABLE beneficiary CHANGE user_id user_id INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE beneficiary DROP INDEX UNIQ_7ABF446AA76ED395, ADD INDEX IDX_7ABF446AA76ED395 (user_id)');
        $this->addSql('ALTER TABLE beneficiary CHANGE user_id user_id INT DEFAULT NULL');
    }
}
