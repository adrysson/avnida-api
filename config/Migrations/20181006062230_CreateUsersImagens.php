<?php
use Migrations\AbstractMigration;

class CreateUsersImagens extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('users_imagens');
        $table->addColumn('user_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('imagem_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addForeignKey('user_id', 'users', 'id', [
            'delete'=> 'CASCADE',
            'constraint' => 'fk_users_imagens_users'
        ]);
        $table->addForeignKey('imagem_id', 'imagens', 'id', [
            'delete'=> 'CASCADE',
            'constraint' => 'fk_users_imagens_imagens'
        ]);
        $table->create();
    }
}
