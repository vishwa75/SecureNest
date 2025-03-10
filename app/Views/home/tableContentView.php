<div id="tableContentview" class="w-full h-full overflow-auto p-1 space-y-4">

<div 
  id="overlayAddEntry" 
  class="fixed inset-0 z-20 items-center justify-center bg-gray-500 bg-opacity-50 hidden">
  
  <div class="w-1/2 bg-gray-100 p-6 rounded-lg shadow-lg">
    <div class="flex flex-col w-full">
      <form id="recordForm" class="space-y-6">

        <!-- Dropdown Field -->
        <div class="mb-4">
          <label for="catagory" class="block text-sm font-medium text-gray-700 mb-2">
            Record catagory
          </label>
          <select 
            name="catagory" 
            id="catagorydropdown" 
            class="w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
            <option value="Server">Server</option>
            <option value="Service">Service</option><option value="Connectivity">Connectivity</option>
          </select>
        </div>

        <!-- Buttons -->
        <div class="flex justify-around items-center">
          <button 
            id="recordclose"
            type="button"
            class="w-1/4 bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 transition duration-200">
            Close
          </button>
          <button 
            id="addNewRecordRecord"
            type="submit"
            class="w-1/4 bg-green-500 text-white py-2 rounded-md hover:bg-green-600 transition duration-200">
            Submit
          </button>
        </div>

      </form>
    </div>
  </div>
</div>


    <!-- Server Section -->
    <div>
        <div class="h-5 w-full flex flex-row justify-between items-center text-center py-2 font-semibold">
            <div class="ml-3">Service</div>
            <div class="mr-3">Add +</div>
        </div>
        <div class="overflow-x-auto">
            <table class="table-auto w-full text-left border-collapse">
                <thead class="bg-gray-200 sticky top-0 z-10">
                    <tr class="text-center font-medium text-sm">
                        <?php foreach ($serverDetailsTableHeader as $header): ?>
                            <th class="border-b border-gray-300"><?= htmlspecialchars($header) ?></th>
                        <?php endforeach; ?>
                        <th class="border-b border-gray-300">More</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($serverDetailsTableHeaderData as $index => $data): ?>
                        <tr class="bg-white text-center text-sm">
                            <?php foreach ($serverDetailsTableHeader as $header): ?>
                                <td class="border-b border-gray-300">
                                    <input 
                                        type="text" 
                                        name="<?= htmlspecialchars($header) ?>[]" 
                                        value="<?= htmlspecialchars($data[$header]) ?>" 
                                        class="w-full text-sm text-center"
                                    >
                                </td>
                            <?php endforeach; ?>
                            <td class="border-b border-gray-300 hover:bg-gray-400">
                                <i class="material-icons cursor-pointer moreClick mx-1" data-toggle="toggle-server-row-<?= $index ?>">read_more</i>
                            </td>
                        </tr>
                        <tr id="toggle-server-row-<?= $index ?>" class="toggle-row bg-white" style="display: none;">
                            <td colspan="<?= count($serverDetailsTableHeader) + 1 ?>">
                                <div class="w-full bg-gray-200 grid grid-cols-2 border-2">
                                    <?php foreach ($serverDetailsTableMore as $header): ?>
                                        <div class="grid grid-cols-3 items-center justify-center">
                                            <div class="ml-5 font-semibold text-start"><?= htmlspecialchars($header) ?></div>
                                            <div class="text-center">:</div>
                                            <div class="text-start w-full">
                                                <input 
                                                    type="text" 
                                                    name="<?= htmlspecialchars($header) ?>[]" 
                                                    value="<?= htmlspecialchars($serverDetailsTableMoreData[$index][$header]) ?>" 
                                                    class="w-full text-sm text-left border border-gray-300 rounded-md p-2"
                                                >
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Service Section -->
    <div>
        <div class="h-5 w-full flex flex-row justify-between items-center text-center py-2 font-semibold">
            <div class="ml-3">Service</div>
            <div class="mr-3">Add +</div>
        </div>
        <div class="overflow-x-auto">
            <table class="table-auto w-full text-left border-collapse">
                <thead class="bg-gray-200 sticky top-0 z-10">
                    <tr class="text-center font-medium text-sm">
                        <?php foreach ($serviceDetailsTableHeader as $header): ?>
                            <th class="border-b border-gray-300"><?= htmlspecialchars($header) ?></th>
                        <?php endforeach; ?>
                        <th class="border-b border-gray-300">More</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($serviceDetailsTableHeaderData as $index => $data): ?>
                        <tr class="bg-white text-center text-sm">
                            <?php foreach ($serviceDetailsTableHeader as $header): ?>
                                <td class="border-b border-gray-300">
                                    <input 
                                        type="text" 
                                        name="<?= htmlspecialchars($header) ?>[]" 
                                        value="<?= htmlspecialchars($data[$header]) ?>" 
                                        class="w-full text-sm text-center"
                                    >
                                </td>
                            <?php endforeach; ?>
                            <td class="border-b border-gray-300 hover:bg-gray-400">
                                <i class="material-icons cursor-pointer moreClick mx-1" data-toggle="toggle-row-<?= $index ?>">read_more</i>
                            </td>
                        </tr>
                        <tr id="toggle-row-<?= $index ?>" class="toggle-row bg-white" style="display: none;">
                            <td colspan="<?= count($serviceDetailsTableHeader) + 1 ?>">
                                <div class="w-full bg-gray-200 grid grid-cols-2 border-2">
                                    <?php foreach ($serviceDetailsTableMore as $header): ?>
                                        <div class="grid grid-cols-3 items-center justify-center">
                                            <div class="ml-5 font-semibold text-start"><?= htmlspecialchars($header) ?></div>
                                            <div class="text-center">:</div>
                                            <div class="text-start w-full">
                                                <input 
                                                    type="text" 
                                                    name="<?= htmlspecialchars($header) ?>[]" 
                                                    value="<?= htmlspecialchars($serviceDetailsTableMoreData[$index][$header]) ?>" 
                                                    class="w-full text-sm text-left border border-gray-300 rounded-md p-2"
                                                >
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Connectivity Section -->
    <div>
        <div class="h-5 w-full flex flex-row justify-between items-center text-center py-2 font-semibold">
            <div class="ml-3">Service</div>
            <div class="mr-3">Add +</div>
        </div>
        <div class="overflow-x-auto">
            <table class="table-auto w-full text-left border-collapse">
                <thead class="bg-gray-200 sticky top-0 z-10">
                    <tr class="text-center font-medium text-sm">
                        <?php foreach ($connectivityDetailsHeader as $header): ?>
                            <th class="border-b border-gray-300"><?= htmlspecialchars($header) ?></th>
                        <?php endforeach; ?>
                        <th class="border-b border-gray-300">More</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($connectivityDetailsHeaderData as $index => $data): ?>
                        <tr class="bg-white text-center text-sm">
                            <?php foreach ($connectivityDetailsHeader as $header): ?>
                                <td class="border-b border-gray-300">
                                    <input 
                                        type="text" 
                                        name="<?= htmlspecialchars($header) ?>[]" 
                                        value="<?= htmlspecialchars($data[$header]) ?>" 
                                        class="w-full text-sm text-center"
                                    >
                                </td>
                            <?php endforeach; ?>
                            <td class="border-b border-gray-300 hover:bg-gray-400">
                                <i class="material-icons cursor-pointer moreClick mx-1" data-toggle="toggle-connection-row-<?= $index ?>">read_more</i>
                            </td>
                        </tr>
                        <tr id="toggle-connection-row-<?= $index ?>" class="toggle-row bg-white" style="display: none;">
                            <td colspan="<?= count($connectivityDetailsHeader) + 1 ?>">
                                <div class="w-full bg-gray-200 grid grid-cols-2 border-2">
                                    <?php foreach ($connectivityDetailsMore as $header): ?>
                                        <div class="grid grid-cols-3 items-center justify-center">
                                            <div class="ml-5 font-semibold text-start"><?= htmlspecialchars($header) ?></div>
                                            <div class="text-center">:</div>
                                            <div class="text-start w-full">
                                                <input 
                                                    type="text" 
                                                    name="<?= htmlspecialchars($header) ?>[]" 
                                                    value="<?= htmlspecialchars($connectivityDetailsMoreData[$index][$header]) ?>" 
                                                    class="w-full text-sm text-left border border-gray-300 rounded-md p-2"
                                                >
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>


    <script>

$(document).on('click', '#addNewRecord', function() {
                $('#overlayAddEntry').removeClass('hidden');
                $('#overlayAddEntry').addClass('flex items-center justify-center');
            });

            $(document).on('click', '#recordclose', function() {
                $('#overlayAddEntry').removeClass('flex items-center justify-center');
                $('#overlayAddEntry').addClass('hidden');
            });

            $(document).on('click', '#addNewRecordRecord', function(e) {
                e.preventDefault();
                const serializedData = $('#recordForm').serialize();
            
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

            $(document).on('change', '#catagorydropdown', function() {
                console.log("Dropdown value changed");
            });

    </script>

</div>
