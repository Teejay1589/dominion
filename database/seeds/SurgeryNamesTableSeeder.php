<?php

use Illuminate\Database\Seeder;

class SurgeryNamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $surgery_names = array(
            'Genital',
            'Female',

            'Cervicectomy',
            'Clitoridectomy ',
            'Hysterectomy',
            'Myomectomy',
            'Oophorectomy',
            'Salpingectomy',
            'Salpingoophorectomy',
            'Vaginectomy ',
            'Vulvectomy',

            'Male',

            'Gonadectomy',
            'Orchiectomy ',
            'Penectomy',
            'Posthectomy ',
            'Prostatectomy',
            'Varicocelectomy ',
            'Vasectomy',

            'Musculoskeletal ',

            'Bursectomy',

            'Amputation ',

            'Hemicorporectomy',
            'Hemipelvectomy ',

            'Nervous system',
            'CNS ',

            'Decompressive craniectomy',
            'Hemispherectomy ',
            'Anterior temporal lobectomy',
            'Hypophysectomy ',
            'Amygdalohippocampectomy',
            'Laminectomy ',
            'Corpectomy',
            'Facetectomy ',

            'PNS',

            'Ganglionectomy ',
            'Sympathectomy / Endoscopic thoracic sympathectomy',
            'Neurectomy ',
            'Nerve transfer',

            'Ear ',

            'Stapedectomy',
            'Mastoidectomy ',

            'Eye',

            'Photorefractive keratectomy ',
            'Trabeculectomy',
            'Iridectomy ',
            'Vitrectomy',

            'Gastrointestinal ',

            'Glossectomy',
            'Esophagectomy ',
            'Gastrectomy',
            'Appendectomy ',
            'Proctocolectomy',
            'Colectomy ',
            'Hepatectomy',
            'Cholecystectomy ',
            'Pancreatectomy / Pancreaticoduodenectomy',

            'Respiratory ',

            'Rhinectomy',
            'Laryngectomy ',
            'Pneumonectomy',

            'Endocrine ',

            'Hypophysectomy',
            'Thyroidectomy ',
            'Parathyroidectomy',
            'Adrenalectomy ',
            'Pinealectomy',

            'Renal ',

            'Nephrectomy',
            'Cystectomy ',

            'Lymphatic',

            'Tonsillectomy ',
            'Adenoidectomy',
            'Thymectomy',
            'Splenectomy',
            'Lymphadenectomy ',
            'Adenectomy',

            'Breast ',

            'Lumpectomy',
            'Mastectomy ',

            'Bone / joint',

            'Coccygectomy ',
            'Ostectomy',
            'Femoral head ostectomy ',
            'Astragalectomy',
            'Discectomy ',
            'Synovectomy',

            'Ungrouped ',

            'Embolectomy',
            'Endarterectomy ',
            'Frenectomy',
            'Ganglionectomy ',
            'Gingivectomy',
            'Lobectomy ',
            'Myomectomy',
            'Panniculectomy ',
            'Pericardiectomy',

            'Ostomy ',
            'Gastrointestinal',

            'Gastrostomy ',
            'Percutaneous endoscopic gastrostomy',
            'Gastroduodenostomy ',
            'Gastroenterostomy',
            'Ileostomy ',
            'Jejunostomy',
            'Colostomy ',
            'Cholecystostomy',
            'Hepatoportoenterostomy ',

            'Urogenital',

            'Nephrostomy ',
            'Ureterostomy',
            'Cystostomy ',
            'Suprapubic cystostomy',
            'Urostomy ',

            'Nervous system',

            'Ventriculostomy ',

            'Eye',

            'Dacryocystorhinostomy ',

            'Otomy',
            'Urogenital ',

            'Amniotomy',
            'Clitoridotomy ',
            'Hysterotomy',
            'Hymenotomy',
            'Episiotomy',
            'Meatotomy',
            'Nephrotomy',

            'Nervous system',
            'CNS',

            'Craniotomy',
            'Pallidotomy',
            'Thalamotomy',
            'Lobotomy',
            'Bilateral cingulotomy',
            'Cordotomy',
            'Rhizotomy',
            'Laminotomy',
            'Foraminotomy',

            'PNS',

            'Axotomy',
            'Vagotomy',

            'Ear',

            'Myringotomy',

            'Eye',

            'Radial keratotomy',

            'Musculoskeletal',

            'Myotomy',
            'Tenotomy',
            'Fasciotomy',
            'Escharotomy',
            'Osteotomy',
            'Arthrotomy',
            'Tendon transfer',

            'Gastrointestinal',

            'Myotomy',
            'Heller myotomy',
            'Pyloromyotomy',
            'Anal sphincterotomy',
            'Lateral internal sphincterotomy',

            'Respiratory',

            'Sinusotomy',
            'Cricothyrotomy',
            'Bronchotomy',
            'Thoracotomy',
            'Thyrotomy',
            'Tracheotomy',

            'Cardiovascular',

            'Cardiotomy',
            'Phlebotomy',
            'Arteriotomy',
            'Venotomy',

            'Ungrouped',

            'Laparotomy',
        );

        foreach ($surgery_names as $key => $value) {
            if (App\SurgeryName::where('surgery_name', trim($value))->count() == 0) {
                DB::table('surgery_names')->insert([
                    'surgery_name' => trim($value),
                    'created_at' => now(),
                ]);
            }
        }
    }
}
