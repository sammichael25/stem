<?php

use Illuminate\Database\Seeder;
use App\Student;
use App\Address;
use App\City;
use App\Stemcenter;
use App\School;
use App\Emgccontact;
use App\Addition;
use App\Contact;
use App\Scontact;
use App\Pareent;

class AddStudentsFromFile extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        if (($handle = fopen ( public_path () . '/Students.csv', 'r' )) !== FALSE) {
            while ( ($data = fgetcsv ( $handle, 1200, ',' )) !== FALSE ) {
                
                if($data [14] != null && $data [14] != "" ){
                    $p1add = new Address();
                    $p1add->id = $data [0];
                    $p1add->address1 = $data [1];
                    $p1add->address2 = $data [2];
                    $p1add->city_id = $data [3];
                    $p1add->type = $data [4];
                    $p1add->save ();

                    $p1contact = new Contact();
                    $p1contact->id = $data[5];
                    $p1contact->mobile1 = $data[6];
                    $p1contact->mobile2 = $data[7];
                    $p1contact->home = $data[8];
                    $p1contact->work = $data[9];
                    $p1contact->email1 = $data[10];
                    $p1contact->email2 = $data[11];
                    $p1contact->type = $data[12];
                    $p1contact->save ();

                    $parent1 = new Pareent();
                    $parent1->id = $data[13];
                    $parent1->pfname = $data[14];
                    $parent1->plname = $data[15];
                    $parent1->type = $data[16];
                    $parent1->address_id = $data[17];
                    $parent1->contact_id = $data[18];
                    $parent1->save ();
                }

                if($data [33] != null && $data [33] != "" ){
                    $p2add = new Address();
                    $p2add->id = $data [19];
                    $p2add->address1 = $data [20];
                    $p2add->address2 = $data [21];
                    $p2add->city_id = $data [22];
                    $p2add->type = $data [23];
                    $p2add->save ();

                    $p2contact = new Contact();
                    $p2contact->id = $data[24];
                    $p2contact->mobile1 = $data[25];
                    $p2contact->mobile2 = $data[26];
                    $p2contact->home = $data[27];
                    $p2contact->work = $data[28];
                    $p2contact->email1 = $data[29];
                    $p2contact->email2 = $data[30];
                    $p2contact->type = $data[31];
                    $p2contact->save ();

                    $parent2 = new Pareent();
                    $parent2->id = $data[32];
                    $parent2->pfname = $data[33];
                    $parent2->plname = $data[34];
                    $parent2->type = $data[35];
                    $parent2->address_id = $data[36];
                    $parent2->contact_id = $data[37];
                    $parent2->save ();
                }

                $st_address = new Address();
                $st_address->id = $data [38];
                $st_address->address1 = $data [39];
                $st_address->address2 = $data [40];
                $st_address->city_id = $data [41];
                $st_address->type = $data [42];
                $st_address->save ();

                $st_contact = new Contact();
                $st_contact->id = $data[43];
                $st_contact->mobile1 = $data[44];
                $st_contact->email1 = $data[45];
                $st_contact->type = $data[46];
                $st_contact->save ();

                $emgccontact = new Contact();
                $emgccontact->id = $data[47];
                $emgccontact->mobile1 = $data[48];
                $emgccontact->mobile2 = $data[49];
                $emgccontact->email1 = $data[50];
                $emgccontact->work = $data[51];
                $emgccontact->type = $data[52];
                $emgccontact->save ();

                $emgc = new Emgccontact();
                $emgc->id = $data[53];
                $emgc->fname = $data[54];
                $emgc->lname = $data[55];
                $emgc->relation = $data[56];
                $emgc->contact_id = $data[57];
                $emgc->save ();

                $student = new Student();
                $student->id = $data[58];
                $student->fname = $data[59];
                $student->lname = $data[60];
                $student->dob = date_format(new DateTime($data[61]), "Y-m-d");
                $student->sex = $data[62];
                $student->yeargroup = $data[63];
                $student->form = $data[64];
                $student->school_id = $data[65];
                $student->address_id = $data[66];
                $student->contact_id = $data[67];
                $student->emgccontact_id = $data[68];
                $student->save ();

                $student = Student::find($data[58]);
                $student->pareent()->attach($data[13]);
                if($data [33] != null && $data [33] != "" ){
                $student->pareent()->attach($data[32]);
                }

                $addition = new Addition();
                $addition->id = $data[69];
                $addition->career = $data[70];
                $addition->shirt = $data[71];
                $addition->allergy = $data[72];
                $addition->meal = $data[73];
                $addition->type = $data[74];
                $addition->btype = $data[75];
                $addition->shoe = $data[76];
                $addition->degree = $data[77];
                $addition->stemcenter_id = $data[78];
                $addition->yr = $data[79];
                $addition->student_id = $data[80];
                $addition->save ();

                $center = Stemcenter::where('id', $data[78])->first();
                $males = $center->males;
                $females = $center->females;
                $busary = $center->busary;
                if($data[62] === 'Male'){
                    $center->update([
                        'males'=> $males + 1
                    ]);
                }else{
                    $center->update([
                        'females'=> $females + 1
                    ]);
                }

                if($data[74] === 'Busary'){
                    $center->update([
                        'busary'=> $busary + 1
                    ]);
                }

            }
            fclose ( $handle );
        }
    }
}
