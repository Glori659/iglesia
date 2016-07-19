<!-- DataTables JavaScript -->
{{ HTML::script('assets/js/plugins/datatables/media/js/jquery.dataTables.min.js') }}
{{ HTML::script('assets/js/dataTables.bootstrap.min.js') }}
<script>
$(document).ready(function() {
    $('#dataTables-example').DataTable({
            responsive: true,
            "order": [[ 1, "desc" ]]
    });
});
</script>