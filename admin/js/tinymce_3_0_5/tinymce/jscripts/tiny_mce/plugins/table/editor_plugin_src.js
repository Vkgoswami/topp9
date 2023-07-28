/**
 * editor_plugin_src.js
 *
 * Copyright 2009, Moxiecode Systems AB
 * Released under LGPL License.
 *
 * License: http://tinymce.moxiecode.com/license
 * Contributing: http://tinymce.moxiecode.com/contributing
 */

(function(tinymce) {
	var each = tinymce.each;

	// Checks if the selection/caret is at the start of the specified block element
	function isAtStart(rng, par) {
		var doc = par.ownerDocument, rng2 = doc.createRange(), elm;

		rng2.setStartBefore(par);
		rng2.setEnd(rng.endContainer, rng.endOffset);

		elm = doc.createElement('body');
		elm.appendChild(rng2.cloneContents());

		// Check for text characters of other elements that should be treated as content
		return elm.innerHTML.replace(/<(br|img|object|embed|input|textarea)[^>]*>/gi, '-').replace(/<[^>]+>/g, '').length == 0;
	};

	function getSpanVal(td, name) {
		return parseInt(td.getAttribute(name) || 1);
	}

	/**
	 * Table Grid class.
	 */
	function TableGrid(table, dom, selection) {
		var grid, startPos, endPos, selectedCell;

		buildGrid();
		selectedCell = dom.getParent(selection.getStart(), 'th,td');
		if (selectedCell) {
			startPos = getPos(selectedCell);
			endPos = findEndPos();
			selectedCell = getCell(startPos.x, startPos.y);
		}

		function cloneNode(node, children) {
			node = node.cloneNode(children);
			node.removeAttribute('id');

			return node;
		}

		function buildGrid() {
			var startY = 0;

			grid = [];

			each(['thead', 'tbody', 'tfoot'], function(part) {
				var rows = dom.select('> ' + part + ' tr', table);

				each(rows, function(tr, y) {
					y += startY;

					each(dom.select('> td, > th', tr), function(td, x) {
						var x2, y2, rowspan, colspan;

						// Skip over existing cells produced by rowspan
						if (grid[y]) {
							while (grid[y][x])
								x++;
						}

						// Get col/rowspan from cell
						rowspan = getSpanVal(td, 'rowspan');
						colspan = getSpanVal(td, 'colspan');

						// Fill out rowspan/colspan right and down
						for (y2 = y; y2 < y + rowspan; y2++) {
							if (!grid[y2])
								grid[y2] = [];

							for (x2 = x; x2 < x + colspan; x2++) {
								grid[y2][x2] = {
									part : part,
									real : y2 == y && x2 == x,
									elm : td,
									rowspan : rowspan,
									colspan : colspan
								};
							}
						}
					});
				});

				startY += rows.length;
			});
		};

		function getCell(x, y) {
			var row;

			row = grid[y];
			if (row)
				return row[x];
		};

		function setSpanVal(td, name, val) {
			if (td) {
				val = parseInt(val);

				if (val === 1)
					td.removeAttribute(name, 1);
				else
					td.setAttribute(name, val, 1);
			}
		}

		function isCellSelected(cell) {
			return cell && (dom.hasClass(cell.elm, 'mceSelected') || cell == selectedCell);
		};

		function getSelectedRows() {
			var rows = [];

			each(table.rows, function(row) {
				each(row.cells, function(cell) {
					if (dom.hasClass(cell, 'mceSelected') || cell == selectedCell.elm) {
						rows.push(row);
						return false;
					}
				});
			});

			return rows;
		};

		function deleteTable() {
			var rng = dom.createRng();

			rng.setStartAfter(table);
			rng.setEndAfter(table);

			selection.setRng(rng);

			dom.remove(table);
		};

		function cloneCell(cell) {
			var formatNode;

			// Clone formats
			tinymce.walk(cell, function(node) {
				var curNode;

				if (node.nodeType == 3) {
					each(dom.getParents(node.parentNode, null, cell).reverse(), function(node) {
						node = cloneNode(node, false);

						if (!formatNode)
							formatNode = curNode = node;
						else if (curNode)
							curNode.appendChild(node);

						curNode = node;
					});

					// Add something to the inner node
					if (curNode)
						curNode.innerHTML = tinymce.isIE ? '&nbsp;' : '<br data-mce-bogus="1" />';

					return false;
				}
			}, 'childNodes');

			cell = cloneNode(cell, false);
			setSpanVal(cell, 'rowSpan', 1);
			setSpanVal(cell, 'colSpan', 1);

			if (formatNode) {
				cell.appendChild(formatNode);
			} else {
				if (!tinymce.isIE)
					cell.innerHTML = '<br data-mce-bogus="1" />';
			}

			return cell;
		};

		function cleanup() {
			var rng = dom.createRng();

			// Empty rows
			each(dom.select('tr', table), function(tr) {
				if (tr.cells.length == 0)
					dom.remove(tr);
			});

			// Empty table
			if (dom.select('tr', table).length == 0) {
				rng.setStartAfter(table);
				rng.setEndAfter(table);
				selection.setRng(rng);
				dom.remove(table);
				return;
			}

			// Empty header/body/footer
			each(dom.select('thead,tbody,tfoot', table), function(part) {
				if (part.rows.length == 0)
					dom.remove(part);
			});

			// Restore selection to start position if it still exists
			buildGrid();

			// Restore the selection to the closest table position
			row = grid[Math.min(grid.length - 1, startPos.y)];
			if (row) {
				selection.select(row[Math.min(row.length - 1, startPos.x)].elm, true);
				selection.collapse(true);
			}
		};

		function fillLeftDown(x, y, rows, cols) {
			var tr, x2, r, c, cell;

			tr = grid[y][x].elm.parentNode;
			for (r = 1; r <= rows; r++) {
				tr = dom.getNext(tr, 'tr');

				if (tr) {
					// Loop left to find real cell
					for (x2 = x; x2 >= 0; x2--) {
						cell = grid[y + r][x2].elm;

						if (cell.parentNode == tr) {
							// Append clones after
							for (c = 1; c <= cols; c++)
								dom.insertAfter(cloneCell(cell), cell);

							break;
						}
					}

					if (x2 == -1) {
						// Insert nodes before first cell
						for (c = 1; c <= cols; c++)
					