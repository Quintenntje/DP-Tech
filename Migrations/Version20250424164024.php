<?php

declare(strict_types=1);

namespace Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250424164024 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // Insert into machines
        $this->addSql("INSERT INTO machines (ProductID, Soort, Merk, Model, Prijs, Gewicht, Bouwjaar, Aandrijving, Aankoopdag, Hoeveelheid, img_path) VALUES
        (7, 'Heftruck', 'Grendia', 'FG 45', 15000, 4500, '2001', 'Diesel', '2022-12-01', 2, 'images/Machines/FG45.jpg'),
        (8, 'Heftruck', 'Fenwick', 'H30', 13500, 3000, '2001', 'Diesel', '2022-12-01', 1, 'images/Machines/H30.jpg'),
        (9, 'Houtversnipperaar', 'Jensen', 'A231', 15000, 1400, '2019', 'Diesel', '2022-12-01', 1, 'images/Machines/A231.jpg'),
        (10, 'Heftruck', 'Yale', 'GLP30TF', 8500, 4450, '1996', 'Elektrisch', '2022-12-01', 1, 'images/Machines/GLP30TF.jpg'),
        (11, 'Heftruck', 'Clark', 'C500Y', 1000, 900, '1996', 'Diesel', '2022-12-01', 1, 'images/Machines/C500Y.jpg'),
        (12, 'Houtversnipperaar', 'Boxer', 'HV106', 1475, 196, '2016', 'Diesel', '2022-12-01', 1, 'images/Machines/HV106.jpg'),
        (13, 'Houtversnipperaar', 'GEO', 'ECO7', 1470, 110, '2016', 'Diesel / Elektrische start', '2022-12-01', 1, 'images/Machines/ECO7.jpg'),
        (14, 'Tractor', 'New Holland', 'T7040', 38800, 7400, '2010', 'Diesel', '2022-12-01', 1, 'images/Machines/T7040.jpg'),
        (26, 'Hoogtewerker', 'JLG', 'E450AJ', 9000, 6565, '2005', 'Elektrisch', '2023-05-10', 2, 'images/Machines/E450AJ.jpg'),
        (27, 'Hoogtewerker', 'JLG', '660SJ', 25900, 12720, '2017', 'Diesel', '2023-05-30', 1, 'images/Machines/660SJ.jpg'),
        (28, 'Hoogtewerker', 'Magni', 'MJP11.5', 25250, 2950, '2023', 'Elektrisch', '2023-02-08', 1, 'images/Machines/MJP11.5.jpg')");

        // Insert into inlogklant (only Quinten + Alessio)
        $this->addSql("INSERT INTO inlogklant (KlantNummer, Naam, Email, Wachtwoord, isAdmin) VALUES
        (1, 'Claes Quinten', 'quintenClaes7@gmail.com', '$2y$10$lFn9eVhslUaFkD.R50DizuSJflJghdx4J9P4tzHQBNPF.aa79R/Ei', 1),
        (10, 'Depaepe Alessio', 'alessiodepaepe@gmail.com', '$2y$10$jMA4vTDI4dtSDFN0agPoLOMweQnBkWE94vqbCDafzJqXV.hBkPFX2', 1)");

        // Insert into bestellingen
        $this->addSql("INSERT INTO bestellingen (BestellingNummer, KlantNummer, Naam, Email, Postcode, Gemeente, Adres, ProductID, Merk, Model, Prijs, Hoeveelheid, Aankoopdag) VALUES
        (10, 1, 'Claes Quinten', 'quintenClaes7@gmail.com', '9290', 'Ovemere', 'Kleine Tepelstraat 69', 7, 'Grendia', 'FG 45', 15000, 1, '2023-05-27'),
        (12, 4, 'Claes Quinten', 'quintenClaes8@gmail.com', '9290', 'Ovemere', 'Kleine Tepelstraat 69', 6, 'JLG', 'E450AJ', 9000, 1, '2023-05-28'),
        (13, 4, 'Claes Quinten', 'quintenClaes8@gmail.com', '9290', 'Ovemere', 'Kleine Tepelstraat 69', 8, 'Fenwick', 'H30', 13500, 1, '2023-05-28'),
        (15, 4, 'Claes Quinten', 'quintenClaes8@gmail.com', '9200', 'Gent', 'boempje straat 19', 9, 'Jensen', 'A231', 15000, 1, '2023-05-28'),
        (16, 1, 'Claes Quinten', 'quintenClaes7@gmail.com', '9290', 'Gent', 'boempje straat 19', 28, 'Magni', 'MJP11.5', 25250, 1, '2023-05-28'),
        (17, 4, 'Claes Quinten', 'quintenClaes8@gmail.com', '9290', 'Gent', 'boempje straat 19', 8, 'Fenwick', 'H30', 13500, 1, '2023-05-29')");
    }



    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
