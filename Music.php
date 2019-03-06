<?php

namespace P2;

class Music
{
	# Properties
	private $musics;

	# Methods
	public function __construct($json)
	{
		# Load book data
		$musicsJson = file_get_contents($json);
		$this->musics = json_decode($musicsJson, true);
	}

	public function getAll()
	{
		return $this->musics;
	}

	public function getByTitle(string $userMood)
	{
		$results = [];

		# Filter book data according to search term

		foreach ($this->musics as $mood => $music) {

			$match = $mood == $userMood;


			if ($match) {
				$results[$mood] = $music;
			}
		}

		return $results;
	}
}