<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SiteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'municipio' =>$this->faker->city(),
            'lugar' =>$this->faker->citySuffix(),
            'nombre'=>  $this->faker->streetName(),
            'direccion' =>$this->faker->address(),
            'telefono'=>  $this->faker->phoneNumber(),
            'correo'=>  $this->faker->email(),
            'foto'=>  $this->faker->image(),
            'descripcion'=>  $this->faker->paragraph(),
            'tipo_actividad'=>  $this->faker->jobTitle(),
            'horario_atencion'=>  $this->faker->dayOfWeek(),
            'estado'=>  $this->faker->boolean(),
        ];
    }
}
