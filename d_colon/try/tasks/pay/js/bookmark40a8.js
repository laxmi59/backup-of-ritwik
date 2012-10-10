function bookmarkLink( thisTitle, thisUrl ) {
	if ( window.sidebar ) window.sidebar.addPanel( thisTitle || document.title, thisUrl || location.href,"" ) // Mozilla Firefox Bookmark
	else if ( window.external ) window.external.AddFavorite( thisUrl || location.href, thisTitle || document.title ) // IE Favorite
	return false
}