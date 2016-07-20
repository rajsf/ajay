<?php
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserTableSeeder extends Seeder
{
  public function run()
  {
    DB::table('users')->delete();
    
    User::create(array(
    	'name'     => 'ajay',
        'username' => 'ajay',
        'email'    => 'ajay@gmail.com',
        'password' => Hash::make('im@1234567'),
    ));
  }
}