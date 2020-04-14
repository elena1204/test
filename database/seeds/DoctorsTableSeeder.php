<?php

use Illuminate\Database\Seeder;
use App\Doctor;
class DoctorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $doctor = new Doctor();

        $doctor->name = 'Darko';
        $doctor->surname = 'Cvetanoski';
        $doctor->emg = '065234564';
        $doctor->numberofdoctorslisence = '9';

        $doctor->save();
    }
}
