{{ HTML::script('assets/js/plugins/select2/select2.js') }}
<script type="text/javascript">
    $urlStates           ="{{ url('states') }}";
    $urlCities           ="{{ url('cities') }}";
    $urlMunicipalities   ="{{ url('municipalities') }}";
    $urlParishes         ="{{ url('parishes') }}";
        $(".select-select2").select2();
        $('.datepicker').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd"

        });
        $("#status").on("click", function(){
			$("#date_baptisms").prop('disabled', true);
		});
		$("#status-true").on("click", function(){
			$("#date_baptisms").prop('disabled', false);
		});
</script>
{{ HTML::script('assets/js/address.js') }}