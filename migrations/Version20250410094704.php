<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250410094704 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE invoice_id_seq CASCADE');
        $this->addSql('CREATE TABLE vehicle (id SERIAL NOT NULL, brand VARCHAR(255) NOT NULL, model VARCHAR(255) NOT NULL, daily_rate DOUBLE PRECISION NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE invoice DROP CONSTRAINT fk_90651744b03a8386');
        $this->addSql('ALTER TABLE invoice DROP CONSTRAINT fk_906517447f9bc654');
        $this->addSql('DROP TABLE invoice');
        $this->addSql('ALTER TABLE "user" ADD nom VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE "user" ADD prenom VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE "user" ADD date_obtention_permis DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE "user" RENAME COLUMN password TO mot_de_passe');
        $this->addSql('ALTER INDEX uniq_identifier_email RENAME TO UNIQ_8D93D649E7927C74');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE invoice_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE invoice (id SERIAL NOT NULL, created_by_id INT DEFAULT NULL, paid_by_id INT DEFAULT NULL, price DOUBLE PRECISION NOT NULL, created_at DATE NOT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, status VARCHAR(255) NOT NULL, paid_at DATE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_906517447f9bc654 ON invoice (paid_by_id)');
        $this->addSql('CREATE INDEX idx_90651744b03a8386 ON invoice (created_by_id)');
        $this->addSql('ALTER TABLE invoice ADD CONSTRAINT fk_90651744b03a8386 FOREIGN KEY (created_by_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE invoice ADD CONSTRAINT fk_906517447f9bc654 FOREIGN KEY (paid_by_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE vehicle');
        $this->addSql('ALTER TABLE "user" ADD password VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE "user" DROP mot_de_passe');
        $this->addSql('ALTER TABLE "user" DROP nom');
        $this->addSql('ALTER TABLE "user" DROP prenom');
        $this->addSql('ALTER TABLE "user" DROP date_obtention_permis');
        $this->addSql('ALTER INDEX uniq_8d93d649e7927c74 RENAME TO uniq_identifier_email');
    }
}
