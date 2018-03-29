<?php

use App\City;
use App\School;
use App\Scontact;
use App\Contact;
use App\Stemcenter;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UsersTableSeeder::class);
        
        if (($handle = fopen ( public_path () . '/Cities.csv', 'r' )) !== FALSE) {
            while ( ($data = fgetcsv ( $handle, 1000, ',' )) !== FALSE ) {
                $cities_data = new City ();
                $cities_data->name = $data [0];
                $cities_data->save ();
            }
            fclose ( $handle );
        }
        //$count = 1;
        if (($handle = fopen ( public_path () . '/SchoolsInfo.csv', 'r' )) !== FALSE) {
            while ( ($data = fgetcsv ( $handle, 1000, ',' )) !== FALSE ) {
                
                if(($schools_data = School::find($data [0])) === NULL && ($contact_data = Contact::find($data [3])) === NULL && ($scontact_data = Scontact::find($data [9])) === NULL){
                    $schools_data = new School ();
                    if ($data[0] != NULL){
                        $schools_data->id = $data [0];
                        $schools_data->name = $data [1];
                        $schools_data->rotation = $data [2];
                        $schools_data->save ();
                    }
                    if($data[3] != NULL && $data[9] != NULL){
                    $contact_data = new Contact ();
                    $contact_data->id = $data [3];
                    $contact_data->mobile1 = $data [4];
                    $contact_data->mobile2 = $data [5];
                    $contact_data->email1 = $data [6];
                    $contact_data->email2 = $data [7];
                    $contact_data->type = $data [8];
                    $contact_data->save ();

                    $scontact_data = new Scontact ();
                    $scontact_data->id = $data [9];
                    $scontact_data->fname = $data [10];
                    $scontact_data->lname = $data [11];
                    $scontact_data->position = $data [12];
                    $scontact_data->school_id = $data [13];
                    $scontact_data->contact_id = $data [14];
                    $scontact_data->save ();
                    }
               }else {
                    //echo($count);
                    //$count++;
                    continue;
                }
            }
            fclose ( $handle );
        }

        if (($handle = fopen ( public_path () . '/Centers.csv', 'r' )) !== FALSE) {
            while ( ($data = fgetcsv ( $handle, 1000, ',' )) !== FALSE ) {
                if(($stemcenter_data = Stemcenter::find($data [0])) === NULL){
                    $stemcenter_data = new Stemcenter ();
                    $stemcenter_data->id = $data [0];
                    $stemcenter_data->name = $data [1];
                    $stemcenter_data->type = $data [2];
                    $stemcenter_data->wifiPassword = $data [3];
                    $stemcenter_data->males = $data [4];
                    $stemcenter_data->females = $data [5];
                    $stemcenter_data->busary = $data [6];
                    $stemcenter_data->incidents = $data [7];
                    $stemcenter_data->last_session_total = $data [8];
                    $stemcenter_data->last_session = $data [9];
                    $stemcenter_data->school_id = $data [10];
                    $stemcenter_data->save ();
                }
            }
            fclose ( $handle );
        }
    }

    
}
