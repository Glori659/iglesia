/*alert($("#country_id").val());
alert($("#state_id").val());
alert($("#municipality_id").val());
alert($("#parish_id").val());*/

$("#country_id").each(function() {
    //Extraigo el valor del select que cambio
    var select = this.value;
    if(select!=''){
        selectCountry(select);
    }
   
});
$("#country_id").change(function() {
    //Extraigo el valor del select que cambio
    var select = this.value;
    selectCountry(select);
});

function selectCountry(select){
    //contruyo la url
    url=$urlStates+'/'+select;
    //funcion selectId y get
    get(url,selectId('#state_id'));
}


$("#state_id").change(function() {
    var select = this.value;
    url=$urlCities+'/'+select;
    get(url,selectId('#city_id'));
    url=$urlMunicipalities+'/'+select;
    get(url,selectId('#municipality_id'));
    selectId('#parish_id');
});

$("#municipality_id").change(function() {
    var select = this.value;
    url=$urlParishes+'/'+select;
    get(url,selectId('#parish_id'));
});

$("#parish_id").change(function() {
    $('#type_address').removeAttr("disabled");
    $('#address').removeAttr("disabled");
});


function selectId(id){
    $(id).select2('data',null);
    $(id).removeAttr("disabled");
    //Retorno el id para funtion get
    return id;
};
function resetInput(id){
    $(id).select2('data',null);
    $(id).val('');
    $(id).attr('disabled','disabled');
};

//se debe globalizar estos metodos para aplicarlos en formularios a futuro ejemplo get.js post.js  del lado client
//ajax get general
function get(url,select,selected){

    $.ajax({
        url: url,
        type: 'GET',
        success: function (data) {
            $(select).html(data_select)
            var data_select = '<option value=""></option>';      
            for(datos in data.record){
                data_select += '<option value="'+data.record[datos].id+'">'+ data.record[datos].name + '</option>';
            };
            $(select).html(data_select);
            if (selected!=null) {
                $(select).select2('val',selected);
            };
        }
    });

}
