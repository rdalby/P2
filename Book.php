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
		# Filter book data according to mood

		foreach ($this->books as $mood => $book) {

			$match = $mood == $userMood;


			if ($match) {
				$results[$mood] = $book;
			}

		}


		return $results;
	}

}