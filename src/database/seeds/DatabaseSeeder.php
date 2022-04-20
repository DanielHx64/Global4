<?php

use App\{User, Service};
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Seed default users
        $user = factory(User::class)->create([
           'name' => 'SuperAdmin',
           'email' => 'superadmin@example.com',
           'type' => 'super'
        ]);

        factory(User::class)->create([
            'email' => 'admin@example.com',
            'type' => 'admin',
        ]);

        factory(User::class)->create([
            'email' => 'admin@example.com',
            'type' => 'agent',
        ]);

        // Seed the service types
        $ADSL = factory(Service::class)->create([
            'name' => 'Asymmetric digital subscriber line',
            'type' => 'ADSL'
        ]);
        $FTTC = factory(Service::class)->create([
            'name' => ' Fibre to the Cabinet',
            'type' => 'FTTC'
        ]);
        $FTTP = factory(Service::class)->create([
            'name' => 'Fibre to the Property',
            'type' => 'FTTP'
        ]);

        // Seed the tariffs

        // Seed the customers

        // Seed the contracts
    }
}
