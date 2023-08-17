<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Products extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'productID' => [
				'type' => 'INT',
				'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
			],
			'src' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ]
		]);
		$this->forge->addKey('productID', TRUE);
        $this->forge->createTable('product');
	}

	public function down()
	{
		$this->forge->dropTable('product');
	}
}
