<?php

use App\{Role, User, Service};
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
		Role::truncate();
		User::truncate();
		DB::table('role_user')->truncate();
		Service::truncate();

		// Seed the roles
		$superAdminRole = Role::create([
			'name' => 'superAdmin'
		]);

		$adminRole = Role::create([
			'name' => 'admin'
		]);

		$telecomsRole = Role::create([
			'name' => 'telecoms'
		]);

        // Seed default users
		$superAdminUser = factory(User::class)->create([
           'name' => 'SuperAdmin',
           'email' => 'superadmin@example.com',
        ]);

		$adminUser = factory(User::class)->create([
			'name' => 'admin',
            'email' => 'admin@example.com',
        ]);

		$telecomsUser = factory(User::class)->create([
			'name' => 'telecoms',
            'email' => 'telecoms@example.com',
        ]);

		// Seed the pivots
		$superAdminUser->roles()->attach($superAdminRole);
		$adminUser->roles()->attach($adminRole);
		$telecomsUser->roles()->attach($telecomsRole);

        // Seed the service types
        $ADSL = Service::create([
            'name' => 'Asymmetric digital subscriber line',
            'type' => 'ADSL'
        ]);
        $FTTC = Service::create([
            'name' => ' Fibre to the Cabinet',
            'type' => 'FTTC'
        ]);
        $FTTP = Service::create([
            'name' => 'Fibre to the Property',
            'type' => 'FTTP'
        ]);

        // Seed the tariffs

        // Seed the customers

        // Seed the contracts
    }
}
