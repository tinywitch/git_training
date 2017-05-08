<?php

namespace Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170503090927 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $table = $schema->createTable('post');
        $table->addColumn('id', 'integer', ['autoincrement'=>true]);
        $table->addColumn('title', 'text', ['notnull'=>true]);
        $table->addColumn('content', 'text', ['notnull'=>true]);
        $table->addColumn('status', 'integer', ['notnull'=>true]);
        $table->addColumn('date_created', 'datetime', ['notnull'=>true]);
        $table->setPrimaryKey(['id']);
        $table->addOption('engine' , 'InnoDB');

        // Create 'comment' table
        $table = $schema->createTable('comment');
        $table->addColumn('id', 'integer', ['autoincrement'=>true]);
        $table->addColumn('post_id', 'integer', ['notnull'=>true]);
        $table->addColumn('content', 'text', ['notnull'=>true]);
        $table->addColumn('author', 'string', ['notnull'=>true, 'lenght'=>128]);
        $table->addColumn('date_created', 'datetime', ['notnull'=>true]);
        $table->setPrimaryKey(['id']);
        $table->addOption('engine' , 'InnoDB');

        // Create 'tag' table
        $table = $schema->createTable('tag');
        $table->addColumn('id', 'integer', ['autoincrement'=>true]);
        $table->addColumn('name', 'string', ['notnull'=>true, 'lenght'=>128]);
        $table->setPrimaryKey(['id']);
        $table->addOption('engine' , 'InnoDB');

        // Create 'post_tag' table
        $table = $schema->createTable('post_tag');
        $table->addColumn('id', 'integer', ['autoincrement'=>true]);
        $table->addColumn('post_id', 'integer', ['notnull'=>true]);
        $table->addColumn('tag_id', 'integer', ['notnull'=>true]);
        $table->setPrimaryKey(['id']);
        $table->addOption('engine' , 'InnoDB');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $schema->dropTable('post_tag');
        $schema->dropTable('tag');
        $schema->dropTable('comment');
        $schema->dropTable('post');
    }
}
