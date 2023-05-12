<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230512145754 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE route_type (route_id INT NOT NULL, type_id INT NOT NULL, INDEX IDX_219B56AC34ECB4E6 (route_id), INDEX IDX_219B56ACC54C8C93 (type_id), PRIMARY KEY(route_id, type_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE route_bleau_video (route_id INT NOT NULL, bleau_video_id INT NOT NULL, INDEX IDX_655C76AB34ECB4E6 (route_id), INDEX IDX_655C76ABF8821C5A (bleau_video_id), PRIMARY KEY(route_id, bleau_video_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE route_bleau_image (route_id INT NOT NULL, bleau_image_id INT NOT NULL, INDEX IDX_DCA6A8D834ECB4E6 (route_id), INDEX IDX_DCA6A8D8ECE63979 (bleau_image_id), PRIMARY KEY(route_id, bleau_image_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE route_bleau_description (route_id INT NOT NULL, bleau_description_id INT NOT NULL, INDEX IDX_A230E88B34ECB4E6 (route_id), INDEX IDX_A230E88B352204B1 (bleau_description_id), PRIMARY KEY(route_id, bleau_description_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE route_circuit (route_id INT NOT NULL, circuit_id INT NOT NULL, INDEX IDX_EB76AE3E34ECB4E6 (route_id), INDEX IDX_EB76AE3ECF2182C8 (circuit_id), PRIMARY KEY(route_id, circuit_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE route_type ADD CONSTRAINT FK_219B56AC34ECB4E6 FOREIGN KEY (route_id) REFERENCES route (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE route_type ADD CONSTRAINT FK_219B56ACC54C8C93 FOREIGN KEY (type_id) REFERENCES type (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE route_bleau_video ADD CONSTRAINT FK_655C76AB34ECB4E6 FOREIGN KEY (route_id) REFERENCES route (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE route_bleau_video ADD CONSTRAINT FK_655C76ABF8821C5A FOREIGN KEY (bleau_video_id) REFERENCES bleau_video (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE route_bleau_image ADD CONSTRAINT FK_DCA6A8D834ECB4E6 FOREIGN KEY (route_id) REFERENCES route (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE route_bleau_image ADD CONSTRAINT FK_DCA6A8D8ECE63979 FOREIGN KEY (bleau_image_id) REFERENCES bleau_image (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE route_bleau_description ADD CONSTRAINT FK_A230E88B34ECB4E6 FOREIGN KEY (route_id) REFERENCES route (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE route_bleau_description ADD CONSTRAINT FK_A230E88B352204B1 FOREIGN KEY (bleau_description_id) REFERENCES bleau_description (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE route_circuit ADD CONSTRAINT FK_EB76AE3E34ECB4E6 FOREIGN KEY (route_id) REFERENCES route (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE route_circuit ADD CONSTRAINT FK_EB76AE3ECF2182C8 FOREIGN KEY (circuit_id) REFERENCES circuit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE color ADD circuits_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE color ADD CONSTRAINT FK_665648E97201D625 FOREIGN KEY (circuits_id) REFERENCES circuit (id)');
        $this->addSql('CREATE INDEX IDX_665648E97201D625 ON color (circuits_id)');
        $this->addSql('ALTER TABLE image ADD users_id INT DEFAULT NULL, ADD routes_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F67B3B43D FOREIGN KEY (users_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045FAE2C16DC FOREIGN KEY (routes_id) REFERENCES route (id)');
        $this->addSql('CREATE INDEX IDX_C53D045F67B3B43D ON image (users_id)');
        $this->addSql('CREATE INDEX IDX_C53D045FAE2C16DC ON image (routes_id)');
        $this->addSql('ALTER TABLE route ADD sectors_id INT DEFAULT NULL, ADD setters_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE route ADD CONSTRAINT FK_2C420793479DC16 FOREIGN KEY (sectors_id) REFERENCES sector (id)');
        $this->addSql('ALTER TABLE route ADD CONSTRAINT FK_2C42079E39CC742 FOREIGN KEY (setters_id) REFERENCES setter (id)');
        $this->addSql('CREATE INDEX IDX_2C420793479DC16 ON route (sectors_id)');
        $this->addSql('CREATE INDEX IDX_2C42079E39CC742 ON route (setters_id)');
        $this->addSql('ALTER TABLE sector ADD regions_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sector ADD CONSTRAINT FK_4BA3D9E8FCE83E5F FOREIGN KEY (regions_id) REFERENCES region (id)');
        $this->addSql('CREATE INDEX IDX_4BA3D9E8FCE83E5F ON sector (regions_id)');
        $this->addSql('ALTER TABLE video ADD users_id INT DEFAULT NULL, ADD routes_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE video ADD CONSTRAINT FK_7CC7DA2C67B3B43D FOREIGN KEY (users_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE video ADD CONSTRAINT FK_7CC7DA2CAE2C16DC FOREIGN KEY (routes_id) REFERENCES route (id)');
        $this->addSql('CREATE INDEX IDX_7CC7DA2C67B3B43D ON video (users_id)');
        $this->addSql('CREATE INDEX IDX_7CC7DA2CAE2C16DC ON video (routes_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE route_type DROP FOREIGN KEY FK_219B56AC34ECB4E6');
        $this->addSql('ALTER TABLE route_type DROP FOREIGN KEY FK_219B56ACC54C8C93');
        $this->addSql('ALTER TABLE route_bleau_video DROP FOREIGN KEY FK_655C76AB34ECB4E6');
        $this->addSql('ALTER TABLE route_bleau_video DROP FOREIGN KEY FK_655C76ABF8821C5A');
        $this->addSql('ALTER TABLE route_bleau_image DROP FOREIGN KEY FK_DCA6A8D834ECB4E6');
        $this->addSql('ALTER TABLE route_bleau_image DROP FOREIGN KEY FK_DCA6A8D8ECE63979');
        $this->addSql('ALTER TABLE route_bleau_description DROP FOREIGN KEY FK_A230E88B34ECB4E6');
        $this->addSql('ALTER TABLE route_bleau_description DROP FOREIGN KEY FK_A230E88B352204B1');
        $this->addSql('ALTER TABLE route_circuit DROP FOREIGN KEY FK_EB76AE3E34ECB4E6');
        $this->addSql('ALTER TABLE route_circuit DROP FOREIGN KEY FK_EB76AE3ECF2182C8');
        $this->addSql('DROP TABLE route_type');
        $this->addSql('DROP TABLE route_bleau_video');
        $this->addSql('DROP TABLE route_bleau_image');
        $this->addSql('DROP TABLE route_bleau_description');
        $this->addSql('DROP TABLE route_circuit');
        $this->addSql('ALTER TABLE route DROP FOREIGN KEY FK_2C420793479DC16');
        $this->addSql('ALTER TABLE route DROP FOREIGN KEY FK_2C42079E39CC742');
        $this->addSql('DROP INDEX IDX_2C420793479DC16 ON route');
        $this->addSql('DROP INDEX IDX_2C42079E39CC742 ON route');
        $this->addSql('ALTER TABLE route DROP sectors_id, DROP setters_id');
        $this->addSql('ALTER TABLE video DROP FOREIGN KEY FK_7CC7DA2C67B3B43D');
        $this->addSql('ALTER TABLE video DROP FOREIGN KEY FK_7CC7DA2CAE2C16DC');
        $this->addSql('DROP INDEX IDX_7CC7DA2C67B3B43D ON video');
        $this->addSql('DROP INDEX IDX_7CC7DA2CAE2C16DC ON video');
        $this->addSql('ALTER TABLE video DROP users_id, DROP routes_id');
        $this->addSql('ALTER TABLE sector DROP FOREIGN KEY FK_4BA3D9E8FCE83E5F');
        $this->addSql('DROP INDEX IDX_4BA3D9E8FCE83E5F ON sector');
        $this->addSql('ALTER TABLE sector DROP regions_id');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F67B3B43D');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045FAE2C16DC');
        $this->addSql('DROP INDEX IDX_C53D045F67B3B43D ON image');
        $this->addSql('DROP INDEX IDX_C53D045FAE2C16DC ON image');
        $this->addSql('ALTER TABLE image DROP users_id, DROP routes_id');
        $this->addSql('ALTER TABLE color DROP FOREIGN KEY FK_665648E97201D625');
        $this->addSql('DROP INDEX IDX_665648E97201D625 ON color');
        $this->addSql('ALTER TABLE color DROP circuits_id');
    }
}
