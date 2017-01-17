<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
        [
            'name' => 'Arsim FERNANE',
            'email' => 'hysen.arsene@gmail.com',
            'password' => bcrypt('password'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ], [
            'name' => 'Florian FERNANE',
            'email' => 'ludot.florian@gmail.com',
            'password' => bcrypt('password'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ], [
            'name' => 'Yassine FERNANE',
            'email' => 'fernane.yassine@gmail.com',
            'password' => bcrypt('password'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]]);
        
        DB::table('meetings')->insert([
        [
            'name' => 'Réunion de travail',
            'date' => date('Y-m-d H:i:s'),
            'subject' => 'Réunion pour organiser les prochaines réunions.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'user_id' => '1',
        ], [
            'name' => 'Réunion de cuisine',
            'date' => date('Y-m-d H:i:s'),
            'subject' => 'Réunion pour organiser les prochaines repas de famille.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'user_id' => '2',
        ], [
            'name' => 'Réunion de projet',
            'date' => date('Y-m-d H:i:s'),
            'subject' => 'Réunion pour organiser les prochaines réunions concernant les projets.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'user_id' => '3',
        ]]);
        
        DB::table('emails')->insert([
        [
            'email_participant' => 'ludot.florian@gmail.com',
            'meeting_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ], [
            'email_participant' => 'fernane.yassine@gmail.com',
            'meeting_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ], [
            'email_participant' => 'fernane.yassine@gmail.com',
            'meeting_id' => '2',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ], [
            'email_participant' => 'hysen.arsene@gmail.com',
            'meeting_id' => '2',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ], [
            'email_participant' => 'hysen.arsene@gmail.com',
            'meeting_id' => '3',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ], [
            'email_participant' => 'fernane.yassine@gmail.com',
            'meeting_id' => '3',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]]);
    }
}
