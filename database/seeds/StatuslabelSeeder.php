<?php
use Illuminate\Database\Seeder;
use App\Models\Statuslabel;
use Illuminate\Support\Facades\DB;

class StatuslabelSeeder extends Seeder
{
    public function run()
    {
        Statuslabel::truncate();
        factory(Statuslabel::class)->states('rtd')->create(['name' => "Ready to Deploy"]);
        factory(Statuslabel::class)->states('pending')->create(['name' => "Pending"]);
        factory(Statuslabel::class)->states('archived')->create(['name' => "Archived"]);
        factory(Statuslabel::class)->states('out_for_diagnostics')->create();
        factory(Statuslabel::class)->states('out_for_repair')->create();
        factory(Statuslabel::class)->states('broken')->create();
        factory(Statuslabel::class)->states('lost')->create();
        // factory(Statuslabel::class)->states('procurement')->create(['name' => "Procurement"]);
        DB::table('status_labels')->insert([
            'name' => "Procurement",
            'user_id'=>1,
            'deployable'=>0,
            'pending'=>1,
            'archived'=>0
        ]);
        // factory(Statuslabel::class)->states('procurement')->create(['name' => "Procurement",'deployable'=>1,'pending'=>1,'archived'=>0]);
    }
}
