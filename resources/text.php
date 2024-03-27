
<table id="my-table">
        <thead>
            <!-- Resizable area -->
            <tr class="text-sm font-semibold">
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tbody>
            <tr class="text-sm transition-all hover:bg-gray-100">
                <td>John Doe</td>
                <td>Marketing Manager</td>
                <td>New York City</td>
                <td>$80,000</td>
            </tr>
            <tr class="text-sm transition-all hover:bg-gray-100">
                <td>Jane Smith</td>
                <td>Sales Associate</td>
                <td>Los Angeles</td>
                <td>$50,000</td>
            </tr>
            <tr class="text-sm transition-all hover:bg-gray-100">
                <td>Michael Johnson</td>
                <td>Accountant</td>
                <td>Chicago</td>
                <td>$70,000</td>
            </tr>
            <tr class="text-sm transition-all hover:bg-gray-100">
                <td>Sarah Williams</td>
                <td>Human Resources Manager</td>
                <td>Houston</td>
                <td>$90,000</td>
            </tr>
        </tbody>
    </table>
    <script type ="application/javascript">
        (function () {
    // Get the table and its rows
    var table = document.getElementById('my-table');
    var rows = table.rows;
    // Initialize the drag source element to null
    var dragSrcEl = null;

    // Loop through each row (skipping the first row which contains the table headers)
    for (var i = 1; i < rows.length; i++) {
        var row = rows[i];
        // Make each row draggable
        row.draggable = true;

        // Add an event listener for when the drag starts
        row.addEventListener('dragstart', function (e) {
            // Set the drag source element to the current row
            dragSrcEl = this;
            // Set the drag effect to "move"
            e.dataTransfer.effectAllowed = 'move';
            // Set the drag data to the outer HTML of the current row
            e.dataTransfer.setData('text/html', this.outerHTML);
            // Add a class to the current row to indicate it is being dragged
            this.classList.add('bg-gray-100');
        });

        // Add an event listener for when the drag ends
        row.addEventListener('dragend', function (e) {
            // Remove the class indicating the row is being dragged
            this.classList.remove('bg-gray-100');
            // Remove the border classes from all table rows
            table.querySelectorAll('.border-t-2', '.border-blue-300').forEach(function (el) {
                el.classList.remove('border-t-2', 'border-blue-300');
            });
        });

        // Add an event listener for when the dragged row is over another row
        row.addEventListener('dragover', function (e) {
            // Prevent the default dragover behavior
            e.preventDefault();
            // Add border classes to the current row to indicate it is a drop target
            this.classList.add('border-t-2', 'border-blue-300');
        });

        // Add an event listener for when the dragged row enters another row
        row.addEventListener('dragenter', function (e) {
            // Prevent the default dragenter behavior
            e.preventDefault();
            // Add border classes to the current row to indicate it is a drop target
            this.classList.add('border-t-2', 'border-blue-300');
        });

        // Add an event listener for when the dragged row leaves another row
        row.addEventListener('dragleave', function (e) {
            // Remove the border classes from the current row
            this.classList.remove('border-t-2', 'border-blue-300');
        });

        // Add an event listener for when the dragged row is dropped onto another row
        row.addEventListener('drop', function (e) {
            // Prevent the default drop behavior
            e.preventDefault();
            // If the drag source element is not the current row
            if (dragSrcEl != this) {
                // Get the index of the drag source element
                var sourceIndex = dragSrcEl.rowIndex;
                // Get the index of the target row
                var targetIndex = this.rowIndex;
                // If the source index is less than the target index
                if (sourceIndex < targetIndex) {
                    // Insert the drag source element after the target row
                    table.tBodies[0].insertBefore(dragSrcEl, this.nextSibling);
                } else {
                    // Insert the drag source element before the target row
                    table.tBodies[0].insertBefore(dragSrcEl, this);
                }
            }
            // Remove the border classes from all table rows
            table.querySelectorAll('.border-t-2', '.border-blue-300').forEach(function (el) {
              el.classList.remove('border-t-2', 'border-blue-300');
                });
            });
        }
})();
    </script>