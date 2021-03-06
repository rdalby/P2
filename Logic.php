<?php
/**
 * Created by PhpStorm.
 * User: rachel
 * Date: 2/27/2019
 * Time: 1:45 PM
 */

#need the require Form.php in to call our form post data later
require 'Form.php';
require 'Book.php';
require 'Comic.php';
require 'Music.php';
require 'Video.php';

#need to call the use of the namespace DWA so it knows which Form function to call from. The use allows us to call this
#function without prefixing all of the calls with DWA
use DWA\Form;

#calling all the json files that contain the books, comics, videos, and music references
use P2\Book;
use P2\Comic;
use P2\Video;
use P2\Music;

#starting the session to add values to cookies later
session_start();

#pulling in the form post data
$form = new Form($_POST);

#extracting the json information for all 4 media types
$book = new Book('Books.json');
$comic = new Comic('Comics.json');
$video = new Video('Videos.json');
$music = new Music('Music.json');

# Get data from form request
$userName = $form->get('userName');
$mood = $form->get('mood');
$comicCheck = $form->has('comic');
$bookCheck = $form->has('book');
$videoCheck = $form->has('video');
$musicCheck = $form->has('music');


# Validate the form data
$errors = $form->validate([
	'userName' => 'required|alphaNumeric',
	'mood' => 'required'
]);

#if form doesn't have errors it goes through the next little bit of processing
if (!$form->hasErrors) {

#going to get a function if the checkbox was not selected then it doesn't go into the respecting functions

	if ($bookCheck == true) {
		$books = $book->getByTitle($mood);
	}
	if ($comicCheck == true) {
		$comics = $comic->getByTitle($mood);
	}
	if ($videoCheck == true) {
		$videos = $video->getByTitle($mood);
	}
	if ($musicCheck == true) {
		$musics = $music->getByTitle($mood);
	}
}
# Storing data into the session to be grabbed by other pages
$_SESSION['results'] = [
	'errors' => $errors,
	'hasErrors' => $form->hasErrors,
	'userName' => $userName,
	'mood' => $mood,
	'books' => $books ?? null,
	'bookCount' => isset($books) ? count($books) : 0,
	'comics' => $comics ?? null,
	'comicCount' => isset($comics) ? count($comics) : 0,
	'videos' => $videos ?? null,
	'videoCount' => isset($videos) ? count($videos) : 0,
	'musics' => $musics ?? null,
	'musicCount' => isset($musics) ? count($musics) : 0,
	'comicCheck' => $comicCheck,
	'bookCheck' => $bookCheck,
	'videoCheck' => $videoCheck,
	'musicCheck' => $musicCheck
];


# Redirect back to the form on index.php
header('Location: index.php');