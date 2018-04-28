<script>

    /* DOCUMENT READY FUNCTION */
    $(document).ready(function() {

        let eventType = $('#event_type_list');

        eventType.select2({
            multiple: true,
            maximumSelectionLength: 2,
            width: 'resolve',
            tags: true
        });

    });/* END - DOCUMENT READY FUNCTION */

</script>