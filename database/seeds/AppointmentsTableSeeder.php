<?php

use Illuminate\Database\Seeder;
use App\Patient;
use App\Doctor;

class AppointmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $doctor = Doctor::where('name', 'Darko')->first();
        /** @var Order $order */
        $patient = Patient::find(1);

        $patient->setDoctor($doctor);
        $doctor->assignAppointmentToPatient($patient);
        $doctor->save();
    }
}
