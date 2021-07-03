<?php
namespace Database\Seeders;

use App\Http\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'           => 'userone',
            'email'          => 'example_user1@critain.id',
            'phone'          => '89999999999',
            'address'        => 'jalan sukasuka',
            'password'       => Hash::make('asdfasdf')
        ]);
    }
}
