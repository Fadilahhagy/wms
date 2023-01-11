<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use App\Models\User;
use App\Models\ItemType;
use App\Models\RoomType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();


         // Seed table roles
         Role::create(['name' => 'admin']);
         Role::create(['name' => 'user']);
 
         // Seed table item_types
         $itemTypes = ['meja', 'kursi', 'lemari', 'rak', 'komputer', 'monitor', 'keyboard', 'mouse', 'printer', 'proyektor'];
         foreach ($itemTypes as $itemType) {
             ItemType::create(['name' => $itemType]);
         }
 
         // Seed table users
         User::create([
             'name' => 'User 1',
             'email' => 'admin@example.com',
             'password' => Hash::make('12345678'),
             'role_id' => 1,
             'is_active' => 1,
         ]);
         User::create([
             'name' => 'User 2',
             'email' => 'user@example.com',
             'password' => Hash::make('12345678'),
             'role_id' => 2,
             'is_active' => 1,
         ]);
 
         // Seed table room_types
         $roomTypes = ['gudang', 'kelas', 'ruang rapat', 'ruang tamu', 'kantor'];
         foreach ($roomTypes as $roomType) {
             RoomType::create(['name' => $roomType]);
         }
    }
}
