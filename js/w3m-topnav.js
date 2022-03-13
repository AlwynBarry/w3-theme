/**
 * Name: w3m-topnav
 * Descripton: Scripts to create a w3.css based horizontal menu that re-orients to a sidebar vertical menu on mobiles.
 * @author: Alwyn Barry
 *
 * Guide: To work correctly the menu should be structured as follows:
 * 
 *	<header class="w3-bar">
 * 		<!-- Other header items can be added as needed -->
 * 		<div class="w3-bar-item w3-button w3m-control w3m-open-button" onclick="w3m_openSideMenu()">OPEN</div>
 *		<nav class="w3-bar-item w3m">
 *			<div class="w3-bar w3-padding-24">
 *				<div class="w3-bar-item w3-button w3m-control w3m-close-button" onclick="w3m_closeSideMenu()">Close</div>
 * 				<div class="w3-dropdown-hover">
 *					<!-- The dropdown button part -->
 *					<div class="w3m-caret-container">
 *						<!-- The button text, which contains the caret used in the horizontal pull-right menu --> 
 *						<a class="w3-button">Dropdown Name <i class="w3m-caret fa fa-angle-right"></i></a>
 *						<!-- The caret used in the horizontal mobile menu - to be clickable it has to be separate from the button -->
 *						<button onclick="w3m_caretClick(this)" class="w3m-clickable-caret fa fa-angle-right"></button>
 *					</div>
 *					<!-- The dropdown content part -->
 *					<div class="w3-dropdown-content w3-bar-block w3-card-4">
 *						<a class="w3-bar-item w3-button">link 1</a>
 *						<span class="w3-bar-item">Text non-link</span>
 *						<a class="w3-bar-item w3-button">link 2</a>
 * 						<!-- ... additional links, including additional dropdowns ... -->
 *					</div> <!-- w3-dropdown-content -->
 *				</div> <!-- w3-dropdown-hover -->
 *				<!-- ... additional links, including additional dropdowns ... -->
 * 			</div> <!-- w3-bar -->
 * 		</nav> <!-- w3m -->
 * 		<!-- Other header items can be added as needed -->
 * 	</header> <!-- w3-bar -->
*/


/*
 * Could use these calls to attach the on-click event to the open and close buttons instead of embedding these in the HTML.
 * If used, these calls must go in the script section at the foot of the webpage rather than in the Head.
 * Some people consider this better technique, because it separates the controller from the view and declutters the HTML
 * but this is an extra set of executable code per page and, in reality, it would be better to keep the onlick static.
*/

/*
document.getElementById('w3m-close-button').addEventListener("click",w3m-closeSideMenu);
document.getElementById('w3m-open-button').addEventListener("click",w3m-openSideMenu);
*/
/* Can use this to attach the on-click event to the caret control buttons */
/* 
document.querySelectorAll('.w3m-clickable-caret').forEach(item => {item.addEventListener('click',function(){w3m-caretClick(item)}) });
*/


/**
 *  Function called by onclick event when the button to open the side menu is clicked.
 *  To work the toplevel menu should be <nav class="w3m"> .... </nav>
**/
function w3m_openSideMenu() {
	let menus = document.getElementsByClassName('w3m');
	if (menus.length > 0) {
		/* Ensure all submenus are closed from last time so we start cleanly */
		w3m_closeAllDropdowns(menus[0]);
		/* Display the menu */
		let barDivs = menus[0].getElementsByClassName('w3-bar'); /* Fetch the main menu bar */
		if (barDivs.length > 0) {
			w3m_addClass(barDivs[0],"w3m-sidebar-reveal");
		}
	}
}


/**
 *  Function called by onclick event when the button to close the side menu is clicked.
 *  To work the toplevel menu should be <nav class="w3m"> .... </nav>
**/
function w3m_closeSideMenu() {
	let menus = document.getElementsByClassName('w3m');
	if (menus.length > 0) {
		/* Hide the menu */
		let barDivs = menus[0].getElementsByClassName('w3-bar'); /* Fetch the main menu bar */
		if (barDivs.length > 0) {
			w3m_removeClass(barDivs[0],"w3m-sidebar-reveal");
		}
	}
}


/**
 *  Auto close side menu on window resize so that it's not open when resized back to mobile
**/
function w3m_resizeWatcher() {
	if (document.documentElement.clientWidth > 991) {
		w3m_closeSideMenu();
	}
}
window.addEventListener("resize", w3m_resizeWatcher);



/**
 *  PRIVATE: Utility function used to ensure that we are not adding a class multiple times.
**/
function w3m_addClass(obj, item) {
	const itemWithSpace = ' ' + item;
	if ((obj !== null) && (obj.className.indexOf(item) == -1)) {
		obj.className += itemWithSpace;
	}
}

/**
 *  PRIVATE: Utility function used to ensure that the class we want to remove is in fact present before removing it/
**/
function w3m_removeClass(obj, item) {
	const itemWithSpace = ' ' + item;
	if (obj !== null) {
		obj.className = obj.className.replace(itemWithSpace, "");
	}
}

/**
 *  PRIVATE: Show or hide a dropdown submenu, and change the caret to show hidden or open.
 *  Don't call this - used to remove duplicate code from the functions below.
**/
function w3m_toggleDropdown(dropdownObj,toOpen) {
	/* Toggle both the menu and the corresponding caret to Open or Closed */
	let hover = dropdownObj.parentNode; /* Fetch the surrounding 'w3-dropdown-hover' div */
	if (hover !== null) {
		let caretDivs = hover.getElementsByClassName('w3m-caret-container'); /* Fetch the caret block */
		let carets = null;
		if ((caretDivs !== null) && (caretDivs.length > 0)) {
			carets = caretDivs[0].getElementsByClassName('w3m-clickable-caret'); /* Fetch the caret element */
		}
		if (toOpen) {
			if (dropdownObj.className.indexOf("w3m-submenu-show") == -1) { /* If not already open */
				/* Open the drop down and the turn the caret */
				w3m_addClass(dropdownObj, "w3m-submenu-show");
				if ((carets !== null) && (carets.length > 0)) {w3m_addClass(carets[0], "w3m-caret-toggle");}
			}
		} else {
			/* Close the drop down and turn the caret */
			w3m_removeClass(dropdownObj, "w3m-submenu-show");
			if ((carets !== null) && (carets.length > 0)) {w3m_removeClass(carets[0], "w3m-caret-toggle");}
		}
	}
}

/**
 *  PRIVATE: Utility function to close all submenus in the menu so we start afresh when the menu is opened.
**/
function w3m_closeAllDropdowns(obj) {
	/* Ensure all submenus are toggled closed so that we open the menu afresh next time */
	let dropdowns = obj.getElementsByClassName('w3-dropdown-content'); /* Fetch the array of submenu dropdowns */
	for (i=0; i<dropdowns.length; i++) {
		w3m_toggleDropdown(dropdowns[i], false);
	}
}

/**
 *  PUBLIC: Call this from onclick event, using <code>this</code> as the parameter to open or close the submenu
 *  The onclick event should be within a w3m-clickable-caret element that follows the button element
 *  and which are both within a w3m-caret-container div. This is the first part within the w3-dropdown-hover div,
 *	with the dropdown content to be displayed held within a w3-dropdown-content div immediately following.
 *  I.E.:	<div class="w3-dropdown-hover">
 *				<!-- The dropdown button part -->
 *				<div class="w3m-caret-container">
 *					<!-- The button text, which contains the caret used in the horizontal pull-right menu --> 
 *					<a class="w3-button">Dropdown Name <i class="w3m-caret fa fa-angle-right"></i></a>
 *					<!-- The caret used in the horizontal mobile menu - to be clickable it has to be separate from the button -->
 *					<button onclick="caretClick(this)" class="w3m-clickable-caret fa fa-angle-right"></button>
 *				</div>
 *				<!-- The dropdown content part -->
 *				<div class="w3-dropdown-content w3-bar-block w3-card-4">
 *					<a class="w3-bar-item w3-button">link 1</a>
 *					<a class="w3-bar-item w3-button">link 2</a>
 *				</div>
 *			</div>
**/
function w3m_caretClick(obj) {
	/* Open or close a submenu when it's caret is clicked.  Closing will also close all open submenus of this menu */
	let parent = obj.parentNode; /* Fetch the 'w3m-caret-container' div */
	if (parent !== null) {
		let hover = parent.parentNode; /* Fetch the surrounding 'w3-dropdown-hover' div */
		if (hover !== null) {
			let dropdowns = hover.getElementsByClassName('w3-dropdown-content'); /* Fetch the array of submenu dropdowns */
			if (dropdowns.length > 0) {
				let toOpen = (dropdowns[0].className.indexOf("w3m-submenu-show") == -1);
				w3m_toggleDropdown(dropdowns[0], toOpen);
				if (! toOpen) {
					/* Close all lower level dropdowns that are open if closing a higher level dropdown */
					for (i=1; i<dropdowns.length; i++) {
						w3m_toggleDropdown(dropdowns[i], false);
					}
				}
			}
		}
	}
}


/**
 *  Run when the scripts are loaded to add the close button on-click to the close button in a Wordpress Menu.
 *  We have to do this because there is no way to add an on-click event within the menu manager in Wordpress Admin
 *  and yet the close button needs to be a part of that menu rather than a separate button.
 **/
document.querySelectorAll('.w3m-close-button').forEach(item => {item.addEventListener("click",w3m_closeSideMenu)});

