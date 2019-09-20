<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Industry;
use App\Work_schedule;
use App\Education;
use App\Status;
use App\Work_experience;
Use App\Position_level;
Use App\Gender;
Use App\User;
Use App\Role;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        

        $position_levels = [
            'Laborer',
            'Executive',
            'Director',
            'Manager',
            'Supervisor',
            'Professional',
            'Internship',
            'Staff',
        ];

        foreach($position_levels as $position_level){
            Position_level::create(['name' => $position_level]);
        };

        $work_schedules = [
            'Full Time',
            'Internship',
            'Project-based',
            'Part Time',
            'Temporary',
            'Commission',
        ];

        foreach($work_schedules as $work_schedule){
            Work_schedule::create(['name' => $work_schedule]);
        };


        $educations = [
            'No preference',
            'High School Graduate',
            'College Level',
            'College Graduate',
            'Post Graduate',
        ];

        foreach($educations as $education){
            Education::create(['name' => $education]);
        };

        $work_experiences = [
            '0-1 year',
            '1-2 year',
            '2-3 year',
            '3-5 year',
            'more than 5 year',
        ];

        foreach($work_experiences as $work_experience){
            Work_experience::create(['name' => $work_experience]);
        };

        $statuses = [
            'Full time',
            'Part time',
            'Casual',
        ];

        foreach($statuses as $status){
            Status::create(['name' => $status]);
        };

        $categories = [

            'Airlines',
            'Ground Handling',
            'MRO',
            'Canteen',
            'Convenience Store',
            'Gas',
            'Restaurant',
            'Retail',
            'Showroom',
            'Trading',
            'Call Center/BPO',
            'Data Processing',
            'Information Technology',
            'Software Development',
            'Electronics',
            'Food Products',
            'Furniture and Crafts',
            'Construction',
            'Garments',
            'NEC',
            'Other Manufacturing',
            'Recycling',
            'Semi-Condutor',
            'Bank',
            'English Second Language',
            'Health',
            'Hospital',
            'School',
            'Freight Forwarding',
            'Warehousing',
            'Government Agencies/LGU',
            'Manpower',
            'Office Space',
            'Other Service',
            'Restaurant',
            'Showroom',
            'Transport',
            'Golf',
            'Hotel/Casino',
            'Housing',
            'Special Interest',
            'Tourism Estate',
            'Tourism State',
            'Petroleum',
            'Power',
            'Telecom',
            'Waste Management',
            'Water',
        ];

        foreach($categories as $category){
            Category::create(['name' => $category]);
        };

        $industries = [

            'Avaiation-Related',
            'Commerical',
            'Developer',
            'ICT Industry',
            'Industrial',
            'Institutional',
            'Logistics',
            'Service',
            'Tourism',
            'Utility',

        ];

        foreach($industries as $industry){
            Industry::create(['name' => $industry]);
        };

        $genders = [

            'No preference',
            'Male',
            'Female',

        ];

        foreach($genders as $gender){
            Gender::create(['name' => $gender]);
        };

        $adminRole = Role::create(['name' => 'admin']);
        $admin = User::create([
            'f_name' => 'admin',
            'l_name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admintest'),
            'email_verified_at' => NOW(),
        ]);

        $admin -> roles() -> attach($adminRole);

    }
} 
