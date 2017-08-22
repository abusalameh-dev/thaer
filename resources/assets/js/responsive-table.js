// Start with the IIFE pattern
(function(document, window) {

  // UTIL
  // Our super light seletor, kind of like jQuery without all the extra
  // sugar and utilities
  var $ = function(selector, context) {
      if (typeof context == 'undefined')
        context = document;

      return context.querySelectorAll(selector);
    },
    toTitleCase = function(str) {
      return str.replace(/\w\S*/g, function(txt) {
        return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
      });
    };

  // Responsive tables
  var tables = $('table.responsive');

  // no need to continue if we have no tables.
  if (tables.length == 0) {
    return false;
  }

  // go through each table using a for loop
  for (var i = 0; i < tables.length; i++) {

    // we will use this later to add labels to each cell since we're going
    // to hide the headings on smaller devices and use the added label
    // instead. This will be hidden on bigger devices
    var headings = $('thead th', tables[i]);

    // here we capture every row in the body in order to loop through each
    // and go through each cell to add the labels
    var rows = $('tbody tr', tables[i]);

    // now lets go through each row using a for loop
    for (var r = 0; r < rows.length; r++) {
      var cells = $('td', rows[r]);

      // now lets go through every cell using a for loop.
      // here we're going to use the index to pull the label from the 
      // headings array we set earlier.
      for (var c = 0; c < cells.length; c++) {
        // We capture the original text of the cell for later use as
        // well as create a new empty string to append the new html
        // to later
        var originalText = cells[c].innerText,
          newHtml = '';

        // Here we create the html string for the label. We take the label
        // text from the headings using the index from this for loop since
        // they're in the same order.
        newHtml += '<span class="label">' + toTitleCase(headings[c].innerText) + ':</span>';

        // Then we wrap the original text in a span for styling.
        newHtml += '<span class="value">' + originalText + '</span>';

        // finally, we replace the html from the cell with our new string.
        cells[c].innerHTML = newHtml;
      }
    }
  }

})(document, window);