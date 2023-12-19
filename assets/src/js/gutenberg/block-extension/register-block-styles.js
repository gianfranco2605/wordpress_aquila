/**
 * Register Block Styles
 *
 */

import { registerBlockStyle, unregisterBlockStyle } from "@wordpress/blocks";
import { __ } from "@wordpress/i18n";

// Quote Block Styles
const layoutStyleQuote = [
  {
    name: "layout-dark-background",
    label: __("Layout style dark background", "aquila"),
  },
];

const layoutStyleButton = [
  {
    name: "layout-border-blue-fill",
    label: __("Blue outline", "aquila"),
  },
  {
    name: "layout-border-white-no-fill",
    label: __("White outline - to be use with dark background", "aquila"),
  },
];

const register = () => {
  // Register style for Quote block
  registerBlockStyle("core/quote", layoutStyleQuote);

  layoutStyleButton.forEach((layoutStyle) =>
    registerBlockStyle("core/button", layoutStyle)
  );
};

// unregister styles
const deregister = () => {
  unregisterBlockStyle(
    (blockname = "core/quote"),
    (styleVariationName = "large")
  );
};

// Register style on dom ready
wp.domReady(() => {
  register();
  deregister();
});
