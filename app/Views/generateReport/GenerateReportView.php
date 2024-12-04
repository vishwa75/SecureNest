<section id="maincontent" class="w-full h-full overflow-y-auto flex justify-center flex-col items-center">
    <link rel="stylesheet" href="<?= base_url() ?>css/xspreadsheet.css">
    <div id="x-spreadsheet-demo"></div>
    
    <div class="mt-4 flex space-x-4">
        <button id="saveButton" class="px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-700 focus:outline-none">Save</button>
        <button id="partialSaveButton" class="px-2 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-700 focus:outline-none">Partial Save</button>
    </div>


</section>

<script src="<?= base_url() ?>js/xspreadsheet.js"></script>
<script>
    $(document).ready(function () {
        
        const sheetData = <?php echo json_encode($sheetData); ?>;
    console.log(sheetData);

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

            
            spreadsheet.loadData({
                "name":"sheet2","freeze":"A1","styles":[{"align":"center"},{"align":"center","valign":"middle"},{"align":"center","valign":"middle","font":{"bold":true}},{"bgcolor":"#2e75b5"},{"bgcolor":"#2e75b5","font":{"bold":true}},{"font":{"bold":true}},{"bgcolor":"#2e75b5","font":{"bold":true,"size":16}},{"font":{"bold":true,"size":16}},{"bgcolor":"#2e75b5","font":{"bold":true,"size":16},"color":"#ffffff"},{"font":{"bold":true,"size":16},"color":"#ffffff"},{"bgcolor":"#2e75b5","align":"center"},{"bgcolor":"#2e75b5","font":{"bold":true,"size":16},"color":"#ffffff","align":"center"},{"font":{"bold":true,"size":16},"color":"#ffffff","align":"center"},{"bgcolor":"#2e75b5","align":"center","color":"#ffffff"},{"align":"center","color":"#ffffff"},{"bgcolor":"#2e75b5","color":"#ffffff"},{"color":"#ffffff"}],"merges":["A1:A2","B1:J2","A3:B3","C3:E3","H3:J3","A4:B4","C4:E4","H4:J4","A5:B5","A6:B6","C5:E5","C6:E6","F5:G5","F6:G6","H5:J5","H6:J6","F3:G4","A7:J7","A8:J8","A9:J9","A10:J10","A11:J11","A12:J12","A13:J13"],"rows":{"0":{"cells":{"0":{"merge":[1,0],"style":2,"text":"LOGO"},"1":{"style":11,"merge":[1,8],"text":"SUNOIDA ROOT CAUSE ANALYSIS (RCA) REPORT"}}},"1":{"cells":{"0":{"style":2}}},"2":{"cells":{"0":{"merge":[0,1],"text":"RCA Number","style":0},"1":{"style":0},"2":{"merge":[0,2]},"5":{"merge":[1,1],"text":"Team Members","style":0},"6":{"style":0},"7":{"merge":[0,2]}}},"3":{"cells":{"0":{"merge":[0,1],"text":"Product Name","style":0},"1":{"style":0},"2":{"merge":[0,2]},"5":{"style":0},"6":{"style":0},"7":{"merge":[0,2]}}},"4":{"cells":{"0":{"merge":[0,1],"text":"Module Name","style":0},"1":{"style":0},"2":{"merge":[0,2]},"5":{"merge":[0,1],"text":"Verified By","style":0},"6":{"style":0},"7":{"merge":[0,2]}}},"5":{"cells":{"0":{"merge":[0,1],"text":"Date & Time Ticket Raised","style":0},"1":{"style":0},"2":{"merge":[0,2]},"5":{"merge":[0,1],"text":"Approved By","style":0},"6":{"style":0},"7":{"merge":[0,2]}}},"6":{"cells":{"0":{"style":13,"merge":[0,9],"text":"EXPLAIN THE PROBLEM"},"1":{"style":14},"2":{"style":14},"3":{"style":14},"4":{"style":14},"5":{"style":14},"6":{"style":14},"7":{"style":14},"8":{"style":14},"9":{"style":14}}},"7":{"cells":{"0":{"merge":[0,9]}}},"8":{"cells":{"0":{"merge":[0,9]}}},"9":{"cells":{"0":{"merge":[0,9]}}},"10":{"cells":{"0":{"merge":[0,9]}}},"11":{"cells":{"0":{"merge":[0,9]}}},"12":{"cells":{"0":{"merge":[0,9]}}},"len":100},"cols":{"len":26},"validations":[],"autofilter":{}
            });

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

        } catch (error) {
            console.error("Spreadsheet initialization failed:", error);
        }
    });
</script>
