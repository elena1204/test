<?php

use Illuminate\Database\Seeder;
 use App\Patient;
 use App\Doctor;
class PatientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $doctor = Doctor::where('name', 'Darko')->first();

        $patient = new Patient();
        $patient->name = 'Elena';;
        $patient->surname = 'Ristova';
        $patient->emg = '01011411';
        $patient->setDoctor($doctor);

        $patient->save();
    }
}
