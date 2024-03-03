<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClinicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clinicsData = [
            [
                "name"=> "Dr. House vet clinic",
                "place"=> "مدينة الشروق، الشروق،،، 4JG6+8C9، قسم الشروق، محافظة القاهرة 4921003, Egypt",
                "place_area"=> "El Shorouk",
                "city"=> "Cairo",
                "rate"=> "4.5",
                "opening_hours"=> "1:00 pm - 10:00 pm",
                "phone_number"=> "+20 10 93696322",
                "url"=> "https://maps.google.com/?cid=14824246189497236577",
                "images"=> implode(',',[
                    "https://lh5.googleusercontent.com/p/AF1QipMFc9lqpmEEkcGAAFTHO1JRK5NbTJLxR9-hYF7o=w408-h522-k-no",
                    "https://lh5.googleusercontent.com/p/AF1QipOeZiZ0mKAceyIybBmZRoFNbo4UZJEpQ5c7zMHZ=w750-h563-p-k-no"
                ])
            ],
            [
                "name"=> "Prime Vet Clinic. عياده بيطرية",
                "place"=> "4JP7+J75, El Shorouk, Cairo Governorate 11837, Egypt",
                "place_area"=> "El Shorouk",
                "city"=> "Cairo",
                "rate"=> "4.4",
                "opening_hours"=> "10:30 AM - 10:00 PM",
                "phone_number"=> "+20 10 01053180",
                "url"=> "https://maps.google.com/?cid=2874479738253398401",
                "images"=> implode(',',[
                    "https://lh5.googleusercontent.com/p/AF1QipM097naEojB70f9zUsr8CUURFbJJpjt-OXqyj4u=w203-h203-k-no",
                    "https://lh5.googleusercontent.com/p/AF1QipM-YkuffnjOM_hl41D7mEZDJKBF2ZEN7QRW2vAI=w203-h152-k-no",
                    "https://lh5.googleusercontent.com/p/AF1QipMADXwsTE_0CVwQYnmXHd9vO3wBNrYJF51Y1CPl=w203-h270-k-no"
                ])
            ],
            [
                "name"=> "Kalb w Otta",
                "place"=> "Grand Mall Shopping Center, El Shorouk, Cairo Governorate 4932010, Egypt",
                "place_area"=> "El Shorouk",
                "city"=> "Cairo",
                "rate"=> "4.5",
                "opening_hours"=> "10:00 AM - 10:00 PM",
                "phone_number"=> "+20 10 30503023",
                "url"=> "https://maps.google.com/?cid=16827647872650643036",
                "images"=> implode(',',[
                    "https://lh5.googleusercontent.com/p/AF1QipNyh6its1HlhhpTp0inY4-RWQVulyRV7719yZI=w203-h135-k-no",
                    "https://lh5.googleusercontent.com/p/AF1QipPS6iHU5P-Q8H9av8MigvhpQ8I0FnbiwGw2BaE=w203-h135-k-no",
                    "https://lh5.googleusercontent.com/p/AF1QipNPxj2VbV3f92wP7oIwMsuf6KmCIcFihw3kX28=w203-h135-k-no"
                ])
            ],
            [
                "name"=> "عيادة الشروق البيطرية الشامله",
                "place"=> "الشروق بجوار قسم الشرطة مول الجوهري الدور الثالث عيادة رقم 64 القاهرة, قسم الشروق، محافظة القاهرة 11837, Egypt",
                "place_area"=> "El Shorouk",
                "city"=> "Cairo",
                "rate"=> "3.8",
                "opening_hours"=> "24 hours",
                "phone_number"=> "+20 10 00161458",
                "url"=> "https://veterinary-pharmacy-518.business.site/?utm_source=gmb&utm_medium=referral",
                "images"=> implode(',',[
                    "https://lh5.googleusercontent.com/p/AF1QipNu_hSZFP4lASjhtsaLsWWvI_2xKX28Gs_nvgEN=w222-h100-k-no",
                    "https://lh5.googleusercontent.com/p/AF1QipP54A2_pNIFwkI4iCe-8I9ZThGlG61W_MFwnaNk=w203-h450-k-no",
                    "https://lh5.googleusercontent.com/p/AF1QipND90lL3GBaLWKa4jJ9g4kvYgqSS8QuAnu-Lz7S=w203-h451-k-no"
                ])
            ],
            [
                "name"=> "Bluevets Veterinary Center المستشفي البيطري بالشروق",
                "place"=> "Saad IBN ABI Wakkas St, El Shorouk, Cairo Governorate 11837, Egypt",
                "place_area"=> "El Shorouk",
                "city"=> "Cairo",
                "rate"=> "4.3",
                "opening_hours"=> "12:00 PM - 9:30 PM",
                "phone_number"=> "+20 11 02583333",
                "url"=> "http://www.facebook.com/thebluevets",
                "images"=> implode(',',[
                    "https://lh5.googleusercontent.com/p/AF1QipMAr0Q34spX--gTciaFSVgL2OQq-JInw6tW_omD=s846-k-no",
                    "https://lh5.googleusercontent.com/p/AF1QipMS5etOFePt06oQK32DTEmxC6Q_7GXD4S3NYuM4=w203-h203-k-no",
                    "https://lh5.googleusercontent.com/p/AF1QipNdLOOczzEBb3_2OlyW_X1FiBA2iKKCvZeBURmO=w203-h270-k-no"
                ])
            ],
            [
                "name"=> "Hi pets vet clinic",
                "place"=> "Moustafa Hussien, el sherok, Cairo Governorate 11111, Egypt",
                "place_area"=> "El Shorouk",
                "city"=> "Cairo",
                "rate"=> "4.1",
                "opening_hours"=> "Not available",
                "url"=> "https://hi-pets-vet-clinic.business.site/?utm_source=gmb&utm_medium=referral",
                "images"=> implode(',',[
                    "https://lh3.googleusercontent.com/p/AF1QipPk0bzHENSnMilUmPG8_8YQ7Skxbf5s4qkw3e85=w768-h768-n-o-v1",
                    "https://lh3.googleusercontent.com/p/AF1QipO9glYu77EPIWw7Whcg3EqaMHwj8gjQ70af0EEQ=w960-h960-n-o-v1",
                    "https://lh3.googleusercontent.com/p/AF1QipPrbrsw4bcJGCQBjsI56IXwkQQY3yOXSiT2OH5V=w960-h960-n-o-v1"
                ])
            ],
            [
                "name"=> "Alexandria Pet Center",
                "place"=> "7 El-Iman Mosque, Sidi Beshr Bahri, Qism El-Montaza, Alexandria Governorate 5517237",
                "place_area"=> "Sidi Beshr Bahri",
                "city"=> "Alexandria",
                "rate"=> "4.5",
                "opening_hours"=> "1:00 PM - 10:00 PM",
                "phone_number"=> "+20 10 20684222",
                "url"=> "https://maps.app.goo.gl/wxRTSUnxJLvQMQzx5",
                "images"=> implode(',',[
                    "https://lh5.googleusercontent.com/p/AF1QipNJci0OzXDQ6PClk1uUtRAU58iM3SMUq3_8NbpQ=w203-h271-k-no",
                    "https://lh5.googleusercontent.com/p/AF1QipP36MpsBmvT3dRLuhFpq9gt8uuJC1UfIQVQ_kQv=w203-h114-k-no",
                    "https://lh5.googleusercontent.com/p/AF1QipNfTXrjRsoYO-RzfpwRv9PMzKGquDn63eVSDz1t=w203-h270-k-no"
                ])
            ],
            [
                "name"=> "British Animal Hospital",
                "place"=> "74 Gamat ELdewal St., ELdokky, Giza, Egypt",
                "place_area"=> "EL Dokky",
                "city"=> "Giza",
                "rate"=> "4.8",
                "opening_hours"=> "8:00 AM - 10:00 PM",
                "phone_number"=> "+20 10 06344025",
                "url"=> "https://britishanimalhospital.com/",
                "images"=> implode(',',[
                    "https://lh5.googleusercontent.com/p/AF1QipPcy7ttBAHCh8kugEHGW2M-nNPLkcEKCnFl9Kzv=w227-h100-k-no",
                    "https://lh3.googleusercontent.com/UzxDY6eudbUmfKnzHNa_Fd8vw9EYm2a7JWcYmwoP11Nf6nSW1JgyocR7jt58T3g=w205-h100-k-no",
                    "https://lh5.googleusercontent.com/p/AF1QipPGThXowIOo1yDWnkvGPkuMfdlO7BfxW36cETu0=w203-h360-k-no"
                ])
            ],
            [
                "name"=> "Dr Mohamed fouda",
                "place"=> "سما مول, New Cairo 1, Cairo Governorate 4723421",
                "place_area"=> "New Cairo",
                "city"=> "Cairo",
                "rate"=> "4.2",
                "opening_hours"=> "6:00 pm - 10:00 pm",
                "phone_number"=> "+20 10 16156226",
                "url"=> "https://maps.app.goo.gl/B3v8JFMPBDCZMAeu8",
                "images"=> implode(',',[
                    "https://lh5.googleusercontent.com/p/AF1QipOy9_LPuWF9196e7yktpwehxR07Uydq9dKiVN3o=w203-h203-k-no",
                    "https://lh5.googleusercontent.com/p/AF1QipNfTXrjRsoYO-RzfpwRv9PMzKGquDn63eVSDz1t=w203-h270-k-no",
                    "https://lh5.googleusercontent.com/p/AF1QipPGThXowIOo1yDWnkvGPkuMfdlO7BfxW36cETu0=w203-h360-k-no"
                ])
            ],
            [
                "name"=> "Aleefak Veterinary Clinic (عيادة أليف البيطرية)",
                "place"=> "36 Hassan El Emam St., Off Ibn El Haitham St., Nasr City, Cairo, Egypt",
                "place_area"=> "Nasr City",
                "city"=> "Cairo",
                "rate"=> "4.0",
                "opening_hours"=> "8:00 AM - 12:00 AM",
                "phone_number"=> "+20 10  10161604",
                "url"=> "https://aleefak-vet-clinic.business.site/",
                "images"=> implode(',',[
                    "https://lh3.googleusercontent.com/p/AF1QipNzUZ6Vv5ZCwvAU2hBqovsDG9nwd9Xgo5IpbO31=w960-h960-n-o-v1",
                    "https://lh3.googleusercontent.com/p/AF1QipM90OEI2-k0WBfJEiDPmPnST_oyrNQOsc4KOz4H=w960-h960-n-o-v1",
                    "https://lh5.googleusercontent.com/p/AF1QipPGThXowIOo1yDWnkvGPkuMfdlO7BfxW36cETu0=w203-h360-k-no"
                ])
            ],
            [
                "name"=> "American Veterinary Center Sheraton",
                "place"=> "Mahmoud Esmat Hamdy، Street 2 مساكن, El Nozha, Sheraton, Cairo, Egypt",
                "place_area"=> "El Nozha, Sheraton",
                "city"=> "Cairo",
                "rate"=> "4.1",
                "opening_hours"=> "24 Hours",
                "phone_number"=> "+20 10  60300853",
                "url"=> "https://maps.app.goo.gl/jN74XUS3zd7pWwRDA",
                "images"=> implode(',',[
                    "https://lh5.googleusercontent.com/p/AF1QipNJpGgRpyOR0JErZp6aMYJ5j9lWvDm7oBkmMQSf=w203-h203-k-no",
                    "https://lh5.googleusercontent.com/p/AF1QipNvA70eZ1px75wBWPvvCD8VRIOj1n_4FiPiHgIJ=w203-h203-k-no",
                    "https://lh5.googleusercontent.com/p/AF1QipNh11lnH35HYBh9lWxpSHqq3ewewBAsryeDIVO6=w203-h193-k-no"
                ])
            ]
        ];

        foreach($clinicsData as $clinic){
            DB::table('clinics')->insert(
                $clinic
            );
        }
        // DB::table('clinics')->insert($clinicsData);
    }
}
