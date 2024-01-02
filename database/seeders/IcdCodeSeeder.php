<?php

namespace Database\Seeders;

use App\Models\IcdCode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IcdCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $icdCodes = [
            "A03.9" => "A03.9 Shigellosis, Unspecified",
            "A05.9" => "A05.9 Food Poisoning Unspecified",
            "A07.1" => "A07.1 Giardiasis",
            "B35.8" => "B35.8 Other dermatophytoses",
            "B35.9" => "B35.9 Dermatophytosis, unspecified",
            "B36.9" => "B36.9 Superficial mycosis, unspecified",
            "L00-L99" => "L00-L99 Diseases of the skin and subcutaneous tissue",
            "E11.621" => "E11.621 Type 2 diabetes mellitus with foot ulcer",
            "E11.622" => "E11.622 Type 2 diabetes mellitus with other skin ulcer",
            "I70.203" => "I70.203 Unsp atherosclerotic native arteries of extremities, bilateral legs",
            "I70.232" => "I70.232 Atherosclerotic native arteries of right leg w ulceration of calf",
            "N30.1" => "N30.1 Interstitial Cystitis (Chronic)",
            "N30.4" => "N30.4 Acute Cystitis",
            "R30.0" => "R30.0 Dysuria",
            "R30.9" => "R30.9 Painful micturition, Unspecified",
            "R35.0" => "R35.0 Frequency of micturition",
            "R39.15" => "R39.15 Urgency of Urination",
            "R39.9" => "R39.9 Unspecified symptoms and signs involving the GU system",
            "j02.9" => "J02.9 Sore thorat",
            "N39.0" => "N39.0 Urinary Tract Infection, site not specified",
            "Z00.00" => "Z00.00: Encounter for general adult medical examination without abnormal findings",
            "Z11.3" => "Z11.3: Encounter for screening for infections with a predominantly sexual mode of transmission",
        ];

        foreach ($icdCodes as $code => $name) {
            IcdCode::firstOrCreate([
                'code' => $code,
            ], [
                'name' => $name,
            ]);
        }
    }
}
