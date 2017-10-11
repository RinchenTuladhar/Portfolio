<?php
require_once("store.php");

function listOfShows($val = true) : TVShowList
{
	$TVShows = [];
	// House of Cards
	$TVShows["1"] = new TVShow("House of Cards", "House of Cards is an American political drama web television 
			series created by Beau Willimon. Set in present-day Washington, D.C., House of Cards 
			is the story of Frank Underwood (Kevin Spacey), a Democrat from South Carolina's 5th congressional
			district and House Majority Whip.", "Drama", 
			"55 minutes", 0);
	
	$TVShows["2"] = new TVShow("The Shield", "The Shield is an American crime drama television series starring Michael Chiklis
			The story is shows the lives and cases of a corrupted LAPD cop and the police unit under his command", 
			"Crime, Drama, Thriller", 
			"47 minutes", 0);
	
	$TVShows["3"] = new TVShow("Breaking Bad", "A high school chemistry teacher diagnosed with inoperable lung cancer turns to 
			manufacturing and selling methamphetamine in order to secure his family's future.", "Drama", 
			"55 minutes", 0);
	
	$TVShows["4"] = new TVShow("The Walking Dead", "Waking up in an empty hospital after weeks in a coma, County Sheriff Rick 
			Grimes (Andrew Lincoln) finds himself utterly alone. The world as he knows it is gone, ravaged by a zombie epidemic. 
			The Walking Dead tells the story of the weeks and months that follow after the apocalypse.", 
			"Drama, Horror, Thriller", "44 minutes", 0);
	
	$TVShows["5"] = new TVShow("Sons of Anarchy", "Sons of Anarchy. Sons of Anarchy is an American crime drama television 
			series created by Kurt Sutter. It follows the lives of a close-knit outlaw motorcycle club operating in Charming, a 
			fictional town in California's Central Valley.", "Crime, Drama, Thriller", 
			"45 minutes", 0);
	
	$TVShows["6"] = new TVShow("Stranger Things", "When a young boy disappears, his mother, a police chief, and his friends must 
			confront terrifying forces in order to get him back.", 
			"Drama, Fantasy, Horror", "55 minutes", 0);
	
	$TVShows["7"] = new TVShow("Better Call Saul", "The trials and tribulations of criminal lawyer, Jimmy McGill, in the time leading up to establishing 
			his strip-mall law office in Albuquerque, New Mexico.", "Crime, Drama", "46 minutes", 0);
	
	$TVShows["8"] = new TVShow("The IT Crowd", "The comedic adventures of a rag-tag group of technical support workers at a large corporation."
			, "Comedy", "25 minutes", 0);
	
	$TVShows["9"] = new TVShow("Mr. Robot", "Mr.Robot follows Elliot, a young programmer working as a cyber-security engineer by day, and a 
			vigilante hacker by night.", "Crime, Drama, Thriller", "49 minutes", 0);
	
	$TVShows["10"] = new TVShow("Rick and Morty", "An animated series that follows the exploits of a super scientist and his not so bright grandson.", 
			"Animation, Adventure, Comedy", 
			"22 minutes", 0);
	
	$listOfTVShows = new TVShowList();
	$listOfTVShows->listOfTVShows = $TVShows;
	return $listOfTVShows;
}

function displayShowInformation(TVShow $show)
{
	$content = <<<CONTENT
	<div class="tv-show-listing">
		<div class="col-md-4 col-sm-6 col-xs-12">
			<a href="tv-show-product?q={$show->showName}"><p><strong>{$show->showName}</strong></p></a>
			<p>{$show->description}</p>
		</div>
	 </div>
CONTENT;
	return $content;
}
?>
	