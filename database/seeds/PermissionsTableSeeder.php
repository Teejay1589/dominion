<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$permissions = [
			[
				'table' => 'billings',
				'actions' => [
					[
						'action' => 'view',
						'permit' => 4,
					], [
						'action' => 'create',
						'permit' => 4,
					], [
						'action' => 'update',
						'permit' => 4,
					], [
						'action' => 'delete',
						'permit' => 1,
					]
				]
			],
			[
				'table' => 'patients',
				'actions' => [
					[
						'action' => 'view',
						'permit' => 4,
					], [
						'action' => 'create',
						'permit' => 4,
					], [
						'action' => 'update',
						'permit' => 4,
					], [
						'action' => 'delete',
						'permit' => 1,
					]
				]
			],
			[
				'table' => 'patient_files',
				'actions' => [
					[
						'action' => 'view',
						'permit' => 4,
					], [
						'action' => 'create',
						'permit' => 4,
					], [
						'action' => 'update',
						'permit' => 4,
					], [
						'action' => 'delete',
						'permit' => 1,
					]
				]
			],
			[
				'table' => 'permissions',
				'actions' => [
					[
						'action' => 'view',
						'permit' => 1,
					], [
						'action' => 'create',
						'permit' => 1,
					], [
						'action' => 'update',
						'permit' => 1,
					], [
						'action' => 'delete',
						'permit' => 1,
					]
				]
			],
			[
				'table' => 'posts',
				'actions' => [
					[
						'action' => 'view',
						'permit' => 3,
					], [
						'action' => 'create',
						'permit' => 3,
					], [
						'action' => 'update',
						'permit' => 3,
					], [
						'action' => 'delete',
						'permit' => 3,
					]
				]
			],
			[
				'table' => 'reminders',
				'actions' => [
					[
						'action' => 'view',
						'permit' => 4,
					], [
						'action' => 'create',
						'permit' => 4,
					], [
						'action' => 'update',
						'permit' => 4,
					], [
						'action' => 'delete',
						'permit' => 4,
					]
				]
			],
			[
				'table' => 'settings',
				'actions' => [
					[
						'action' => 'view',
						'permit' => 1,
					], [
						'action' => 'update',
						'permit' => 1,
					]
				]
			],
			[
				'table' => 'sms',
				'actions' => [
					[
						'action' => 'view',
						'permit' => 3,
					], [
						'action' => 'create',
						'permit' => 3,
					], [
						'action' => 'update',
						'permit' => 3,
					], [
						'action' => 'delete',
						'permit' => 3,
					]
				]
			],
			[
				'table' => 'surgeries',
				'actions' => [
					[
						'action' => 'view',
						'permit' => 4,
					], [
						'action' => 'create',
						'permit' => 4,
					], [
						'action' => 'update',
						'permit' => 4,
					], [
						'action' => 'delete',
						'permit' => 1,
					]
				]
			],
			[
				'table' => 'surgery_names',
				'actions' => [
					[
						'action' => 'view',
						'permit' => 4,
					], [
						'action' => 'create',
						'permit' => 4,
					], [
						'action' => 'update',
						'permit' => 4,
					], [
						'action' => 'delete',
						'permit' => 4,
					]
				]
			],
			[
				'table' => 'users',
				'actions' => [
					[
						'action' => 'view',
						'permit' => 1,
					], [
						'action' => 'create',
						'permit' => 1,
					], [
						'action' => 'update',
						'permit' => 1,
					], [
						'action' => 'delete',
						'permit' => 1,
					]
				]
			],
			[
				'table' => 'user_permissions',
				'actions' => [
					[
						'action' => 'view',
						'permit' => 1,
					], [
						'action' => 'create',
						'permit' => 1,
					], [
						'action' => 'update',
						'permit' => 1,
					], [
						'action' => 'delete',
						'permit' => 1,
					]
				]
			],
			[
				'table' => 'visits',
				'actions' => [
					[
						'action' => 'view',
						'permit' => 4,
					], [
						'action' => 'create',
						'permit' => 4,
					], [
						'action' => 'update',
						'permit' => 4,
					], [
						'action' => 'delete',
						'permit' => 1,
					]
				]
			]
		];

		foreach ($permissions as $key => $value) {
			foreach ($value['actions'] as $key => $val) {
				DB::table('permissions')->insert([
					'table' => $value['table'],
					'action' => $val['action'],
					'permit' => $val['permit'],
					'created_at' => now(),
				]);
			}
		}
	}
}
