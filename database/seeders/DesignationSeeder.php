<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Designation;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $designations = ['Accounts Manager', 'Accounts Specialist', 'Agri Business Appraisal Expert', 'Agri Business Expert', 'Agri Business Specialist', 'Agriculture Extension Expert', 'Agriculture Marketing Expert', 'Agriculture Specialist', 'Agri-Marketing Specialist', 'Assistant Civil Engineer', 'Business Development Manager', 'Business Incubation Manager', 'Chief Financial Controller', 'Cluster Development Specialist', 'Dairy Value Chain Expert', 'District Accounts Manager', 'District Agriculture Marketing Coordinator', 'District Enterprise Development Coordinator', 'District Enterprise Development Executive', 'District Environment Coordinator', 'District Horticulture Coordinator', 'District Social-Sector Coordinator', 'Executive Engineer', 'Farm Machinery Advisor', 'Fertilizer & Soil Health Specialists', 'Financial Inclusion Specialist', 'Financial Management Expert', 'Financial Services Specialist', 'Horticulture Specialist', 'Human Resource Executive', 'Human Resource Specialist', 'Investment Facilitation Manager', 'Junior MIS Specialist', 'Junior Data Analyst', 'Junior Financial Management Specialist', 'Knowledge Management And Documentation Expert', 'Manager Funding &Investment Facilitation', 'Manager Incubation & Entrepreneurship Development', 'Marketing Specialist Fishery', 'Medicinal and Aromatic Plants Advisor', 'MIS Executive', 'Mobile App Developer', 'Monitoring & Evaluation Executive', 'Monitoring & Evaluation Specialist', 'Office Management Executive', 'Private Secretary to SPD', 'Personal Assistant to SPD', 'Piggery Value Chain Expert- Processing', 'Piggery Value Chain Expert- Production', 'Post Harvest Management Specialist', 'Preliminary Project Report Expert', 'Private Sector Development Specialist', 'Procurement & Contract Management Specialist', 'Procurement Management Executive', 'Procurement Management Specialist', 'Project Appraisal Expert', 'Project Management Expert', 'Public Information cum Communication Specialist', 'Seed Certification Assistant', 'Seed Multiplication Expert', 'Senior Accounts Manager', 'Senior Agriculture Policy Advisor', 'Senior Communication Expert', 'Senior Consultant DBT & Soil Health', 'Senior Financial Management Specialist', 'Sericulture Specialist for OPIU-Sericulture', 'Social-Sector Coordinator', 'System Administrator', 'Data Entry Operator', 'IT Expert (Schemes)', 'Accounts Executive', 'Business Analyst', 'Business Process Reengineering Expert', 'Chief Financial Controller', 'Computer Operator', 'Contract Management Specialist', 'Data Analyst', 'Database Administrator', 'Financial Management Executive', 'Financial Management Specialist', 'ICT Infrastructure Specialist ', 'ICT Specialist', 'IEC cum Communication Specialist', 'Junior Administrative Assistant', 'Junior ICT Infrastructure Specialist', 'Monitoring & Evaluation Specialist', 'Office Management Executive', 'Procurement & Contract Management Specialist', 'Procurement Management Executive', 'Project Management Coordinator', 'Project MIS Specialist', 'Senior Administrative Assistant', 'Social Safeguards Specialist', 'Senior Business Process Re-engineering & IT Specialist ', 'Training & Capacity Building Specialist'];
        foreach ($designations as $designation){
            Designation::create(['name' => $designation]);
        }
    }
}
