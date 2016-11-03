app.controller('MediaCtrl', MediaCtrl);

function MediaCtrl($scope, $http, $location) {
    
    
    
    /*
     * Add new image
     */
    
    var allowed_file_types = ['image/png', 'image/gif', 'image/jpeg', 'image/pjpeg'];
    var max_file_size = 1048576;
    var progressbar = $('.loading-line');
    var upload_percentage = $('.percentage');
    var uploaded_images = $('.uploaded-images');
    var upload_error = $('.upload-error');
    
    $scope.addMedia = function(){
        var form_data = new FormData($('#form-add-media')[0]);
        $.ajax({
            type: "POST",
            url: BASE_URL+"admin/media/addmedia",
            resetForm: true,
            data: form_data,
            beforeSend: validateMediaForm,
            xhr: function(){
                // get the native XmlHttpRequest object
                var xhr = $.ajaxSettings.xhr() ;
                // set the onprogress event handler
                xhr.upload.onprogress = function(evt){
                    var percent = evt.loaded/evt.total*100;
                    progressbar.width(percent+"%");
                    upload_percentage.text(percent+"%");
                } ;
                // set the onload event handler
                xhr.upload.onload = function(){ console.log('DONE!') } ;
                // return the customized object
                return xhr ;
            },
            success: afterSuccess,
            complete: function(){

            },
            timeout: 50000,
            error: function(){
                toast("An error occurred. Try again");
            },
            //Options to tell jQuery not to process data or worry about content-type.
            cache: false,
            contentType: false,
            processData: false
        });
        
        return false;
    };
    
    function validateMediaForm(form_data, jq_form, options){
        var proceed = true;
        var error = [];
        $(form_data).each(function(){ 
            if(this.type == "file" && this.required == true && !$.trim(this.value)){ //check empty file fields if available
                error.push( this.name + " is empty!");
                proceed = false;
            }

            //check any empty required text input
            if(this.type == "text" && this.required == true && !$.trim(this.value)){ //check empty text fields if available
                error.push( this.name + " is empty!");
                proceed = false;
            }

            //check any invalid email field
            var email_reg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/; 
            if(this.type == "email" && !email_reg.test($.trim(this.value))){ 
                error.push( this.name + " contains invalid email!");
                proceed = false;          
            }
            
            //check invalid file types and maximum size of a file
            if(this.type == "file"){
                if(window.File && window.FileReader && window.FileList && window.Blob){
                    if(this.value !== ""){
                        if(allowed_file_types.indexOf(this.value.type) === -1){
                            error.push( "<b>"+ this.value.type + "</b> is unsupported file type!");
                            proceed = false;
                        }

                        //allowed file size. (1 MB = 1048576) 
                        if(this.value.size > max_file_size){ 
                            error.push( "<b>"+ bytes_to_size(this.value.size) + "</b> is too big! Allowed size is " + bytes_to_size(max_file_size));
                            proceed = false;
                        }
                    }
                }else{
                    error.push( "Please upgrade your browser, because your current browser lacks some new features we need!");
                    proceed = false;
                }
            }
        });
        
        $(error).each(function(i){ //output any error to element
            upload_error.html('<div class="error">'+error[i]+"</div>");
        }); 

        if(proceed){
            $('.new-image').css('display', 'block');
        }else{
            return false;
        }
    }
    
    //Callback function after success
    function afterSuccess(data){
        data = JSON.parse(data);
        if(data.status){
            $('.new-image').html('<img src="assets/images/uploads/'+data.message+'" alt="..." class="img-thumbnail">');
            uploaded_images.children().removeClass('new-image');
            uploaded_images.prepend('<div class="col-md-2 col-sm-4 col-xs-6 new-image" style="display: none"><div class="upload-progress"><h4 class="percentage">0%</h4><div class="loading" id="loading"><div class="loading-line"></div></div></div></div>');
        }else{
            upload_error.html(data.message);
        }
        clear_form_fields('form-add-media');
    }
    
    //on progress
    function OnProgress(){
      var xhr = new window.XMLHttpRequest();
      //Upload progress
      xhr.upload.addEventListener("progress", function(evt){
        if (evt.lengthComputable) {
          var percentComplete = evt.loaded / evt.total;
          //Do something with upload progress
          progressbar.width(percentComplete+"%");
          console.log(percentComplete);
        }
      }, false);
      //Download progress
      xhr.addEventListener("progress", function(evt){
        if (evt.lengthComputable) {
          var percentComplete = evt.loaded / evt.total;
          //Do something with download progress
          progressbar.width(percentComplete+"%");
          console.log(percentComplete);
        }
      }, false);
      return xhr;
    }
    
    //Callback function to format bites bit.ly/19yoIPO
    function bytes_to_size(bytes){
       var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
       if (bytes == 0) return '0 Bytes';
       var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
       return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
    }
    
    //clear error
    $scope.clearUploadError = function clearUploadError(){
        upload_error.text('');
    }
}

