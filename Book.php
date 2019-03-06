<?php

namespace P2;

class Book
{
	# Properties
	private $books;

	# Methods
	public function __construct($json)
	{
		# Load book data
		$booksJson = file_get_contents($json);
		$this->books = json_decode($booksJson, true);
	}

	public function getAll()
	{
		return $this->books;
	}

	public function getByTitle(string $userMood)
	{
		$results = [];

		# Filter book data according to search term

		foreach ($this->books as $mood => $book) {

				$match = $mood == $userMood;


			if ($match) {
				$results[$mood] = $book;
			}
		}


	//	$json = 'get yo JSON';
	//	$array = json_decode($json, true); // The `true` says to parse the JSON into an array,
		// instead of an object.
	//	foreach($array['workers']['myemail@gmail.com'] as $stat => $value) {
			// Do what you want with the stats
	//		echo "$stat: $value<br>";
	//	}

	//	foreach ($this->books as $title => $book) {
	//		if ($caseSensitive) {
	//			$match = $title == $searchTerm;
	//		} else {
	//			$match = strtolower($title) == strtolower($searchTerm);
	//		}

	//		if ($match) {
	//			$results[$title] = $book;
	//		}
	//	}

		return $results;
	}

}