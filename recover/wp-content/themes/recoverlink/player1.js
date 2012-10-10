function closePlayerWindow()
{
	window.opener.playerWindow = undefined;
	window.close();
}

function resizePlayerWindowOnCollapse()
{
	// window.resizeTo( width, height );
	window.resizeTo(427, 256);
}

function resizePlayerWindowOnExpand()
{
	//window resizeTo( width, height );
	window.resizeTo(427, 561);
}

function gotoLabelPage( url )
{
	// go to Label Page in Opener window
	window.opener.location.href = url;
	window.opener.focus();
}

function gotoGenrePage( url )
{
	// go to Genre Page in Opener window
	window.opener.location.href = url;
	window.opener.focus();
}

function gotoProductPage( url )
{
	// go to Product Page in Opener window
	window.opener.location.href = url;
	window.opener.focus();
}

function addTrackToFavorites( id )
{
	// add track to Favorites in Opener window
	window.opener.bagpak15AddToFav( id, true );
	window.opener.focus();
}

function addTrackListToFavorites( ids )
{
	for (var i = 0; i < ids.length; i++)
	{
		window.opener.bagpak15AddToFav( ids[i], true );
	}
}

function addAlbumToFavorites( id )
{
	// add album to Favorites in Opener window
	window.opener.bagpak15AddToFavAlbum( id, true );
	window.opener.focus();
}

function addTrackToCart( id )
{
	// add Track to Cart in Opener window
	window.opener.bagpak15AddToCart( id, true );
	window.opener.focus();
}

function addTrackListToCart( ids )
{
	for( var i = 0; i < ids.length; i++ )
	{
		window.opener.bagpak15AddToCart( ids[i], true );
	}
	window.opener.focus();
}

function addAlbumToCart( id )
{
	// add Album to Cart in Opener window
	window.opener.bagpak15AddToCartAlbum( id, true );
	window.opener.focus();
}

function trackToPlayer()
{
	var track = trackList.shift();
	alert(track.id);
		loadTrackToPlayer( track.id, track.loadAlbum );
}

function loadTrackToPlayer( id, loadAlbum )
{
	getFlashMovie("musicPlayer").requestTrackLoad(id, loadAlbum);	
}

function getFlashMovie( movieName ) 
{
	  var isIE = navigator.appName.indexOf("Microsoft") != -1;
	  return (isIE) ? window[movieName] : document[movieName];
}