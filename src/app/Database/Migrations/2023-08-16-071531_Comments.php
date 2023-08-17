<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Comments extends Migration
{
	public function up()
	{
		$this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'text' => [
                'type' => 'TEXT',
            ],
            'date' => [
                'type' => 'DATE',
            ],
			'productID' => [
				'type' => 'INT',
				'constraint' => 11,
			]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('comments');
	}

	public function down()
	{
		$this->forge->dropTable('comments');
	}
}
