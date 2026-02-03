<?php

namespace Database\Seeders;

use App\Models\TrumpName;
use Illuminate\Database\Seeder;

class TrumpNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = [
            ['name' => 'Tangerine Wank Maggot', 'author' => 'System'],
            ['name' => 'Mrs Putin', 'author' => 'System'],
            ['name' => 'Cheeto Jesus', 'author' => 'System'],
            ['name' => 'Mango Mussolini', 'author' => 'System'],
            ['name' => 'The Fanta Menace', 'author' => 'System'],
            ['name' => 'Agent Orange', 'author' => 'System'],
            ['name' => 'Trumplethinskin', 'author' => 'System'],
            ['name' => 'Screaming Carrot Demon', 'author' => 'System'],
            ['name' => 'Darth Tax Evader', 'author' => 'System'],
            ['name' => 'Short-Fingered Vulgarian', 'author' => 'System'],
            ['name' => 'The Tangerine Tornado', 'author' => 'System'],
            ['name' => 'Yam Killer', 'author' => 'System'],
            ['name' => 'Injustice Collector', 'author' => 'System'],
            ['name' => 'Vanilla ISIS', 'author' => 'System'],
            ['name' => 'Hair Fuehrer', 'author' => 'System'],
            ['name' => 'The Combover Con Artist', 'author' => 'System'],
            ['name' => 'Adolf Twitler', 'author' => 'System'],
            ['name' => 'Benito Donald', 'author' => 'System'],
            ['name' => 'Casper the Unfriendly Ghost', 'author' => 'System'],
            ['name' => 'Creep Throat', 'author' => 'System'],
            ['name' => 'Donnie Darko', 'author' => 'System'],
            ['name' => 'Glow-in-the-dark Goblin', 'author' => 'System'],
            ['name' => 'King Leer', 'author' => 'System'],
            ['name' => 'Lord of the Lies', 'author' => 'System'],
            ['name' => 'Orange Julius Caesar', 'author' => 'System'],
            ['name' => 'The Lyin\' King', 'author' => 'System'],
            ['name' => 'T-Rump', 'author' => 'System'],
            ['name' => 'The Cheeto-in-Chief', 'author' => 'System'],
            ['name' => 'Voldemort with a Tan', 'author' => 'System'],
            ['name' => 'Walking Punchline', 'author' => 'System'],
            ['name' => 'Zippy the Chimp', 'author' => 'System'],
            ['name' => 'The Angry Creamsicle', 'author' => 'System'],
            ['name' => 'Biff Tannen', 'author' => 'System'],
            ['name' => 'Captain Chaos', 'author' => 'System'],
            ['name' => 'Commander-in-Grief', 'author' => 'System'],
            ['name' => 'Dangerous Buffoon', 'author' => 'System'],
            ['name' => 'Ego-maniacal Narcissist', 'author' => 'System'],
            ['name' => 'Fat Nixon', 'author' => 'System'],
            ['name' => 'Generous Genius (Self-proclaimed)', 'author' => 'System'],
            ['name' => 'Human Spray Tan', 'author' => 'System'],
            ['name' => 'Infant-in-Chief', 'author' => 'System'],
            ['name' => 'Jabbering Jackass', 'author' => 'System'],
            ['name' => 'Killer Klown', 'author' => 'System'],
            ['name' => 'Little Hands', 'author' => 'System'],
            ['name' => 'Major Mistake', 'author' => 'System'],
            ['name' => 'Nectarine Nightmare', 'author' => 'System'],
            ['name' => 'Old Yeller', 'author' => 'System'],
            ['name' => 'Pompous Prick', 'author' => 'System'],
            ['name' => 'Quack Doctor', 'author' => 'System'],
            ['name' => 'Raging Bull-shitter', 'author' => 'System'],
            ['name' => 'Small-Loan Millionaire', 'author' => 'System'],
            ['name' => 'Toxic Orange Cloud', 'author' => 'System'],
            ['name' => 'Unstable Genius', 'author' => 'System'],
            ['name' => 'Vicious Viper', 'author' => 'System'],
            ['name' => 'Wannabe Dictator', 'author' => 'System'],
            ['name' => 'Xenophobic Xenomorph', 'author' => 'System'],
            ['name' => 'Yellow-bellied Coward', 'author' => 'System'],
            ['name' => 'Zero-Star President', 'author' => 'System'],
            ['name' => 'The Great Gourd', 'author' => 'System'],
            ['name' => 'The Gilded Grifter', 'author' => 'System'],
            ['name' => 'Pudgy Pinocchio', 'author' => 'System'],
            ['name' => 'The Human Airhorn', 'author' => 'System'],
            ['name' => 'King of Debt', 'author' => 'System'],
            ['name' => 'The Mar-a-Lago Menace', 'author' => 'System'],
            ['name' => 'Twitler', 'author' => 'System'],
        ];

        foreach ($names as $name) {
            TrumpName::updateOrCreate(['name' => $name['name']], $name);
        }
    }
}
