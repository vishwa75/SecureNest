    <?= $this->extend('layout'); ?>

    <?= $this->section('maincontent'); ?>

    <div id="overlay" class="fixed z-20 w-full h-full top-0 left-0 bg-gray-300 hidden" 
        style="background-color: rgba(128, 128, 128, 0.5);">
        <div class="h-auto w-1/2 bg-gray-400 p-6 rounded-lg shadow-lg">
            <div class="w-full flex flex-col">
                <form id="collectionForm">

                    <div class="mb-4">
                        <label for="clientID" class="block text-sm font-medium text-gray-700 mb-1">Client ID</label>
                        <input type="text" id="clientID" name="clientID" required
                            class="w-full border border-gray-300 p-2 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    </div>
                    
                    <!-- Name Field -->
                    <div class="mb-4">
                        <label for="collectionName" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                        <input type="text" id="collectionName" name="collectionName" required
                            class="w-full border border-gray-300 p-2 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    </div>

                    <!-- Description Field -->
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <textarea id="description" name="collectionDescription" rows="4"
                            class="w-full border border-gray-300 p-2 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none"></textarea>
                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-around items-center">
                        <button id="addclose"
                            class="w-1/6 bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600 transition">
                            Close
                        </button>
                        <button id="collectionSubmit"
                            class="w-1/6 bg-green-500 text-white p-2 rounded-md hover:bg-green-600 transition">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

                <div class="flex h-full space-x-2">
                    <!-- Collection-->
                    <?= $this->include('home/collectionListView'); ?>
                    <!-- Tables -->
                    <?= $this->include('home/tableContentView'); ?>
                </div>

    <script>
        $(document).ready(function() {
            
            // Event delegation for dynamically added elements
            $(document).on('click', '.moreClick', function() {
                var toggleRowId = $(this).data('toggle'); // Get the row ID
                console.log('toggleRowId ---> ' + toggleRowId);
                var toggleRow = $('#' + toggleRowId); // Select the row by ID
                
                // Toggle the visibility of the row
                toggleRow.toggle();
                $(this).toggleClass('text-green-500');
            });

            $(document).on('click', '#addCollection', function() {
                $('#overlay').removeClass('hidden');
                $('#overlay').addClass('flex items-center justify-center');
            });

            $(document).on('click', '#addclose', function() {
                $('#overlay').removeClass('flex items-center justify-center');
                $('#overlay').addClass('hidden');
            });

            $(document).on('click', '#collectionSubmit', function(e) {
                e.preventDefault();
                const serializedData = $('#collectionForm').serialize();
            
                $.ajax({
                    url: '<?= base_url('savecollection') ?>',
                    type: 'POST',
                    data: serializedData,
                    success: function(response) {
                        // Close the overlay and reset the form
                        $('#overlay').removeClass('flex items-center justify-center').addClass('hidden');
                        $('#collectionForm')[0].reset();

                        // Update the collection list with the new data
                        $('#collectionListContainer').replaceWith(response); // Assuming you have a container with this ID for the collection list
                    },
                    error: function(xhr, status, error) {
                        console.error('Error saving data:', error);
                        alert('Failed to save data. Please try again.');
                    }
                });
            });

            $(document).on('click', '.getDataForCollection', function(e) {
                var ClientID = $(this).closest('.getDataForCollection').data('clientid');
                
                $.ajax({
                    url: '<?= base_url('getclientdatabyclientid') ?>',
                    type: 'GET',
                    data: {
                        clientID: ClientID
                    },
                    success: function(response){
                        $('#tableContentview').replaceWith(response);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error saving data:', error);
                        alert('Failed to get the for ClientID');
                    }
                })

            });

        });
    </script>

                    
    <?= $this->endSection(); ?>
