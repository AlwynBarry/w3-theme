<?php

if ( !class_exists( 'W3M_Nav_Walker' ) ) {

	class W3M_Nav_Walker extends Walker_Nav_Menu {
	 
		/**
		 * Whether the items_wrap contains schema microdata or not.
		 *
		 * @since 4.2.0
		 * @var boolean
		 */
		private $has_schema = false;
		

		/**
		 * Starts the submenu list before the elements are added.
		 *
		 * @since WP 3.0.0
		 *
		 * @see Walker_Nav_Menu::start_lvl()
		 *
		 * @param string           $output Used to append additional content (passed by reference).
		 * @param int              $depth  Depth of menu item. Used for padding.
		 * @param WP_Nav_Menu_Args $args   An object of wp_nav_menu() arguments.
		 */
		 public function start_lvl( &$output, $depth = 0, $args = array() ) {
			if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
				$t = ''; $n = '';
			} else {
				$t = "\t"; $n = "\n";
			}
			$indent = str_repeat( $t, $depth + 3 );
			
			/* Add the default class to always be provided for the dropdown container */
			$classes = array( 'dropdown-menu w3-dropdown-content w3-bar-block w3-card-4' );

			/**
			 * Filters the CSS class(es) applied to a menu list element.
			 *
			 * @since WP 4.8.0
			 *
			 * @param array    $classes The CSS classes that are normally applied to the menu `<ul>` element (now a div for w3.css).
			 * @param stdClass $args    An object of `wp_nav_menu()` arguments.
			 * @param int      $depth   Depth of menu item. Used for padding.
			 */
			$class_names = join( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

			/*
			 * The `.dropdown-menu` container needs to have a labelledby
			 * attribute which points to it's trigger link.
			 *
			 * Form a string for the labelledby attribute from the the latest
			 * link with an id that was added to the $output.
			 */
			$labelledby = '';
			// Find all links with an id in the output.
			preg_match_all( '/(<a.*?id=\"|\')(.*?)\"|\'.*?>/im', $output, $matches );
			// With pointer at end of array check if we got an ID match.
			if ( end( $matches[2] ) ) {
				// Build a string to use as aria-labelledby.
				$labelledby = 'aria-labelledby="' . esc_attr( end( $matches[2] ) ) . '"';
			}

			/* Create the final start of dropdown container html tag, with classnames and labels, and append to the output */
			$output .= "{$n}{$indent}{$t}<div $class_names $labelledby >";
		}
		

		/**
		 * Ends the submenu list after the elements are added.
		 *
		 * @since WP 3.0.0
		 *
		 * @see Walker_Nav_Menu::end_lvl()
		 *
		 * @param string           $output Used to append additional content (passed by reference).
		 * @param int              $depth  Depth of menu item. Used for padding.
		 * @param WP_Nav_Menu_Args $args   An object of wp_nav_menu() arguments.
		 */
		public function end_lvl( &$output, $depth = 0, $args = array() ) {
			if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
				$t = ''; $n = '';
			} else {
				$t = "\t"; $n = "\n";
			}
			$indent = str_repeat( $t, $depth + 3 );

			/* Add the end of the dropdown container, and follow by the end of the container of the dropdown button and submenu */
			$output .= "{$n}{$indent}{$t}";
			$output .= '</div><!-- w3-dropdown-content -->';
			$output .= "{$n}{$indent}";
			$output .= '</div><!-- w3-dropdown-hover -->';
		}


		/**
		 * Starts the element output.
		 *
		 * @since WP 3.0.0
		 * @since WP 4.4.0 The {@see 'nav_menu_item_args'} filter was added.
		 *
		 * @see Walker_Nav_Menu::start_el()
		 *
		 * @param string           $output Used to append additional content (passed by reference).
		 * @param WP_Nav_Menu_Item $item   Menu item data object.
		 * @param int              $depth  Depth of menu item. Used for padding.
		 * @param WP_Nav_Menu_Args $args   An object of wp_nav_menu() arguments.
		 * @param int              $id     Current item ID.
		 */
		 public function start_el(&$output, $item, $depth=0, $args=[], $id=0) {
			if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
				$t = ''; $n = '';
			} else {
				$t = "\t"; $n = "\n";
			}
			$indent = str_repeat( $t, $depth + 3 );

			$output .= "{$n}{$indent}";
			
			/* Add the classes needed to contain the whole dropdown
			 * This includes: - the full dropdown (the <div class="w3-dropdown-hover...)
			 * 				  - the button container (the <div class="w3m-caret-container...)
			 * 				  - the button itself (the <a ...> tag, including a caret in the <i class="w3m-caret...)
			 * 				  - a clickable caret (the <button class="w3m-clickable-caret ... )
			 * and, added by start_lvl() later:
			 * 				  - the container for the submenu items (the <div class="w3-dropdown-container ...)
			 */
			if ( isset( $args->walker ) && ( $args->walker->has_children) ) {
				$output .= '<div class="w3-dropdown-hover">';
				$output .= "{$n}{$indent}{$t}" . '<div class="w3m-caret-container">';
				$output .= "{$n}{$indent}{$t}{$t}";
			}

			/* Start the link for the menu button itself */
			$output .= ( empty( $item->url ) || ( '#' === $item->url ) ) ? '<span ' : '<a ';
			/* Add the classes and the ID for this menu button */
			$output .= $this->construct_classes( $item, $depth, $args, $id );
			$output .= $this->construct_ID( $item, $depth, $args, $id );
			/* Add the attributes (the href, and any other attributes) */
			$output .= $this->construct_attributes( $item, $depth, $args, $id );
			$output .= '>';
			
			/* Add the title that will be displayed on the menu button */
			$output .= $this->construct_title( $item, $depth, $args, $id );
			
			/* Add the in-button caret depending on whether a dropdown or pull-right sub-menu */
			if ( isset( $args->walker ) && ( $args->walker->has_children) ) {
				$output .= '<i class="w3m-caret fa ';
				if ($depth > 0) {
					/* Must be a pull-right sub-menu (secondary or more level) */
					$output .= 'fa-angle-right';
				} else {
					/* Or else a drop-down sub-menu (top level) */
					$output .= 'fa-angle-down';
				}			
				/* Finish the caret */
				$output .= '"></i>';
			}

			/* End the button */
			$output .= ( empty( $item->url ) || ( '#' === $item->url ) ) ? '</span>' : '</a>';

			/* Add the clickable caret, if needed - this appears on mobile menus */
			if ( isset( $args->walker ) && ( $args->walker->has_children) ) {
				$output .= "{$n}{$indent}{$t}{$t}" . '<button class="w3m-clickable-caret fa fa-angle-right" onclick="w3m_caretClick(this)"></button>';
				$output .= "{$n}{$indent}{$t}" . '</div> <!-- .w3m-caret-container -->';
			}
			
		}
		
		
		private function construct_classes ( $item, $depth=0, $args=[], $id=0 ) {

			$classes = empty( $item->classes ) ? array() : (array) $item->classes;

			// Updating the CSS classes of a menu item in the WordPress Customizer preview results in all classes defined
			// in that particular input box to come in as one big class string.
			$split_on_spaces = function ( $class ) {
				return preg_split( '/\s+/', $class );
			};
			$classes = $this->flatten( array_map( $split_on_spaces, $classes ) );

			// Add w3 classes and .dropdown or .active classes where they are needed.
			if ( isset( $args->walker ) && ( $args->walker->has_children) ) {
				$classes[] = 'dropdown';
			} else {
				$classes[] = 'w3-bar-item';
			}
			if ( in_array( 'current-menu-item', $classes, true ) || in_array( 'current-menu-parent', $classes, true ) ) {
				$classes[] = 'active';
			}

			// Add some additional default classes to the item.
			$classes[] = 'menu-item-' . $item->ID;
			$classes[] = 'nav-item';
			$classes[] = 'w3-button';

			// Allow filtering the classes.
			$classes = apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth );

			// Form a string of classes in format: class="class_names".
			$class_names = join( ' ', $classes );
			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
			return $class_names;
			
		}
		
		
		private function construct_ID ( $item, $depth=0, $args=[], $id=0 ) {

			/**
			 * Filters the ID applied to a menu item's list item element.
			 *
			 * @since WP 3.0.1
			 * @since WP 4.1.0 The `$depth` parameter was added.
			 *
			 * @param string           $menu_id The ID that is applied to the menu item's `<li>` element.
			 * @param WP_Nav_Menu_Item $item    The current menu item.
			 * @param WP_Nav_Menu_Args $args    An object of wp_nav_menu() arguments.
			 * @param int              $depth   Depth of menu item. Used for padding.
			 */
			$id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth );
			$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
			return $id;
			
		}


		private function construct_title ( $item, $depth=0, $args=[], $id=0 ) {
			
			/** This filter is documented in wp-includes/post-template.php */
			$title = apply_filters( 'the_title', $item->title, $item->ID );

			/**
			 * Filters a menu item's title.
			 *
			 * @since WP 4.4.0
			 *
			 * @param string           $title The menu item's title.
			 * @param WP_Nav_Menu_Item $item  The current menu item.
			 * @param WP_Nav_Menu_Args $args  An object of wp_nav_menu() arguments.
			 * @param int              $depth Depth of menu item. Used for padding.
			 */
			$title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );
			return $title;
		}
		
		
		private function construct_attributes ( $item, $depth=0, $args=[], $id=0 ) {

			// Initialize array for holding the $atts for the link item.
			$atts           = array();
			$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
			$atts['href'] = ! empty( $item->url ) ? $item->url : '#';
			$atts['target'] = ! empty( $item->target ) ? $item->target : '';
			if ( '_blank' === $item->target && empty( $item->xfn ) ) {
				$atts['rel'] = 'noopener noreferrer';
			} else {
				$atts['rel'] = ! empty( $item->xfn ) ? $item->xfn : '';
			}

			// If the item has_children add atts to <a>.
			if ( $this->has_children && 0 === $depth ) {
				/* WHERE SHOULD THESE BE?  ALSO IN THE CLICKABLE CARET ???? */
				$atts['data-toggle']   = 'dropdown';
				$atts['aria-haspopup'] = 'true';
				$atts['aria-expanded'] = 'false';
				/* WHERE SHOULD THIS BE?  IN THE PARENT DIV ?
				 * OR SHOULD THE CLASSES AND ID FOUND EARLIER BE IN THE PARENT DIV?? - they are in the <li usually!!
				$atts['class']         = 'dropdown-toggle nav-link';
				$atts['id']            = 'menu-item-dropdown-' . $item->ID;
				*/
			} else {
				if ( true === $this->has_schema ) {  /** NOTE - This isn't implemented in code yet!! **/
					$atts['itemprop'] = 'url';
				}

				// For items in dropdowns use .dropdown-item instead of .nav-link.
				/*  WHERE SHOULD THIS BE?  IN THE PARENT DIV ????
				 * OR SHOULD THE CLASSES AND ID FOUND EARLIER BE IN THE PARENT DIV?? - they are in the <li usually!!
				if ( $depth > 0 ) {
					$atts['class'] = 'dropdown-item';
				} else {
					$atts['class'] = 'nav-link';
				}
				*/
			}

			$atts['aria-current'] = $item->current ? 'page' : '';

			// Allow filtering of the $atts array before using it.
			$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

			// Build a string of html containing all the atts for the item.
			$attributes = '';
			foreach ( $atts as $attr => $value ) {
				if ( ! empty( $value ) ) {
					$value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
					$attributes .= ' ' . $attr . '="' . $value . '"';
				}
			}

			// Appending the internal item contents to the output.
			$item_output = isset( $args->before ) ? $args->before : '';
			$item_output .= $attributes;
			return $item_output;
			
		}


		/**
		 * Flattens a multidimensional array to a simple array.
		 *
		 * @param array $array a multidimensional array.
		 *
		 * @return array a simple array
		 */
		private function flatten( $array ) {
			$result = array();
			foreach ( $array as $element ) {
				if ( is_array( $element ) ) {
					array_push( $result, ...$this->flatten( $element ) );
				} else {
					$result[] = $element;
				}
			}
			return $result;
		}


		public function end_el( &$output, $item, $depth = 0, $args = array() ) {
			/* Nothing needed - just remove the existing output by doing nothing */
		}
		

	} /* Class */
	
} /* if */
