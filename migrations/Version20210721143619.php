<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210721143619 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE detail (id INT AUTO_INCREMENT NOT NULL, avatar_id INT DEFAULT NULL, header VARCHAR(255) DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, zip_code VARCHAR(255) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, tel VARCHAR(255) DEFAULT NULL, linkedin VARCHAR(255) DEFAULT NULL, github VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_2E067F9386383B10 (avatar_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE experience (id INT AUTO_INCREMENT NOT NULL, resume_id INT DEFAULT NULL, job_name VARCHAR(255) DEFAULT NULL, employer VARCHAR(255) DEFAULT NULL, year_start DATETIME DEFAULT NULL, year_end DATETIME DEFAULT NULL, description LONGTEXT DEFAULT NULL, INDEX IDX_590C103D262AF09 (resume_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hobby (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE language (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, level VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profile (id INT AUTO_INCREMENT NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE resume (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, template_id INT DEFAULT NULL, detail_id INT DEFAULT NULL, profile_id INT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, html LONGTEXT DEFAULT NULL, INDEX IDX_60C1D0A0A76ED395 (user_id), UNIQUE INDEX UNIQ_60C1D0A05DA0FB8 (template_id), UNIQUE INDEX UNIQ_60C1D0A0D8D003BB (detail_id), UNIQUE INDEX UNIQ_60C1D0A0CCFA12B8 (profile_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE resume_hobby (resume_id INT NOT NULL, hobby_id INT NOT NULL, INDEX IDX_A593335FD262AF09 (resume_id), INDEX IDX_A593335F322B2123 (hobby_id), PRIMARY KEY(resume_id, hobby_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE resume_language (resume_id INT NOT NULL, language_id INT NOT NULL, INDEX IDX_7A3C5B40D262AF09 (resume_id), INDEX IDX_7A3C5B4082F1BAF4 (language_id), PRIMARY KEY(resume_id, language_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scholarship (id INT AUTO_INCREMENT NOT NULL, resume_id INT DEFAULT NULL, graduation VARCHAR(255) DEFAULT NULL, year_start DATETIME DEFAULT NULL, year_end DATETIME DEFAULT NULL, description LONGTEXT DEFAULT NULL, INDEX IDX_F3FD63FD262AF09 (resume_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill (id INT AUTO_INCREMENT NOT NULL, resume_id INT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, INDEX IDX_5E3DE477D262AF09 (resume_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE template (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, html LONGTEXT DEFAULT NULL, theme VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE detail ADD CONSTRAINT FK_2E067F9386383B10 FOREIGN KEY (avatar_id) REFERENCES avatar (id)');
        $this->addSql('ALTER TABLE experience ADD CONSTRAINT FK_590C103D262AF09 FOREIGN KEY (resume_id) REFERENCES resume (id)');
        $this->addSql('ALTER TABLE resume ADD CONSTRAINT FK_60C1D0A0A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE resume ADD CONSTRAINT FK_60C1D0A05DA0FB8 FOREIGN KEY (template_id) REFERENCES template (id)');
        $this->addSql('ALTER TABLE resume ADD CONSTRAINT FK_60C1D0A0D8D003BB FOREIGN KEY (detail_id) REFERENCES detail (id)');
        $this->addSql('ALTER TABLE resume ADD CONSTRAINT FK_60C1D0A0CCFA12B8 FOREIGN KEY (profile_id) REFERENCES profile (id)');
        $this->addSql('ALTER TABLE resume_hobby ADD CONSTRAINT FK_A593335FD262AF09 FOREIGN KEY (resume_id) REFERENCES resume (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE resume_hobby ADD CONSTRAINT FK_A593335F322B2123 FOREIGN KEY (hobby_id) REFERENCES hobby (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE resume_language ADD CONSTRAINT FK_7A3C5B40D262AF09 FOREIGN KEY (resume_id) REFERENCES resume (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE resume_language ADD CONSTRAINT FK_7A3C5B4082F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE scholarship ADD CONSTRAINT FK_F3FD63FD262AF09 FOREIGN KEY (resume_id) REFERENCES resume (id)');
        $this->addSql('ALTER TABLE skill ADD CONSTRAINT FK_5E3DE477D262AF09 FOREIGN KEY (resume_id) REFERENCES resume (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE resume DROP FOREIGN KEY FK_60C1D0A0D8D003BB');
        $this->addSql('ALTER TABLE resume_hobby DROP FOREIGN KEY FK_A593335F322B2123');
        $this->addSql('ALTER TABLE resume_language DROP FOREIGN KEY FK_7A3C5B4082F1BAF4');
        $this->addSql('ALTER TABLE resume DROP FOREIGN KEY FK_60C1D0A0CCFA12B8');
        $this->addSql('ALTER TABLE experience DROP FOREIGN KEY FK_590C103D262AF09');
        $this->addSql('ALTER TABLE resume_hobby DROP FOREIGN KEY FK_A593335FD262AF09');
        $this->addSql('ALTER TABLE resume_language DROP FOREIGN KEY FK_7A3C5B40D262AF09');
        $this->addSql('ALTER TABLE scholarship DROP FOREIGN KEY FK_F3FD63FD262AF09');
        $this->addSql('ALTER TABLE skill DROP FOREIGN KEY FK_5E3DE477D262AF09');
        $this->addSql('ALTER TABLE resume DROP FOREIGN KEY FK_60C1D0A05DA0FB8');
        $this->addSql('ALTER TABLE resume DROP FOREIGN KEY FK_60C1D0A0A76ED395');
        $this->addSql('DROP TABLE detail');
        $this->addSql('DROP TABLE experience');
        $this->addSql('DROP TABLE hobby');
        $this->addSql('DROP TABLE language');
        $this->addSql('DROP TABLE profile');
        $this->addSql('DROP TABLE resume');
        $this->addSql('DROP TABLE resume_hobby');
        $this->addSql('DROP TABLE resume_language');
        $this->addSql('DROP TABLE scholarship');
        $this->addSql('DROP TABLE skill');
        $this->addSql('DROP TABLE template');
        $this->addSql('DROP TABLE user');
    }
}
