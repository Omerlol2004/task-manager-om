<?php
namespace Database\Seeders;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class DemoSeeder extends Seeder {
    public function run(): void {
        $alice = User::firstOrCreate(['email'=>'alice@example.com'], ['name'=>'Alice','password'=>Hash::make('password')]);
        $bob   = User::firstOrCreate(['email'=>'bob@example.com'],   ['name'=>'Bob','password'=>Hash::make('password')]);
        Task::factory()->count(12)->create(['user_id'=>$alice->id]);
        Task::factory()->count(8)->create(['user_id'=>$bob->id]);
    }
}
