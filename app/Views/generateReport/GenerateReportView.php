<section id="maincontent" class="w-full h-full overflow-y-auto flex justify-center flex-col items-center">
    <link rel="stylesheet" href="<?= base_url() ?>css/xspreadsheet.css">
    
    

    <div id="x-spreadsheet-demo"></div>
    
    <div class="mt-4 flex space-x-4">
        <button id="saveButton" class="px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-700 focus:outline-none">Save</button>
        <button id="partialSaveButton" class="px-2 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-700 focus:outline-none">Partial Save</button>
        <button id="exportButton" class="px-2 py-1 bg-green-500 text-white rounded hover:bg-green-700 focus:outline-none">Export as Excel</button>
    </div>
    <script src="<?= base_url() ?>js/xspreadsheet.js"></script>
    <script src="<?= base_url() ?>js/xlsxspread.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

<script>

    var sheetData = `<?= $sheetData ?>`;
    var parsedObject = JSON.parse(sheetData); 
    var parsedData = parsedObject.data;



    $(document).ready(function () {
        
    

        try {
            const spreadsheet = x_spreadsheet('#x-spreadsheet-demo', {
                mode: 'edit', 
                showToolbar: true,
                showGrid: true, 
                showContextmenu: true,
                view: {
                    height: () => $('#maincontent').height() - 55,
                    width: () => $('#maincontent').width(),
                },
                row: {
                    len: 100, 
                    height: 25, 
                },
                col: {
                    len: 26, 
                    width: 100,
                    indexWidth: 60,
                    minWidth: 60, 
                },
                style: {
                    bgcolor: '#ffffff', 
                    align: 'left', 
                    valign: 'middle', 
                    textwrap: false,
                    strike: false,
                    underline: false,
                    color: '#0a0a0a',
                    font: {
                        name: 'Helvetica',
                        size: 10,
                        bold: false,
                        italic: false,
                    },
                },
            });

            
            spreadsheet.loadData(parsedData);

            // spreadsheet.change(function (data) {
            //     console.log("Spreadsheet data changed:", data);
            // });

            


            $('#saveButton').click(function (e) {
                e.preventDefault(); // Prevent default form submission behavior
                console.log("Full Save clicked.");

                const sheetData = spreadsheet.getData(); // Collect data from the spreadsheet
                console.log("Full Data to Save:", sheetData); // Log the collected data for debugging

                $.ajax({
                    url: '<?= base_url('savesheet') ?>', // Update to your backend endpoint
                    type: 'POST',
                     contentType: 'application/json', // Specify content type as JSON
                    data: JSON.stringify({ data: sheetData }), // Convert data to JSON string
                   
                    success: function (response) {
                        console.log('Save Successfully', response); // Log the success response
                        alert('Sheet Save Successfully');
                    },
                    error: function (xhr, status, error) {
                        console.error('Error saving data:', error); // Log the error for debugging
                        alert('Failed to save data. Please try again.');
                    }
                });
            });


            $('#partialSaveButton').click(function () {
                console.log("Partial Save clicked.");
                const partialData = spreadsheet.getData();
                console.log("Partial Data to Save:", partialData);
            });

            $('#exportButton').click(function (e) {
                e.preventDefault();
                console.log("Export as Excel clicked.");
                console.log(spreadsheet.getData());
                const sheetData1 = spreadsheet.getData();
                const workbook = xtos([sheetData1]);
                XLSX.writeFile(workbook, 'spreadsheet_data.xlsx');
            });

        } catch (error) {
            console.error("Spreadsheet initialization failed:", error);
        }
    });
</script>

</section>


