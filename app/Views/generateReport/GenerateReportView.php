<section id="maincontent" class="w-full h-full overflow-y-auto">
    <div class="flex justify-center items-start mt-4">
        <button id='senda4'>
            submitA4
        </button>
    <div id="a4" class="h-[297mm] w-[210mm] overflow-auto rounded-md bg-white p-8 shadow-lg">
   
    <style>
        /* General Styles */
body {
    font-family: Arial, sans-serif;
    line-height: 1.5;
    color: #333;
}

/* Header Section */
.header-section {
    margin-bottom: 1.5rem;
    text-align: center;
}

.header-section h1 {
    font-size: 1.5rem;
    font-weight: bold;
    color: #1f2937; /* text-gray-800 */
}

.header-section p {
    font-size: 0.875rem;
    color: #6b7280; /* text-gray-600 */
}

/* Table Section */
.table-section {
    margin-bottom: 1.5rem;
}

.table-section h2 {
    font-size: 1.125rem;
    font-weight: 600;
    color: #374151; /* text-gray-700 */
    margin-bottom: 0.75rem;
}

.details-table {
    width: 100%;
    border-collapse: collapse;
}

.details-table thead {
    background-color: #e5e7eb; /* bg-gray-200 */
}

.details-table th, .details-table td {
    border-bottom: 1px solid #d1d5db; /* border-gray-300 */
    padding: 0.5rem;
    text-align: left;
}

.details-table tr:hover {
    background-color: #f3f4f6; /* hover:bg-gray-100 */
}

/* Form Section */
.form-section {
    margin-top: 1.5rem;
}

.form-section h2 {
    font-size: 1.125rem;
    font-weight: 600;
    color: #374151; /* text-gray-700 */
    margin-bottom: 0.75rem;
}

.form-group {
    margin-bottom: 1rem;
}

.form-group label {
    display: block;
    font-size: 0.875rem;
    font-weight: 500;
    color: #374151; /* text-gray-700 */
    margin-bottom: 0.25rem;
}

.form-group input, 
.form-group select {
    width: 100%;
    border: 1px solid #d1d5db; /* border-gray-300 */
    border-radius: 0.375rem; /* rounded-md */
    padding: 0.5rem;
    font-size: 0.875rem;
    outline: none;
}

.form-group input:focus,
.form-group select:focus {
    border-color: #60a5fa; /* blue-400 */
    box-shadow: 0 0 0 2px #bfdbfe; /* focus:ring-blue-200 */
}

    </style>

    <header class="header-section">
        <h1>Report Summary</h1>
        <p>Generated on: <?= date('Y-m-d') ?></p>
    </header>

    <!-- Table Section -->
    <section class="table-section">
        <h2>Details Overview</h2>
        <table class="details-table">
            <thead>
                <tr>
                    <th>Field</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Name</td>
                    <td>John Doe</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>johndoe@example.com</td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>Active</td>
                </tr>
            </tbody>
        </table>
    </section>

    <!-- Input Fields Section -->
    <section class="form-section">
        <h2>Add New Record</h2>
        <form>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
        </form>
    </section>


</div>

    </div>
</section>

<script>

$(document).ready(function() {
    $(document).on('click', '#senda4', function(e) {
        e.preventDefault(); // Prevent any default behavior

        // Clone the #a4 content to a new variable to modify it
        let gdata = $('#a4').clone();

        // Update the cloned content with the input values
        gdata.find('#name').replaceWith(`<span>${$('#name').val()}</span>`);
        gdata.find('#email').replaceWith(`<span>${$('#email').val()}</span>`);
        gdata.find('#status').replaceWith(`<span>${$('#status').find(":selected").text()}</span>`);

        // Convert the modified HTML content to a string
        let updatedHtml = gdata.html();

        // Send the updated HTML to the server
        $.ajax({
            url: '<?= base_url('generaterca') ?>',
            type: 'GET',
            data: {
                gdata: updatedHtml
            },
            success: function(response) {
                console.log('send success');
                alert('PDF generation started, the file will download shortly.');

                // Open the generated PDF in a new window (or download it directly)
                window.open('<?= base_url('generaterca') ?>?gdata=' + encodeURIComponent(updatedHtml), '_blank');
            },
            error: function() {
                console.error('Error generating PDF:');
                alert('Failed to generate PDF. Please try again.');
            }
        });
    });
});

</script>
