<?php
use Illuminate\Database\Seeder;

/**
 * Created by PhpStorm.
 * User: fukuda
 * Date: 2015/12/11
 * Time: 14:42
 */
class UserTableSeeder extends Seeder
{
    /**
     *
     */
    public function run()
    {
        DB::table('users')->truncate();

        DB::table('users')->insert(
            [
                'name' => 'fukuda',
                'email' => 'fukuda@spiritek.co.jp',
                'password' => 'fukuda'
            ]);
        DB::table('users')->insert(
            [
                'name' => 'mami',
                'email' => 'mami@mail.co.jp',
                'password' => 'mami'
            ]);
        DB::table('users')->insert(
            [
                'name' => 'jotaro',
                'email' => 'jotaro@mail.co.jp',
                'password' => 'jotaro'
            ]);
    }
}