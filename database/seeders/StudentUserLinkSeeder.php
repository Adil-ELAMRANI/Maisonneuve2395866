<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StudentUserLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = Student::all();
        foreach ($students as $student) {
            // Vérifie si l'étudiant a déjà un user_id
            if (!$student->user_id) {
                // Crée un user (adapte les champs selon ta table students !)
                $user = User::create([
                    'name' => $student->nom, // ou $student->name selon ton modèle
                    'email' => $student->email, // Il faut que tu aies un email unique
                    'password' => Hash::make('motdepasse123'), // temporaire !
                ]);

                // Lie l'étudiant à ce user
                $student->user_id = $user->id;
                $student->save();
            }
        }
    }
}
