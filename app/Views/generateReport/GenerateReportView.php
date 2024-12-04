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
                sheets: [
                    {
                        name: 'Sheet1',
                        rows: {},
                    },
                ],
            });

            spreadsheet.change(function (data) {
                console.log("Spreadsheet data changed:", data);
            });

            $('#saveButton').click(function () {
                console.log("Full Save clicked.");
                const data = spreadsheet.getData();
                console.log("Full Data to Save:", data);
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
