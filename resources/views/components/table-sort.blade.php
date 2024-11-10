<script>
    // sort table in ascending or descending order
    function sortTable(columnIndex, tableId) {
        var table, rows, switching, i, x, y, shouldSwitch, dir, switchCount = 0;
        table = document.querySelector(tableId);
        switching = true;
        dir = "asc";

        while (switching) {
            switching = false;
            rows = table.rows;

            for (i = 1; i < (rows.length - 1); i++) {
                shouldSwitch = false;
                x = rows[i].getElementsByTagName("td")[columnIndex];
                y = rows[i + 1].getElementsByTagName("td")[columnIndex];

                if (columnIndex === 0) { // separately handle datetime sorting
                    // parse dates into JavaScript Date objects
                    let dateX = new Date(x.innerHTML);
                    let dateY = new Date(y.innerHTML);

                    if (dir == "asc") {
                        if (dateX > dateY) {
                            shouldSwitch = true;
                            break;
                        }
                    } else if (dir == "desc") {
                        if (dateX < dateY) {
                            shouldSwitch = true;
                            break;
                        }
                    }
                } else if (Number.isInteger(parseInt(x.innerHTML)) && Number.isInteger(parseInt(y.innerHTML))) {
                    // sort numerically
                    if (dir == "asc") {
                        if (parseInt(x.innerHTML) > parseInt(y.innerHTML)) {
                            shouldSwitch = true;
                            break;
                        }
                    } else if (dir == "desc") {
                        if (parseInt(x.innerHTML) < parseInt(y.innerHTML)) {
                            shouldSwitch = true;
                            break;
                        }
                    }
                } else {
                    // sort alphabetically
                    if (dir == "asc") {
                        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                            shouldSwitch = true;
                            break;
                        }
                    } else if (dir == "desc") {
                        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                            shouldSwitch = true;
                            break;
                        }
                    }
                }
            }

            if (shouldSwitch) {
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
                switchCount++;
            } else {
                if (switchCount == 0 && dir == "asc") {
                    dir = "desc";
                    switching = true;
                }
            }
        }

        // Reset visual indicators
        resetSortingIndicators();

        // Set visual indicator for the current column
        let header = table.rows[0].getElementsByTagName("th")[columnIndex];
        if (dir == "asc") {
            indicator = ' ▲';
        } else if (dir == "desc") {
            indicator = ' ▼';
        }
        header.innerHTML += indicator;
    }

    function resetSortingIndicators() {
        let headers = document.getElementsByTagName("th");
        for (let i = 0; i < headers.length; i++) {
            headers[i].innerHTML = headers[i].innerHTML.split(" ")[0]; // Remove existing indicators
        }
    }
</script>
