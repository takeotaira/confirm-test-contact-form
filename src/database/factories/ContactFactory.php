<?php

namespace Database\Factories;
use App\models\contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Contact::class;
    public function definition()
        {
            return [
                'category_id' => $this -> faker -> numberBetween(1, 5),
                'first_name' => $this-> faker -> randomElement(['寿人','咲','勇人','照']),
                'last_name' => $this-> faker -> randomElement(['伊達','菅原','岡田','中田','佐々木']),
                'gender' => $this-> faker -> numberBetween(1, 3),
                'email' => $this-> faker -> unique() -> safeEmail(),
                'tel' => $this-> faker -> numerify('0##########'),
                'address' => $this->faker -> address(),
                'building' => $this->faker -> optional() -> secondaryAddress(),
                'detail' => $this->faker -> realtext(80),
        ];
    }
}