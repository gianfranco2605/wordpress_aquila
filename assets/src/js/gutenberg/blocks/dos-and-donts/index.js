/**
 * WordPress dependencies
 */
import { registerBlockType } from "@wordpress/blocks";
import { __ } from "@wordpress/i18n";
import { InnerBlocks } from "@wordpress/block-editor";
import { PanelBody, RadioControl } from "@wordpress/components";
import Edit from "./edit";

// Register the block
registerBlockType("aquila-blocks/dos-and-donts", {
  title: __("Dos and Dont's", "aquila"),
  icon: "editor-table",
  description: __("Add heading and text", "aquila"),
  category: "aquila",
  edit: Edit,

  save() {
    return (
      <div className="aquila-dos-and-donts">
        <InnerBlocks.Content />
      </div>
    );
  },
});
