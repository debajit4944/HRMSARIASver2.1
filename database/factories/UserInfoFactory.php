<?php

namespace Database\Factories;
//namespace App\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserInfo>
 */
class UserInfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        //$users = User::where('role', '<' ,'4')->get('id');
        $users = User::all();
        return [
            'user_id' => $this->faker->unique()->numberBetween(1, $users->count()),
            'gender'=>$this->faker->numberBetween(1, 3),
            'addr'=> $this->faker->address(),
            'pincode'=> $this->faker->postcode(),
            'state'=> $this->faker->state(),
            'addrdistrict'=>$this->faker->city(),
            'dob'=>$this->faker->date('Y_m_d'),
            'idtype'=>$this->faker->numberBetween(0, 2),
            'idno'=>$this->faker->bothify('?????-#####'),
            'ifsccode'=>$this->faker->bothify('??-#####'),
            'bankaccno'=>$this->faker->bothify('????-#####'),
            'project_id'=>$this->faker->numberBetween(0, 2),
            'doj'=>$this->faker->date('Y_m_d'),
            'designation_id'=>$this->faker->numberBetween(0, 3),
            'category_id'=>$this->faker->numberBetween(0, 3),
            'organisation_id'=>$this->faker->numberBetween(1, 25),
            'district_id'=>$this->faker->numberBetween(1, 25),
            'created_at' => now(),
        ];
    }
}
