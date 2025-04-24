<?php

declare(strict_types=1);

namespace Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250424162746 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Creating bestellingen, inlogklant, and machines tables';
    }

    public function up(Schema $schema): void
    {

        $table = $schema->createTable('bestellingen');
        $table->addColumn('BestellingNummer', 'integer', ['autoincrement' => true]);
        $table->addColumn('KlantNummer', 'integer');
        $table->addColumn('Naam', 'string', ['length' => 30]);
        $table->addColumn('Email', 'string', ['length' => 100]);
        $table->addColumn('Postcode', 'string', ['length' => 5]);
        $table->addColumn('Gemeente', 'string', ['length' => 50]);
        $table->addColumn('Adres', 'string', ['length' => 50]);
        $table->addColumn('ProductID', 'integer');
        $table->addColumn('Merk', 'string', ['length' => 50]);
        $table->addColumn('Model', 'string', ['length' => 50]);
        $table->addColumn('Prijs', 'integer');
        $table->addColumn('Hoeveelheid', 'integer');
        $table->addColumn('Aankoopdag', 'date');
        $table->setPrimaryKey(['BestellingNummer']);


        $table = $schema->createTable('inlogklant');
        $table->addColumn('KlantNummer', 'integer', ['autoincrement' => true]);
        $table->addColumn('Naam', 'string', ['length' => 100]);
        $table->addColumn('Email', 'string', ['length' => 128]);
        $table->addColumn('Wachtwoord', 'string', ['length' => 128]);
        $table->addColumn('isAdmin', 'boolean', ['default' => 0]);
        $table->setPrimaryKey(['KlantNummer']);
        $table->addIndex(['Email']);


        $table = $schema->createTable('machines');
        $table->addColumn('ProductID', 'integer', ['autoincrement' => true]);
        $table->addColumn('Soort', 'string', ['length' => 50]);
        $table->addColumn('Merk', 'string', ['length' => 50]);
        $table->addColumn('Model', 'string', ['length' => 50]);
        $table->addColumn('Prijs', 'integer');
        $table->addColumn('Gewicht', 'integer');
        $table->addColumn('Bouwjaar', 'string', ['length' => 4]);
        $table->addColumn('Aandrijving', 'string', ['length' => 30]);
        $table->addColumn('Aankoopdag', 'date');
        $table->addColumn('Hoeveelheid', 'integer');
        $table->addColumn('img_path', 'string', ['length' => 100]);
        $table->setPrimaryKey(['ProductID']);
    }

    public function down(Schema $schema): void
    {

        $schema->dropTable('bestellingen');
        $schema->dropTable('inlogklant');
        $schema->dropTable('machines');
    }
}
