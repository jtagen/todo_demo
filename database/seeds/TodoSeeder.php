<?php

use Illuminate\Database\Seeder;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::insert("insert into todos (item, user_id) select 'Buy milk', id from users");
        DB::insert("insert into todos (item, user_id) select 'Wash car', id from users");
        DB::insert("insert into todos (item, user_id, is_complete) select 'Clean garage', id, 1 from users");
        DB::insert("insert into todos (item, user_id, is_deleted) select 'Walk dog', id, 1 from users");

    }
}
