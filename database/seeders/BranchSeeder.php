<?php

namespace Database\Seeders;

use App\Models\Branch;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $statusId = DB::table('statuses')->first()?->id ?? 1;
        $userId = DB::table('users')->first()?->id ?? null;

        Branch::insert([
            [
                'name' => 'Sucursal Centro',
                'status_id' => $statusId,
                'opening_date' => Carbon::parse('2022-01-01'),
                'opening_time' => '08:00:00',
                'user_id' => $userId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sucursal Norte',
                'status_id' => $statusId,
                'opening_date' => Carbon::parse('2022-06-01'),
                'opening_time' => '09:00:00',
                'user_id' => $userId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
