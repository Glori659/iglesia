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
</script>
{{ HTML::script('assets/js/address.js') }}