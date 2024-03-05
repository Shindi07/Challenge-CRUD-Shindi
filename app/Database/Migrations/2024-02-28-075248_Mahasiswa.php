<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

use function PHPSTORM_META\type;

class Mahasiswa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'int',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true

            ],
            'nim' => [
                'type' => 'varchar',
                'constraint' => 15

            ],
            'nama' => [
                'type' => 'varchar',
                'constraint' => 50
            ],
            'prodi' => [
                'type' => 'varchar',
                'constraint' => 30
            ],
            'alamat' => [
                'type' => 'text',

            ],
            'no_hp' => [
                'type' => 'varchar',
                'constraint' => 15
            ],
            'foto' => [
                'type' => 'varchar',
                'constraint' => 255
            ]






        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('mahasiswas');
    }

    public function down()
    {
        $this->forge->dropTable('mahasiswas');
    }
}
