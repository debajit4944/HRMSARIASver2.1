<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Organization;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $organizations = ['ASAMB (Assam State Agriculture Marketing Board)', 'ASWC (Assam State Warehouse Corporation)', 'Directorate of Fishery', 'Directorate of Agriculture', 'Directorate of Handloom & Textiles', 'Commissionerate of Industries & Commerce', 'Assam Livestock & Poultry Corporation', 'Directorate of Dairy Development', 'Directorate of Sericulture', 'PWRD Public Works & Road Department', 'WAMUL (West Assam Milk Producers Co-operative Union Ltd)', 'Animal Husbandry & Veterinary Department', 'Directorate of Horticulture & Food Processing', 'ASSCA (Assam State Seed Certification Agency)', 'District Agriculture Office'];
        foreach ($organizations as $organization){
            Organization::create(['name' => $organization]);
        }
    }
}
