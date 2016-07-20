<?php
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserTableSeeder extends Seeder
{
  public function run()
  {
    //DB::table('users')->delete();
    
    User::create(array(
    	'name'     => 'john',
        'username' => 'john',
        'email'    => 'john@gmail.com',
        'password' => Hash::make('doe'),
    ));
  }
}