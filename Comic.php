<?php

namespace P2;

class Comic
{
	# Properties
	private $comics;

	# Methods
	public function __construct($json)
	{
		# Load book data
		$comicsJson = file_get_contents($json);
		$this->comics = json_decode($comicsJson, true);
	}

	public function getAll()
	{
		return $this->comics;
	}

	public function getByTitle(string $userMood)
	{
		$results = [];

		# Filter book data according to search term

		foreach ($this->comics as $mood => $comic) {

			$match = $mood == $userMood;


			if ($match) {
				$results[$mood] = $comic;
			}
		}

		return $results;
	}

}