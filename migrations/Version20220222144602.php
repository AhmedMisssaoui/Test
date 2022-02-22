<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220222144602 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE arbitre (id INT AUTO_INCREMENT NOT NULL, nom_a VARCHAR(255) NOT NULL, nbe INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, titre VARCHAR(255) NOT NULL, descr VARCHAR(255) NOT NULL, datea DATE NOT NULL, img VARCHAR(255) NOT NULL, INDEX IDX_23A0E66A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE badge (id INT AUTO_INCREMENT NOT NULL, nom_b VARCHAR(255) NOT NULL, logo_b VARCHAR(255) NOT NULL, nb INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, type_c VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classement (id INT AUTO_INCREMENT NOT NULL, club_id INT NOT NULL, tournoi_id INT NOT NULL, INDEX IDX_55EE9D6D61190A32 (club_id), INDEX IDX_55EE9D6DF607770A (tournoi_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE club (id INT AUTO_INCREMENT NOT NULL, sponsor_id INT DEFAULT NULL, nomc VARCHAR(255) NOT NULL, logo VARCHAR(255) NOT NULL, descr VARCHAR(255) NOT NULL, INDEX IDX_B8EE387212F7FB51 (sponsor_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, prix_u DOUBLE PRECISION NOT NULL, qte INT NOT NULL, date DATE NOT NULL, id_p INT NOT NULL, id_u INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE game (id INT AUTO_INCREMENT NOT NULL, club1_id INT NOT NULL, club2_id INT NOT NULL, arbitre_id INT NOT NULL, stade_id INT NOT NULL, r1 INT NOT NULL, r2 INT NOT NULL, dated DATE NOT NULL, status VARCHAR(255) NOT NULL, INDEX IDX_232B318C1EDA6519 (club1_id), INDEX IDX_232B318CC6FCAF7 (club2_id), INDEX IDX_232B318C943A5F0 (arbitre_id), INDEX IDX_232B318C6538AB43 (stade_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE interaction (idi INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, article_id INT NOT NULL, type VARCHAR(255) NOT NULL, descrp VARCHAR(255) DEFAULT NULL, INDEX IDX_378DFDA7A76ED395 (user_id), INDEX IDX_378DFDA77294869C (article_id), PRIMARY KEY(idi)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE joueur (cin INT AUTO_INCREMENT NOT NULL, club_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, age INT NOT NULL, nbm INT NOT NULL, nba INT NOT NULL, INDEX IDX_FD71A9C561190A32 (club_id), PRIMARY KEY(cin)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE marques (id INT AUTO_INCREMENT NOT NULL, nom_m VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, categorie_id INT NOT NULL, marquep_id INT DEFAULT NULL, nom_p VARCHAR(255) NOT NULL, taille VARCHAR(255) NOT NULL, couleur VARCHAR(255) NOT NULL, prix DOUBLE PRECISION NOT NULL, descr VARCHAR(255) DEFAULT NULL, qte INT NOT NULL, img VARCHAR(255) NOT NULL, taille2 VARCHAR(255) NOT NULL, date_ajout DATE DEFAULT NULL, INDEX IDX_29A5EC27BCF5E72D (categorie_id), INDEX IDX_29A5EC27D0E3E7D2 (marquep_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reclamation (idr INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, objet VARCHAR(255) NOT NULL, desc_r VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, INDEX IDX_CE606404A76ED395 (user_id), PRIMARY KEY(idr)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rewards (id_r INT AUTO_INCREMENT NOT NULL, tournoi_id INT NOT NULL, rank INT NOT NULL, trophe VARCHAR(255) NOT NULL, prix_r DOUBLE PRECISION NOT NULL, img VARCHAR(255) NOT NULL, INDEX IDX_E9221E37F607770A (tournoi_id), PRIMARY KEY(id_r)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sponsor (id INT AUTO_INCREMENT NOT NULL, nom_s VARCHAR(255) NOT NULL, logo_s VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stade (id INT AUTO_INCREMENT NOT NULL, lieu VARCHAR(255) NOT NULL, noms VARCHAR(255) NOT NULL, etat VARCHAR(255) NOT NULL, nbr_p INT NOT NULL, photo VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tournoi (id INT AUTO_INCREMENT NOT NULL, nomt VARCHAR(255) NOT NULL, dated DATE NOT NULL, datef DATE NOT NULL, typet VARCHAR(255) NOT NULL, nbrc INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, badge_id INT DEFAULT NULL, username VARCHAR(255) NOT NULL, mdp VARCHAR(255) NOT NULL, nbp INT NOT NULL, email VARCHAR(255) NOT NULL, role VARCHAR(255) NOT NULL, img VARCHAR(255) NOT NULL, INDEX IDX_8D93D649F7A2C2FC (badge_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE classement ADD CONSTRAINT FK_55EE9D6D61190A32 FOREIGN KEY (club_id) REFERENCES club (id)');
        $this->addSql('ALTER TABLE classement ADD CONSTRAINT FK_55EE9D6DF607770A FOREIGN KEY (tournoi_id) REFERENCES tournoi (id)');
        $this->addSql('ALTER TABLE club ADD CONSTRAINT FK_B8EE387212F7FB51 FOREIGN KEY (sponsor_id) REFERENCES sponsor (id)');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318C1EDA6519 FOREIGN KEY (club1_id) REFERENCES club (id)');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318CC6FCAF7 FOREIGN KEY (club2_id) REFERENCES club (id)');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318C943A5F0 FOREIGN KEY (arbitre_id) REFERENCES arbitre (id)');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318C6538AB43 FOREIGN KEY (stade_id) REFERENCES stade (id)');
        $this->addSql('ALTER TABLE interaction ADD CONSTRAINT FK_378DFDA7A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE interaction ADD CONSTRAINT FK_378DFDA77294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE joueur ADD CONSTRAINT FK_FD71A9C561190A32 FOREIGN KEY (club_id) REFERENCES club (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27D0E3E7D2 FOREIGN KEY (marquep_id) REFERENCES marques (id)');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE606404A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE rewards ADD CONSTRAINT FK_E9221E37F607770A FOREIGN KEY (tournoi_id) REFERENCES tournoi (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649F7A2C2FC FOREIGN KEY (badge_id) REFERENCES badge (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE game DROP FOREIGN KEY FK_232B318C943A5F0');
        $this->addSql('ALTER TABLE interaction DROP FOREIGN KEY FK_378DFDA77294869C');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649F7A2C2FC');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27BCF5E72D');
        $this->addSql('ALTER TABLE classement DROP FOREIGN KEY FK_55EE9D6D61190A32');
        $this->addSql('ALTER TABLE game DROP FOREIGN KEY FK_232B318C1EDA6519');
        $this->addSql('ALTER TABLE game DROP FOREIGN KEY FK_232B318CC6FCAF7');
        $this->addSql('ALTER TABLE joueur DROP FOREIGN KEY FK_FD71A9C561190A32');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27D0E3E7D2');
        $this->addSql('ALTER TABLE club DROP FOREIGN KEY FK_B8EE387212F7FB51');
        $this->addSql('ALTER TABLE game DROP FOREIGN KEY FK_232B318C6538AB43');
        $this->addSql('ALTER TABLE classement DROP FOREIGN KEY FK_55EE9D6DF607770A');
        $this->addSql('ALTER TABLE rewards DROP FOREIGN KEY FK_E9221E37F607770A');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66A76ED395');
        $this->addSql('ALTER TABLE interaction DROP FOREIGN KEY FK_378DFDA7A76ED395');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE606404A76ED395');
        $this->addSql('DROP TABLE arbitre');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE badge');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE classement');
        $this->addSql('DROP TABLE club');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE game');
        $this->addSql('DROP TABLE interaction');
        $this->addSql('DROP TABLE joueur');
        $this->addSql('DROP TABLE marques');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE reclamation');
        $this->addSql('DROP TABLE rewards');
        $this->addSql('DROP TABLE sponsor');
        $this->addSql('DROP TABLE stade');
        $this->addSql('DROP TABLE tournoi');
        $this->addSql('DROP TABLE user');
    }
}
