<?php

namespace P2;

class Video
{
	# Properties
	private $videos;

	# Methods
	public function __construct($json)
	{
		# Load book data
		$videosJson = file_get_contents($json);
		$this->videos = json_decode($videosJson, true);
	}

	public function getAll()
	{
		return $this->videos;
	}

	public function getByTitle(string $userMood)
	{
		$results = [];

		# Filter book data according to mood

		foreach ($this->videos as $mood => $video) {

			$match = $mood == $userMood;


			if ($match) {
				$results[$mood] = $video;
			}
		}

		return $results;
	}
}