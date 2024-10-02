<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        User::factory()->create([
            'first_name' => 'Student1',
            'last_name' => 'LastName1',
            'age' => 20,
            'email' => 'student1@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student2',
            'last_name' => 'LastName2',
            'age' => 21,
            'email' => 'student2@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student3',
            'last_name' => 'LastName3',
            'age' => 22,
            'email' => 'student3@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student4',
            'last_name' => 'LastName4',
            'age' => 23,
            'email' => 'student4@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student5',
            'last_name' => 'LastName5',
            'age' => 24,
            'email' => 'student5@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student6',
            'last_name' => 'LastName6',
            'age' => 25,
            'email' => 'student6@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student7',
            'last_name' => 'LastName7',
            'age' => 26,
            'email' => 'student7@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student8',
            'last_name' => 'LastName8',
            'age' => 27,
            'email' => 'student8@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student9',
            'last_name' => 'LastName9',
            'age' => 28,
            'email' => 'student9@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student10',
            'last_name' => 'LastName10',
            'age' => 29,
            'email' => 'student10@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);
        User::factory()->create([
            'first_name' => 'Student11',
            'last_name' => 'LastName11',
            'age' => 30,
            'email' => 'student11@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student12',
            'last_name' => 'LastName12',
            'age' => 31,
            'email' => 'student12@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student13',
            'last_name' => 'LastName13',
            'age' => 32,
            'email' => 'student13@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student14',
            'last_name' => 'LastName14',
            'age' => 33,
            'email' => 'student14@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student15',
            'last_name' => 'LastName15',
            'age' => 34,
            'email' => 'student15@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student16',
            'last_name' => 'LastName16',
            'age' => 35,
            'email' => 'student16@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student17',
            'last_name' => 'LastName17',
            'age' => 36,
            'email' => 'student17@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student18',
            'last_name' => 'LastName18',
            'age' => 37,
            'email' => 'student18@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student19',
            'last_name' => 'LastName19',
            'age' => 38,
            'email' => 'student19@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student20',
            'last_name' => 'LastName20',
            'age' => 39,
            'email' => 'student20@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);
        User::factory()->create([
            'first_name' => 'Student21',
            'last_name' => 'LastName21',
            'age' => 40,
            'email' => 'student21@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student22',
            'last_name' => 'LastName22',
            'age' => 41,
            'email' => 'student22@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student23',
            'last_name' => 'LastName23',
            'age' => 42,
            'email' => 'student23@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student24',
            'last_name' => 'LastName24',
            'age' => 43,
            'email' => 'student24@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student25',
            'last_name' => 'LastName25',
            'age' => 44,
            'email' => 'student25@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student26',
            'last_name' => 'LastName26',
            'age' => 45,
            'email' => 'student26@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student27',
            'last_name' => 'LastName27',
            'age' => 46,
            'email' => 'student27@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student28',
            'last_name' => 'LastName28',
            'age' => 47,
            'email' => 'student28@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student29',
            'last_name' => 'LastName29',
            'age' => 48,
            'email' => 'student29@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student30',
            'last_name' => 'LastName30',
            'age' => 49,
            'email' => 'student30@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);
        User::factory()->create([
            'first_name' => 'Student31',
            'last_name' => 'LastName31',
            'age' => 50,
            'email' => 'student31@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student32',
            'last_name' => 'LastName32',
            'age' => 51,
            'email' => 'student32@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student33',
            'last_name' => 'LastName33',
            'age' => 52,
            'email' => 'student33@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student34',
            'last_name' => 'LastName34',
            'age' => 53,
            'email' => 'student34@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student35',
            'last_name' => 'LastName35',
            'age' => 54,
            'email' => 'student35@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student36',
            'last_name' => 'LastName36',
            'age' => 55,
            'email' => 'student36@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student37',
            'last_name' => 'LastName37',
            'age' => 56,
            'email' => 'student37@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student38',
            'last_name' => 'LastName38',
            'age' => 57,
            'email' => 'student38@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student39',
            'last_name' => 'LastName39',
            'age' => 58,
            'email' => 'student39@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student40',
            'last_name' => 'LastName40',
            'age' => 59,
            'email' => 'student40@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student41',
            'last_name' => 'LastName41',
            'age' => 60,
            'email' => 'student41@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student42',
            'last_name' => 'LastName42',
            'age' => 61,
            'email' => 'student42@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student43',
            'last_name' => 'LastName43',
            'age' => 62,
            'email' => 'student43@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student44',
            'last_name' => 'LastName44',
            'age' => 63,
            'email' => 'student44@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student45',
            'last_name' => 'LastName45',
            'age' => 64,
            'email' => 'student45@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student46',
            'last_name' => 'LastName46',
            'age' => 65,
            'email' => 'student46@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student47',
            'last_name' => 'LastName47',
            'age' => 66,
            'email' => 'student47@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student48',
            'last_name' => 'LastName48',
            'age' => 67,
            'email' => 'student48@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student49',
            'last_name' => 'LastName49',
            'age' => 68,
            'email' => 'student49@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student50',
            'last_name' => 'LastName50',
            'age' => 69,
            'email' => 'student50@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student51',
            'last_name' => 'LastName51',
            'age' => 70,
            'email' => 'student51@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student52',
            'last_name' => 'LastName52',
            'age' => 71,
            'email' => 'student52@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student53',
            'last_name' => 'LastName53',
            'age' => 72,
            'email' => 'student53@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student54',
            'last_name' => 'LastName54',
            'age' => 73,
            'email' => 'student54@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student55',
            'last_name' => 'LastName55',
            'age' => 74,
            'email' => 'student55@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student56',
            'last_name' => 'LastName56',
            'age' => 75,
            'email' => 'student56@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student57',
            'last_name' => 'LastName57',
            'age' => 76,
            'email' => 'student57@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student58',
            'last_name' => 'LastName58',
            'age' => 77,
            'email' => 'student58@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student59',
            'last_name' => 'LastName59',
            'age' => 78,
            'email' => 'student59@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student60',
            'last_name' => 'LastName60',
            'age' => 79,
            'email' => 'student60@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);
        User::factory()->create([
            'first_name' => 'Student61',
            'last_name' => 'LastName61',
            'age' => 80,
            'email' => 'student61@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student62',
            'last_name' => 'LastName62',
            'age' => 81,
            'email' => 'student62@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student63',
            'last_name' => 'LastName63',
            'age' => 82,
            'email' => 'student63@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student64',
            'last_name' => 'LastName64',
            'age' => 83,
            'email' => 'student64@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student65',
            'last_name' => 'LastName65',
            'age' => 84,
            'email' => 'student65@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student66',
            'last_name' => 'LastName66',
            'age' => 85,
            'email' => 'student66@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student67',
            'last_name' => 'LastName67',
            'age' => 86,
            'email' => 'student67@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student68',
            'last_name' => 'LastName68',
            'age' => 87,
            'email' => 'student68@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student69',
            'last_name' => 'LastName69',
            'age' => 88,
            'email' => 'student69@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student70',
            'last_name' => 'LastName70',
            'age' => 89,
            'email' => 'student70@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student71',
            'last_name' => 'LastName71',
            'age' => 90,
            'email' => 'student71@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student72',
            'last_name' => 'LastName72',
            'age' => 91,
            'email' => 'student72@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student73',
            'last_name' => 'LastName73',
            'age' => 92,
            'email' => 'student73@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student74',
            'last_name' => 'LastName74',
            'age' => 93,
            'email' => 'student74@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student75',
            'last_name' => 'LastName75',
            'age' => 94,
            'email' => 'student75@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student76',
            'last_name' => 'LastName76',
            'age' => 95,
            'email' => 'student76@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student77',
            'last_name' => 'LastName77',
            'age' => 96,
            'email' => 'student77@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student78',
            'last_name' => 'LastName78',
            'age' => 97,
            'email' => 'student78@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student79',
            'last_name' => 'LastName79',
            'age' => 98,
            'email' => 'student79@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student80',
            'last_name' => 'LastName80',
            'age' => 99,
            'email' => 'student80@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student81',
            'last_name' => 'LastName81',
            'age' => 100,
            'email' => 'student81@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student82',
            'last_name' => 'LastName82',
            'age' => 101,
            'email' => 'student82@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student83',
            'last_name' => 'LastName83',
            'age' => 102,
            'email' => 'student83@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student84',
            'last_name' => 'LastName84',
            'age' => 103,
            'email' => 'student84@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student85',
            'last_name' => 'LastName85',
            'age' => 104,
            'email' => 'student85@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student86',
            'last_name' => 'LastName86',
            'age' => 105,
            'email' => 'student86@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student87',
            'last_name' => 'LastName87',
            'age' => 106,
            'email' => 'student87@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student88',
            'last_name' => 'LastName88',
            'age' => 107,
            'email' => 'student88@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student89',
            'last_name' => 'LastName89',
            'age' => 108,
            'email' => 'student89@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Student90',
            'last_name' => 'LastName90',
            'age' => 109,
            'email' => 'student90@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);


        User::factory()->create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'age' => 25,
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
            'role' => 'teacher'
        ]);

        $student = User::factory()->create([
            'first_name' => 'Jane',
            'last_name' => 'Smith',
            'age' => 22,
            'email' => 'student@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);

        User::factory()->create([
            'first_name' => 'Mary',
            'last_name' => 'Smith',
            'age' => 45,
            'email' => 'parent@example.com',
            'password' => Hash::make('password'),
            'role' => 'parent'
        ]);

        User::factory()->create([
            'first_name' => 'sary',
            'last_name' => 'fmith',
            'age' => 35,
            'email' => 'parent@msn.com',
            'password' => Hash::make('password'),
            'role' => 'parent'
        ]);

        $this->call(SubjectSeeder::class);
        $this->call([UserParentStudentSeeder::class,]);
    }
}
