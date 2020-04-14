<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Doctor extends Model
{
    protected $table = 'doctors';

    protected $fillable =
        [
            'name',
            'surname',
            'emg',
            'numberofdoctorslisence'
        ];

    public function patients(): HasMany
    {
        return $this->hasMany(Patient::class, 'doctor_id', 'id');

    }

    public function getPatients(): array
    {
        return $this->patients()->get()->all();

    }

    public function setDoctor(Doctor $doctor)
    {
        $this->doctor()->associate($doctor);
    }

    public function appointments(): BelongsToMany
    {
        return $this->belongsToMany(
            Patient::class,
            'appointments',
            'doctor_id',
            'patient_id',
            'id',
            'id'
        )->withPivot('date')->withTimestamps();
    }

    public function getAppointments(): array
    {
        return $this->appointments()->get()->all();
    }

    public function addApointments(Patients $patient, array $withPivot = [])
    {
        $this->appointments()->attach($patient, $withPivot);
    }


       public function Remedies():BelongsToMany
        {
            return $this->belongsToMany(
                Doctor::class,
                'remedies',
                'patient_id',
                'doctor_id',
                'id')
                ->withPivot('name')->withTimestamps();
        }

        public function setRemedies(Patient $patient, string $name)
        {
            return $this->remedies()->attach($patient, ['name' => $name]);
        }
}
