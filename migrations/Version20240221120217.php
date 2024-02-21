<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240221120217 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE academic_year (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(255) NOT NULL, start_date DATE NOT NULL, end_date DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE activity (id INT AUTO_INCREMENT NOT NULL, academic_year_id INT NOT NULL, professional_id INT DEFAULT NULL, amount INT NOT NULL, description VARCHAR(255) NOT NULL, details LONGTEXT DEFAULT NULL, start_date DATE NOT NULL, end_date DATE NOT NULL, type VARCHAR(255) NOT NULL, INDEX IDX_AC74095AC54F3401 (academic_year_id), INDEX IDX_AC74095ADB77003 (professional_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE annual_activity (id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE app_user (id INT AUTO_INCREMENT NOT NULL, professional_id INT DEFAULT NULL, user_name VARCHAR(15) NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_88BDF3E924A232CF (user_name), UNIQUE INDEX UNIQ_88BDF3E9DB77003 (professional_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enrollment (id INT AUTO_INCREMENT NOT NULL, member_id INT NOT NULL, activity_id INT NOT NULL, start_date DATE NOT NULL, end_date DATE NOT NULL, INDEX IDX_DBDCD7E17597D3FE (member_id), INDEX IDX_DBDCD7E181C06096 (activity_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fee (id INT AUTO_INCREMENT NOT NULL, member_id INT NOT NULL, academic_year_id INT NOT NULL, amount INT NOT NULL, concept VARCHAR(255) NOT NULL, paid TINYINT(1) NOT NULL, details LONGTEXT DEFAULT NULL, issue_date DATE NOT NULL, charge_date DATE DEFAULT NULL, rejection_date DATE DEFAULT NULL, extra_amount INT NOT NULL, INDEX IDX_964964B57597D3FE (member_id), INDEX IDX_964964B5C54F3401 (academic_year_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `member` (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, zip_code VARCHAR(255) NOT NULL, guardian_first_name VARCHAR(255) DEFAULT NULL, guardian_last_name VARCHAR(255) DEFAULT NULL, iban VARCHAR(255) NOT NULL, birthday DATE DEFAULT NULL, membership_card_number VARCHAR(255) NOT NULL, details LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE member_academic_year (member_id INT NOT NULL, academic_year_id INT NOT NULL, INDEX IDX_C44C5FAD7597D3FE (member_id), INDEX IDX_C44C5FADC54F3401 (academic_year_id), PRIMARY KEY(member_id, academic_year_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE monthly_activity (id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE non_school_day (id INT AUTO_INCREMENT NOT NULL, academic_year_id INT NOT NULL, date DATE NOT NULL, description VARCHAR(255) DEFAULT NULL, INDEX IDX_BFD4F6BCC54F3401 (academic_year_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE professional (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_B3B573AA6DE44026 (description), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE weekly_activity (id INT NOT NULL, day_of_week INT NOT NULL, start_hour TIME NOT NULL, end_hour TIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE activity ADD CONSTRAINT FK_AC74095AC54F3401 FOREIGN KEY (academic_year_id) REFERENCES academic_year (id)');
        $this->addSql('ALTER TABLE activity ADD CONSTRAINT FK_AC74095ADB77003 FOREIGN KEY (professional_id) REFERENCES professional (id)');
        $this->addSql('ALTER TABLE annual_activity ADD CONSTRAINT FK_1D9092DDBF396750 FOREIGN KEY (id) REFERENCES activity (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE app_user ADD CONSTRAINT FK_88BDF3E9DB77003 FOREIGN KEY (professional_id) REFERENCES professional (id)');
        $this->addSql('ALTER TABLE enrollment ADD CONSTRAINT FK_DBDCD7E17597D3FE FOREIGN KEY (member_id) REFERENCES `member` (id)');
        $this->addSql('ALTER TABLE enrollment ADD CONSTRAINT FK_DBDCD7E181C06096 FOREIGN KEY (activity_id) REFERENCES activity (id)');
        $this->addSql('ALTER TABLE fee ADD CONSTRAINT FK_964964B57597D3FE FOREIGN KEY (member_id) REFERENCES `member` (id)');
        $this->addSql('ALTER TABLE fee ADD CONSTRAINT FK_964964B5C54F3401 FOREIGN KEY (academic_year_id) REFERENCES academic_year (id)');
        $this->addSql('ALTER TABLE member_academic_year ADD CONSTRAINT FK_C44C5FAD7597D3FE FOREIGN KEY (member_id) REFERENCES `member` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE member_academic_year ADD CONSTRAINT FK_C44C5FADC54F3401 FOREIGN KEY (academic_year_id) REFERENCES academic_year (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE monthly_activity ADD CONSTRAINT FK_ED7C2681BF396750 FOREIGN KEY (id) REFERENCES activity (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE non_school_day ADD CONSTRAINT FK_BFD4F6BCC54F3401 FOREIGN KEY (academic_year_id) REFERENCES academic_year (id)');
        $this->addSql('ALTER TABLE weekly_activity ADD CONSTRAINT FK_3CC36467BF396750 FOREIGN KEY (id) REFERENCES activity (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activity DROP FOREIGN KEY FK_AC74095AC54F3401');
        $this->addSql('ALTER TABLE activity DROP FOREIGN KEY FK_AC74095ADB77003');
        $this->addSql('ALTER TABLE annual_activity DROP FOREIGN KEY FK_1D9092DDBF396750');
        $this->addSql('ALTER TABLE app_user DROP FOREIGN KEY FK_88BDF3E9DB77003');
        $this->addSql('ALTER TABLE enrollment DROP FOREIGN KEY FK_DBDCD7E17597D3FE');
        $this->addSql('ALTER TABLE enrollment DROP FOREIGN KEY FK_DBDCD7E181C06096');
        $this->addSql('ALTER TABLE fee DROP FOREIGN KEY FK_964964B57597D3FE');
        $this->addSql('ALTER TABLE fee DROP FOREIGN KEY FK_964964B5C54F3401');
        $this->addSql('ALTER TABLE member_academic_year DROP FOREIGN KEY FK_C44C5FAD7597D3FE');
        $this->addSql('ALTER TABLE member_academic_year DROP FOREIGN KEY FK_C44C5FADC54F3401');
        $this->addSql('ALTER TABLE monthly_activity DROP FOREIGN KEY FK_ED7C2681BF396750');
        $this->addSql('ALTER TABLE non_school_day DROP FOREIGN KEY FK_BFD4F6BCC54F3401');
        $this->addSql('ALTER TABLE weekly_activity DROP FOREIGN KEY FK_3CC36467BF396750');
        $this->addSql('DROP TABLE academic_year');
        $this->addSql('DROP TABLE activity');
        $this->addSql('DROP TABLE annual_activity');
        $this->addSql('DROP TABLE app_user');
        $this->addSql('DROP TABLE enrollment');
        $this->addSql('DROP TABLE fee');
        $this->addSql('DROP TABLE `member`');
        $this->addSql('DROP TABLE member_academic_year');
        $this->addSql('DROP TABLE monthly_activity');
        $this->addSql('DROP TABLE non_school_day');
        $this->addSql('DROP TABLE professional');
        $this->addSql('DROP TABLE weekly_activity');
    }
}
