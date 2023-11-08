/**
 * Registers a new block provided a unique name and an object defining its behavior.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 */
import { registerBlockType } from '@wordpress/blocks';

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * All files containing `style` keyword are bundled together. The code used
 * gets applied both to the front of your site and to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './style.scss';

/**
 * Internal dependencies
 */
import Edit from './edit';
import save from './save';
import metadata from './block.json';

/**
 * Every block starts by registering a new block type definition.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 */
registerBlockType(metadata.name, {
	/**
	 * @see ./edit.js
	 */
	edit: Edit,
	icon: {
		src: <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
		<path d="M8.4 42c-.6 0-1-.4-1-1V10.9c0-.6.4-1 1-1h8.1c.4 0 .9.2 1.2.5L29.3 25c.4.5.4 1.3 0 1.9L17.6 41.5c-.3.4-.8.6-1.3.6L8.4 42z"/>
		<path d="M44.3 25 32.6 10.5c-.5-.6-1.4-.8-2.1-.2l-2.3 1.9c-.7.5-.8 1.5-.2 2.1L37.5 26 28 37.8c-.5.6-.4 1.6.2 2.1l2.3 1.9c.7.5 1.5.4 2.1-.2L44.3 27c.4-.8.4-1.5 0-2z"/>
	  </svg>
	},

	/**
	 * @see ./save.js
	 */
	save,
});
