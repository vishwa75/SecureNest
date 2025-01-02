
    <?= $this->extend('layout'); ?>

    <?= $this->section('maincontent'); ?>

    
            
    <?= $this->include('home/tabelAndCollectionCombo'); ?>

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