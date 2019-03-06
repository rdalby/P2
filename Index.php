<?php
/**
 * Created by PhpStorm.
 * User: rachel
 * Date: 2/27/2019
 * Time: 6:51 AM
 */
require 'search.php';
?>

<!DOCTYPE html>
<html lang='en'>
<head>

    <title>P2</title>
    <meta charset='utf-8'>

    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css'
          rel='stylesheet'
          integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO'
          crossorigin='anonymous'>

    <link href='/styles/app.css' rel='stylesheet'>

</head>
<body>

<section id='main'>
    <h1>P2</h1>

    <p>P2 is an application that recommends media based on your current mood</p>

    <form method='POST' action='Logic.php'>
        <div class='instructions'>
            * Required field
        </div>
        <fieldset>
            <label>* Name
                <input type='text' name='userName' value='<?= $userName ?? '' ?>'>
            </label><br>
            <label>* Mood
                <select name='mood'>
                    <option value='<?= $mood ?? '' ?>'><?= $mood ?? '' ?></option>
                    <option value='happy'>Happy</option>
                    <option value='excited'>Excited</option>
                    <option value='mad'>Mad</option>
                    <option value='sad'>Sad</option>
                    <option value='meh'>Meh</option>
                </select>
            </label>
        </fieldset>
        <fieldset>
            <label>Media Preference:</label><br>
            <label>
                <input type='checkbox'
                       name='comic' <?php if (isset($comic) and $comic) echo 'checked' ?> >
                Comic
            </label>
            <label>
                <input type='checkbox'
                       name='book' <?php if (isset($book) and $book) echo 'checked' ?> >
                Book
            </label>
            <label>
                <input type='checkbox'
                       name='video' <?php if (isset($video) and $video) echo 'checked' ?> >
                Video
            </label>
            <label>
                <input type='checkbox'
                       name='music' <?php if (isset($music) and $music) echo 'checked' ?> >
                Music
            </label>
        </fieldset>

        <input type='submit' value='Search' class='btn btn-primary'>
        <!--
        <?php if ($hasErrors): ?>
            <div class='errors alert alert-danger'>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif ?>
-->
    </form>
    <!--
    <?php if (!$hasErrors): ?>
-->
    <div id='results'>
		<?php if (isset($userName)): ?>
            <div class='alert alert-primary' role='alert'>
                Hi <em><?= $userName ?></em> you said your mood was <em><?= $mood ?></em> below is the media that
                matches!
            </div>
		<?php endif; ?>

		<?php if (isset($bookCount) and $bookCount == 0): ?>
            <div class='alert alert-warning' role='alert'>
                No results found
            </div>
		<?php endif; ?>

		<?php if (isset($books)): ?>
            <ul class='books'>
				<?php foreach ($books as $mood => $book): ?>
                    <li class='book'>
                        <div class='title'><?= $book['title'] ?></div>
                        <div class='author'>
                            by <?= $book['author'] ?>
                        </div>
                        <div class='cover'>
                            <img src='<?= $book['cover_url'] ?>' alt='Book image <?= $mood ?>'>
                        </div>
                        <div class='buyNow'>
                            <a href='<?= $book['purchase_url'] ?>'> Buy now!</a>
                        </div>
                    </li>
				<?php endforeach ?>
            </ul>
		<?php endif ?>
		<?php if (isset($comics)): ?>
            <ul class='comics'>
				<?php foreach ($comics as $mood => $comic): ?>
                    <li class='comic'>
                        <div class='title'><?= $comic['title'] ?></div>
                        <div class='author'>
                            by <?= $comic['author'] ?>
                        </div>
                        <div class='cover'>
                            <img src='<?= $comic['cover_url'] ?>' alt='Comic image <?= $mood ?>'>
                        </div>
                    </li>
				<?php endforeach ?>
            </ul>
		<?php endif ?>
		<?php if (isset($videos)): ?>
            <ul class='videos'>
				<?php foreach ($videos as $mood => $video): ?>
                    <li class='video'>
                        <div class='title'><?= $video['title'] ?></div>
                        <div class='author'>
                            by <?= $video['producer'] ?>
                        </div>
                        <div class='cover'>
                            <img src='<?= $video['cover_url'] ?>' alt='video image <?= $mood ?>'>
                        </div>
                        <div class='buyNow'>
                            <a href='<?= $video['purchase_url'] ?>'> Buy now!</a>
                        </div>
                    </li>
				<?php endforeach ?>
            </ul>
		<?php endif ?>
		<?php if (isset($musics)): ?>
            <ul class='musics'>
				<?php foreach ($musics as $mood => $music): ?>
                    <li class='music'>
                        <div class='title'><?= $music['title'] ?></div>
                        <div class='author'>
                            by <?= $music['artist'] ?>
                        </div>
                        <div class='cover'>
                            <iframe width="560" height="315" src='<?= $music['song_url'] ?>' frameborder="0"
                                    allow="accelerometer; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                        </div>
                    </li>
				<?php endforeach ?>
            </ul>
		<?php endif ?>
    </div><!--
    <?php endif; ?>
-->
</section>

<footer>
    <a href='https://github.com/rdalby/p2'>View this project on Github</a>
</footer>

</body>
</html>
