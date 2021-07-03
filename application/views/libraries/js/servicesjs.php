
<script src="<?=base_url('resources/assets/js/jquery-SerializeJSON.js');?>"></script>
<script type="application/javascript">
    //apiUrl = "http://iswupsrj.ddns.net/apiprojectmanagement/";
    function _postRequest(_endPoint,method, _dataForm,_containerData){
        clearValidations(_containerData);
         return $.ajax({
            url : _endPoint,
            method : method,
            data : JSON.stringify(_dataForm),
             headers :{
                'X-API-KEY':'QWERTY'
            },
            contentType: "application/json; charset=UTF-8",
            success : function(response){
                if(response.status==="success"){
                    displayToastr("success","<?=$this->lang->line('toastr_info_message');?>",response.message);
                }else if(response.status==="error"){
                    displayToastr("error","<?=$this->lang->line('error_title_message');?>",response.message);

                    if(response.validations!=null){
                        $.each(response.validations.message, function(key, value) {
                            let property =  $(document).find('#'+_containerData).find('input[name="'+key+'"],select[name="'+key+'"]').addClass('is-invalid');
                            property.closest('.form-group').addClass('has-danger');
                            if(property.prop('tagName')==="INPUT"){
                                property.after("<small class='invalid-feedback'>"+value+"</small>");
                            }else if(property.prop('tagName')==="SELECT"){
                                property.next('span').after("<small class='invalid-feedback'>"+value+"</small>");
                            }

                        });

                    }

                }

            },error: function (jqXHR, textStatus,errorThrown) {
                let response = jqXHR.responseJSON;
                if(response.status==="error"){
                    displayToastr("error","<?=$this->lang->line('error_title_message');?>",response.message);
                    if(response.validations!=null){
                        $.each(response.validations, function(key, value) {
                            let property =  $(document).find('#'+_containerData).find('input[name="'+key+'"],select[name="'+key+'"]').addClass('is-invalid');
                            property.closest('.form-group').addClass('has-danger');
                            if(property.prop('tagName')==="INPUT"){
                                property.after("<small class='invalid-feedback'>"+value+"</small>");
                            }else if(property.prop('tagName')==="SELECT"){
                                property.next('span').after("<small class='invalid-feedback'>"+value+"</small>");
                            }

                        });

                    }

                }
            }
        });
    }

    function _getRequest(_endPoint,_jsonData){
        return $.ajax({
            url : apiUrl+_endPoint,
            method : "GET",
            data : _jsonData,
            contentType: "application/json; charset=UTF-8",
            success : function(response){
                if(response.status==="error"){
                    displayToastr("error","<?=$this->lang->line('error_title_message');?>",response.message);

                }

            },error: function (jqXHR) {
                let response = jqXHR.responseJSON;
                if(response.status==="error"){
                    displayToastr("error","<?=$this->lang->line('error_title_message');?>",response.message);
                }
            }
        });
    }
    function _convertFormDataToJSON(_formId){
        let json = $(document).find('#'+_formId).serializeJSON({
            useIntKeysAsArrayIndex: true
        });
        return json;
    }
    function clearValidations(_idForm){
        let  _inputs = $(document).find('#'+_idForm).find('input,select,textarea');
        $(document).find('#'+_idForm).find('.invalid-feedback').remove();
        $.each(_inputs,function(){
           $(this).removeClass('is-invalid');
            $(this).closest('.form-group').removeClass('has-danger');
        });
    }
    function clearFormContent(_idForm){
        clearValidations(_idForm);
        $('#'+_idForm).clearForm();
    }

    $.fn.clearForm = function() {
        return this.each(function() {
            var type = this.type, tag = this.tagName.toLowerCase();
            if (tag === 'form')
                return $(':input',this).clearForm();
            if (type === 'text' || type === 'password' || tag === 'textarea')
                this.value = '';
            else if (type === 'checkbox' || type === 'radio')
                this.checked = false;
            else if (tag === 'select')
                this.selectedIndex = -1;
        });
    }
    $.fn.fillForm = function(_data) {
        return
        
        this.each(function() {
            var type = this.type, tag = this.tagName.toLowerCase();
            if (tag === 'form')
                return $(':input',this).fillForm();
            if (type === 'text' || type === 'password' || tag === 'textarea')
                this.value = '';
            else if (type === 'checkbox' || type === 'radio')
                this.checked = false;
            else if (tag === 'select')
                this.selectedIndex = -1;
        });
    }

</script>