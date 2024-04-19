<?php

namespace Database\Factories;

use App\Extensions\RajaOngkir;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Package>
 */
class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $senderProvince = $this->faker->randomElement(RajaOngkir::province_options());
        $senderProvinceId = RajaOngkir::province_id($senderProvince);
        $senderCities = RajaOngkir::city_options($senderProvinceId);
        $senderCityId = $this->faker->randomElement(array_keys($senderCities));
        $receiverProvince = $this->faker->randomElement(RajaOngkir::province_options());
        $receiverProvinceId = RajaOngkir::province_id($receiverProvince);
        $receiverCities = RajaOngkir::city_options($receiverProvinceId);
        $receiverCityId = $this->faker->randomElement(array_keys($receiverCities));
        $user = User::inRandomOrder()->first();
        $payment = Payment::inRandomOrder()->where('user_id', $user->id)->first();
        if(!$payment) $payment = Payment::factory()->create(['user_id' => $user->id]);
        return [
            'user_id' => $user->id,
            'payment_id' => $payment->id,
            'sender_name' => $this->faker->name(),
            'sender_province' => $senderProvinceId,
            'sender_city_or_regency' => $senderCityId,
            'sender_address' => $this->faker->address(),
            'sender_phone' => $this->faker->phoneNumber(),
            'sender_postal_code' => $this->faker->postcode(),
            'receiver_name' => $this->faker->name(),
            'receiver_address' => $this->faker->address(),
            'receiver_phone' => $this->faker->phoneNumber(),
            'receiver_province' => $receiverProvinceId,
            'receiver_city_or_regency' => $receiverCityId,
            'receiver_district' => $this->faker->city(),
            'receiver_village_or_subdistrict' => $this->faker->city(),
            'receiver_postal_code' => $this->faker->postcode(),
            'service_level' => $this->faker->randomElement(['REG', 'YES', 'OKE']),
            'package_type' => $this->faker->randomElement(['document', 'non-document']),
            'cod' => $this->faker->randomElement(['yes', 'no']),
            'reference_number' => $this->faker->word(),
            'instructions' => $this->faker->sentence()
        ];
    }
}
