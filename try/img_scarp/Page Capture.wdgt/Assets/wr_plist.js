/*
 * File: wr_plist.js
 *
 * Copyright (c) 2007-2009, Paulo Avila (apaulodesign.com)
 *
 * Project: General Widget Resource
 *
 * Description: Provides methods to read and write widget preferences and
 *  read only access to the values of keys defined inside the Info.plist file.
 *
 */

var ELEMENT_NODE=1;var ATTRIBUTE_NODE=2;var TEXT_NODE=3;var CDATA_SECTION_NODE=4;var ENTITY_REFERENCE_NODE=5;var ENTITY_NODE=6;var PROCESSING_INSTRUCTION_NODE=7;var COMMENT_NODE=8;var DOCUMENT_NODE=9;var DOCUMENT_TYPE_NODE=10;var DOCUMENT_FRAGMENT_NODE=11;var NOTATION_NODE=12;function wr_getPref(a){var b=null;if(window.widget){b=widget.preferenceForKey(a);}return b;}function wr_setPref(b,a){if(window.widget){widget.setPreferenceForKey(b,a);}return a;}function wr_getPlistValue(e){var d,c;var g="";var b=null;var a=null;var f=new XMLHttpRequest();f.open("GET",window.location.pathname.replace(/[^/]*$/,"Info.plist"),false);f.send(null);b=f.responseXML.getElementsByTagName("dict")[0].childNodes;for(d=0;d<b.length;d++){if(b[d].nodeType===ELEMENT_NODE&&b[d].tagName.toLowerCase()==="key"&&b[d].firstChild.data===e){if(b[d+2].tagName.toLowerCase()!=="array"){g=b[d+2].firstChild.data;}else{g=new Array();a=b[d+2].childNodes;for(c=0;c<a.length;c++){if(a[c].nodeType===ELEMENT_NODE){g.push(a[c].firstChild.data);}}}break;}}return g;}
