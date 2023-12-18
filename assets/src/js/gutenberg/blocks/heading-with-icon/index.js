/**
 * WordPress dependencies
 */
import { registerBlockType } from "@wordpress/blocks";
import { __ } from "@wordpress/i18n";
import { RichText } from "@wordpress/block-editor";
import { PanelBody, RadioControl } from "@wordpress/components";
import Edit from "./edit";
import { getIconComponent } from "./icons-map";

// Register the block
registerBlockType( "aquila-blocks/heading", {
	title: __( "Heading with Icon" ),
	icon: "admin-appearance",
	description: __( "Add heading and select icon", "aquila" ),
	category: "aquila",
	attributes: {
		option: {
			type: "string",
			default: "dos",
		},
		content: {
			type: "string",
			source: "html",
			selector: "h3",
			// default value
			default: __( "Dos", "aquila" ),
		},
	},
	edit: Edit,
	save( props ) {
		const {
			attributes: { option, content },
		} = props;
		console.log( "Edit component re-rendered. Option:", option );
		const HeadingIcon = getIconComponent( option );

		return (
			<div className="aquila-icon-heading">
				<span className="aquila-icon-heading__heading">
					<HeadingIcon />
				</span>
				{/* Saves <h2>Content added in the editor...</h2> to the database for frontend display */}
				<RichText.Content tagName="h3" value={content} />
			</div>
		);
	},
} );
