<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190606062455 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE developers (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projects (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projects_developers (project_id INT NOT NULL, developer_id INT NOT NULL, INDEX IDX_BD0EDF20166D1F9C (project_id), INDEX IDX_BD0EDF2064DD9267 (developer_id), PRIMARY KEY(project_id, developer_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE projects_developers ADD CONSTRAINT FK_BD0EDF20166D1F9C FOREIGN KEY (project_id) REFERENCES projects (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE projects_developers ADD CONSTRAINT FK_BD0EDF2064DD9267 FOREIGN KEY (developer_id) REFERENCES developers (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE projects_developers DROP FOREIGN KEY FK_BD0EDF2064DD9267');
        $this->addSql('ALTER TABLE projects_developers DROP FOREIGN KEY FK_BD0EDF20166D1F9C');
        $this->addSql('DROP TABLE developers');
        $this->addSql('DROP TABLE projects');
        $this->addSql('DROP TABLE projects_developers');
    }
}
