<?php

use Illuminate\Database\Seeder;

class PersonsTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('persons')->delete();

		\DB::table('persons')->insert(array (
			0 =>
			array (
				'person_id' => 1,
				'forename' => 'Keanu',
				'surname' => 'Reeves',
				'birthday' => '1964-09-02',
				'image' => 'keanu_reeves.jpg',
				'bio' => 'Keanu Reeves, whose first name means "cool breeze over the mountains" in Hawaiian, was born in Beirut, Lebanon in 1964, the son of English-born Patricia Taylor, a showgirl, and American-born Samuel Nowlin Reeves, a geologist. Keanu\'s father was born in Hawaii, of British, Portuguese, Native Hawaiian, and Chinese ancestry.

His first popular success was the role of totally rad dude "Ted Logan" in Bill & Ted\'s Excellent Adventure (1989). The wacky time-travel movie became something of a cultural phenomenon, and audiences would forever confuse Reeves\'s real-life persona with that of his doofy on-screen counterpart. In 1994, the understated actor became a big-budget action star with the release of Speed (1994). Its success heralded an era of five years in which Reeves would alternate between small films, like Feeling Minnesota (1996) and The Last Time I Committed Suicide (1997), and big films like A Walk in the Clouds (1995) and The Devil\'s Advocate (1997).

After all this, Reeves did the unthinkable and passed on the Speed sequel, but he struck box-office gold again a few years later with the Wachowski siblings\' cyberadventure, The Matrix (1999).',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '2015-12-30 15:58:19',
			),
			1 =>
			array (
				'person_id' => 2,
				'forename' => 'Carl',
				'surname' => 'Rinsch',
				'birthday' => NULL,
				'image' => 'carl_rinsch.jpg',
				'bio' => NULL,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			2 =>
			array (
				'person_id' => 3,
				'forename' => 'Chris',
				'surname' => 'Morgan',
				'birthday' => NULL,
				'image' => NULL,
				'bio' => NULL,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			3 =>
			array (
				'person_id' => 4,
				'forename' => 'Hossein',
				'surname' => 'Amini',
				'birthday' => NULL,
				'image' => NULL,
				'bio' => NULL,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			4 =>
			array (
				'person_id' => 5,
				'forename' => 'Hiroyuki',
				'surname' => 'Sanada',
				'birthday' => '1960-10-12',
				'image' => 'hiroyuki_sanada.jpg',
			'bio' => 'Hiroyuki Sanada was born on the 12th of October, 1960 in Tokyo. He made his film debut when he was 5 in Game of Chance (1965) (Shin\'ichi Chiba played the lead role.) Sanada\'s father died when he was 11. Sanada joined Japan Action Club, organized and run by Sonny Chiba, when he was 12. Sanada first became famous as an action star for his role in The Shogun\'s Samurai (1978).',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			5 =>
			array (
				'person_id' => 6,
				'forename' => 'Brad',
				'surname' => 'Pitt',
				'birthday' => '1963-12-18',
				'image' => 'brad_pitt_1451494768.jpg',
			'bio' => 'Actor and producer Brad Pitt was born on December 18, 1963, in Shawnee, Oklahoma. Pitt&#039;s first jobs came in television in the late 1980s. Pitt made his big-screen debut in 1989&#039;s horror film Cutting Class and his role in 1994&#039;s Legends of the Fall helped secured his place as a Hollywood staple. More recent film credits include Fight Club (1999), Babel (2006), The Curious Case of Benjamin Button (2008), Inglourious Basterds (2009), Moneyball (2011) and World War Z (2013).

He was nominated for an Academy Award for the fifth time in 2014, winning his first Oscar in the best picture category as a producer for 12 Years a Slave (2013). He is married to fellow actor Angelina Jolie.',
				'created_at' => '2015-12-30 16:59:28',
				'updated_at' => '2015-12-30 16:59:28',
			),
			6 =>
			array (
				'person_id' => 7,
				'forename' => 'Edward',
				'surname' => 'Norton',
				'birthday' => '1969-08-18',
				'image' => 'edward_norton_1451692788.jpg',
			'bio' => 'Edward Harrison Norton was born on August 18, 1969, in Boston, Massachusetts, and was raised in Columbia, Maryland. From the age of five onward, the Yale graduate (majoring in history) was interested in acting. At the age of eight, he would ask his drama teacher what his motivation in a scene was.

He attended theater schools throughout his life, and eventually managed to find work on stage in New York as a member of the Signature players, who produced the works of playwright and director Edward Albee. Around the time when he was appearing in Albee\'s Fragments, in Hollywood, they were looking for a young actor to star opposite Richard Gere in a new courtroom thriller, Primal Fear (1996).  Before the film was even released, his test screenings for the part were causing a Hollywood sensation, and he was soon offered roles in Woody Allen\'s Everyone Says I Love You (1996) and The People vs. Larry Flynt (1996).

Edward won the Golden Globe for Best Actor in a Supporting Role and received an Oscar nomination for Best Supporting Actor for his performance in Primal Fear (1996). In 1998, Norton gained 30 pounds of muscle and transformed his look into that of a monstrous skinhead for his role as a violent white supremacist in American History X (1998). This performance would earn him his second Oscar nomination, this time for Best Actor. In 1999 came the critically acclaimed Fight Club (1999)',
				'created_at' => '2016-01-01 23:43:03',
				'updated_at' => '2016-01-03 19:01:26',
			),
			
		));
	}

}
