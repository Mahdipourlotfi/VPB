<?php
  
namespace Database\Seeders;
  
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
  
class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
  
        //////////
        $user = User::create([
            'name' => 'Mahdi pourlotfi', 
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456')
        ]);
        
        $role = Role::create(['name' => 'Admin']);
         
         $permissions = Permission::pluck('id','id')->all();
       
        // 
         
         $user->assignRole([$role->id]);

        $role->syncPermissions($permissions);
       
    }
}
