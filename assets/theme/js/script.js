$(document).ready(function(){
    
    $('.country .btn-select-country').click(function(){
        $('.country .country-list').toggle(150);
    });
    
    /*
     * Sign up one
     */
    $('#form-sign-up-1').submit(function(){
        if($('#form-sign-up-1').smkValidate()){
        }else{
            return false;
        }
    });
    
    /*
     * Activate Account
     */
    $('#form-activate-account #country').change(function(){
        var country_id = $(this).val();
        $.ajax({
            type: "POST",
            url: base_url+"state/getCountryStates",
            dataType: 'json',
            data: 'country-id='+country_id,
            success:function(result, status, xhr){ 
                if(result){
                    var out = '';
                    for(i = 0; i < result.length; i++){
                        out += '<option value='+result[i].state_id+'>'+result[i].state_name+'</option>';
                    }
                    $('#form-activate-account #state').html(out);
                }else{
                    $('#form-activate-account #state').html('<option value="">- empty -</option>');
                }
            },
            complete: function(){

            },
            timeout: 50000,
            error: function(){
            }
        });
    });
    
    
    $('#form-activate-account').submit(function(){
        if($('#form-activate-account').smkValidate()){
            
        }else{
            return false;
        }
    });
    
    
    /*
     * Submit Login form
     */
    $('#form-login').submit(function(){
        if($('#form-login').smkValidate()){
        }else{
            return false;
        }
    });
    
    /*
     * Submit Forgot Password form
     */
    $('#form-forgot-password').submit(function(){
        if($('#form-forgot-password').smkValidate()){
        }else{
            return false;
        }
    });
    
    /*
     * Load sub-categories
     */
    $('#form-post-ad #category').change(function(){
        show_loading_overlay();
        var parent_id = $(this).val();
        $.ajax({
            type: "POST",
            url: base_url+"api/get-sub-categories",
            dataType: 'json',
            data: 'parent-id='+parent_id,
            success:function(result, status, xhr){ 
                if(result){
                    var out = '<option value="">-- Select sub category --</option>';
                    for(i = 0; i < result.length; i++){
                        out += '<option value="'+result[i].category_id+'">'+result[i].category_name+'</option>';
                    }
                    $('#form-post-ad #sub-category').html(out);
                }else{
                    $('#form-post-ad #sub-category').html('<option value="">- empty -</option>');
                }
            },
            complete: function(){
                hide_transparent_overlay();
            },
            timeout: 50000,
            error: function(){
            }
        });
    });
    
    $('#form-update-ad #category').change(function(){
        show_loading_overlay();
        var parent_id = $(this).val();
        $.ajax({
            type: "POST",
            url: base_url+"api/get-sub-categories",
            dataType: 'json',
            data: 'parent-id='+parent_id,
            success:function(result, status, xhr){ 
                if(result){
                    var out = '<option value="">-- Select sub category --</option>';
                    for(i = 0; i < result.length; i++){
                        out += '<option value="'+result[i].category_id+'">'+result[i].category_name+'</option>';
                    }
                    $('#form-update-ad #sub-category').html(out);
                }else{
                    $('#form-update-ad #sub-category').html('<option value="">- empty -</option>');
                }
            },
            complete: function(){
                hide_transparent_overlay();
            },
            timeout: 50000,
            error: function(){
            }
        });
    });
    
    /*
     * Submit Post Ad form
     */
    $('#form-post-ad').submit(function(){
        if($('#form-post-ad').smkValidate() && validateFileFields('form-post-ad')){
            
        }else{
            return false;
        }
    });
    
    /* Sort select options */
    $('.filter #sorter').change(function(){
        url = $(this).val();
        if(url){
            window.location = url;
        }
    });
    
    /** Mail Seller **/
    $('#form-contact-seller').submit(function(){
        if($('#form-contact-seller').smkValidate()){
            show_loading_overlay();
            var form_data = $('#form-contact-seller').serialize();
            $.ajax({
                type: "POST",
                url: base_url+"api/mail-seller",
                data: form_data,
                success:function(result, status, xhr){ 
                    if(result){
                        new notification('Message sent successfully', 
                        function(){
                            location.reload();
                        }, '');
                    }else{
                        new notification('An error occurred. Try again', 
                        function(){
                            location.reload();
                        }, '');
                    }
                },
                complete: function(){

                },
                timeout: 50000,
                error: function(){
                    new notification('Network error. Please try again', 
                        function(){
                            location.reload();
                        }, '');
                }
            });
            return false;
        }else{
            return false;
        }
    });
    
    /** Update Ad **/
    $('#form-update-ad').submit(function(){
        if($('#form-update-ad').smkValidate()){
            show_loading_overlay();
            var form_data = $('#form-update-ad').serialize();
            $.ajax({
                type: "POST",
                url: base_url+"api/update-ad",
                data: form_data,
                success:function(result, status, xhr){ 
                    if(result){
                        new notification('Ad Updated successfully', 
                        function(){
                            window.location = base_url+"manage-ads";
                        }, '');
                    }else{
                        new notification('An error occurred. Try again', 
                        function(){
                            location.reload();
                        }, '');
                    }
                },
                complete: function(){

                },
                timeout: 50000,
                error: function(){
                    new notification('Network error. Please try again', 
                        function(){
                            location.reload();
                        }, '');
                }
            });
            return false;
        }else{
            return false;
        }
    });
    
    /**  My Panel **/
    $('.my-panel .my-panel-title').click(function(){
        $(this).parent('.my-panel').find('.my-panel-content').toggle(200);
    });
    
    /** Update User **/
    $('#form-my-details').submit(function(){
        if($('#form-my-details').smkValidate()){
            show_loading_overlay();
            var form_data = $('#form-my-details').serialize();
            $.ajax({
                type: "POST",
                url: base_url+"api/update-user",
                data: form_data,
                success:function(result, status, xhr){ 
                    result = JSON.parse(result);
                    if(result.status){
                        new notification('Profile Updated successfully', 
                        function(){
                            window.location = base_url+"my-profile";
                        }, '');
                    }else{
                        new notification('Failed!<br> '+result.message, 
                        function(){
                            location.reload();
                        }, '');
                    }
                },
                complete: function(){

                },
                timeout: 50000,
                error: function(){
                    new notification('Network error. Please try again', 
                        function(){
                            location.reload();
                        }, '');
                }
            });
            return false;
        }else{
            return false;
        }
    });
    
    /** Update Password **/
    $('#form-update-password').submit(function(){
        if($('#form-update-password').smkValidate()){
            var pwd1 = $('#password-1').val();
            var pwd2 = $('#password-2').val();
            if(pwd1 === pwd2){
                show_loading_overlay();
                var form_data = $('#form-update-password').serialize();
                
                $.ajax({
                    type: "POST",
                    url: base_url+"api/change-password",
                    data: form_data,
                    success: function(result, status, xhr){
                         new notification('Password successfully changed.', 
                            function(){
                                location.reload();
                            }, '');
                    },
                    complete: function(){

                    },
                    timeout: 50000,
                    error: function(){
                        new notification('Network error. Please try again', 
                            function(){
                                location.reload();
                            }, '');
                    }
                });
            }else{
                new notification('Passwords do not match.', 
                function(){
                    hide_transparent_overlay();
                }, '');
            }
            return false;
        }else{
            return false;
        }
    });
    
    /** Payment Button **/
    
    $('#btn-checkout').on('click', function (e) { // add the event to your "pay" button
        e.preventDefault();

        handler.open(SimplePay.CHECKOUT, // type of payment
        {
           email: 'customer@store.com', // optional: user's email
           phone: '+2348020803585', // optional: user's phone number
           description: 'HomeBuds Premium Service', // a description of your choosing
           address: '31 Kade St, Abuja, Nigeria', // user's address
           postal_code: '110001', // user's postal code
           city: 'Abuja', // user's city
           country: 'NG', // user's country
           amount: '100000', // value of the purchase, ₦ 1100
           currency: 'NGN' // currency of the transaction
        });
    });

    /** End Payment Button **/
    
});


function confirmPassword(user_id, password){
    $.ajax({
        type: "POST",
        url: base_url+"api/confirm-password",
        data: 'user-id='+user_id+'&password='+password,
        success:function(result, status, xhr){ 
            if(result){
                return true;
            }else{
                $('#old-password').addClass('has-feedback has-error');
                $('#old-password div').append('<span class="help-block smk-error-msg">Incorrect Password</span>');
                return false;
            }
        },
        complete: function(){

        },
        timeout: 50000,
        error: function(){
            new notification('Network error. Please try again', 
                function(){
                    location.reload();
                }, '');
        }
    });
    return true;
}

function removePwdError(){
    $('#old-password').removeClass('has-feedback has-error');
    $('#old-password div span').remove();
}






function validateFileFields(form_id){
    var allowed_file_types = ['image/png', 'image/gif', 'image/jpeg', 'image/pjpeg'];
    var max_file_size = 1048576;
    var proceed = true;
    var errors = [];
    $('#'+form_id+' input').each(function(){
        $('#'+this.id).parent().children('.help-block.smk-error-msg').remove();
        if(this.type == "file" && this.required == true && !$.trim(this.value)){
            $('#'+this.id).parent().append('<span class="help-block smk-error-msg img-err" style="float: right">Required field</span>');
            proceed = false;
        }
        
        if(this.type == "file"){
            if(window.File && window.FileReader && window.FileList && window.Blob){
                if(this.value !== ""){
                    var x = this;
                    if('files' in x){
                        var file = x.files[0];
                        var filename = file.name;
                        var filesize = file.size;
                        var filetype = file.type;
                        
                        if(allowed_file_types.indexOf(filetype) === -1){
                            $('#'+x.id).parent().append('<span class="help-block smk-error-msg img-err" style="float: right">Unsupported file type</span>');
                            proceed = false;
                        }
                        
                        if(filesize > max_file_size){
                            $('#'+x.id).parent().append('<span class="help-block smk-error-msg img-err" style="float: right">File too large</span>');
                            proceed = false;
                        }
                        
                    }
                }
            }else{
                alert('not supported');
                proceed = false;
            }
        }
        
    });
    return proceed;
}

var error = function(field, descr){
    this.field = field;
    this.descr = descr;
}

function bytes_to_size(bytes){
    var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
    if (bytes == 0) return '0 Bytes';
    var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
    return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
 }
 
 /* Modal Notification Class */
 function notification(message, ok, cancel){
     hide_transparent_overlay();
    var modal = $('#notification');
    var btn_type = 'double';
    var ok_btn = $('#notification .my-modal #btn-ok');
    var cancel_btn = $('#notification .my-modal #btn-cancel');
    
    if(!cancel){
        cancel_btn.hide();
        btn_type = 'single';
    }
    $('#notification .my-modal .btn').addClass(btn_type);
    modal.find('.m-content').html(message);
    this.show = function(){
        modal.show();
    };
    this.hide = function(){
        modal.hide();
    };
    ok_btn.click(ok);
    cancel_btn.click(cancel);
    this.show();
 };
 
 function test(){
    new notification('Are you well?', function(){
        console.log('clicked ok');
        hideNotification();
    }, function cancel(){
        console.log('clicked cancel');
        hideNotification();
    });
 }
 
 function hide_transparent_overlay(){
    $('.transparent-overlay').hide();
 }
 
 function show_loading_overlay(){
     hide_transparent_overlay();
     $('.loading-overlay').show();
 }
 
 /** Delete Ad **/
function deleteAd(product_id, title){
    new notification('Delete '+title+'?', 
    function ok(){
        show_loading_overlay();
        $.ajax({
            type: "POST",
            url: base_url+"api/delete-ad",
            data: 'product-id='+product_id,
            success:function(result, status, xhr){ 
                if(result){
                    location.reload();
                }else{
                    alert('not deleted');
                }
            },
            complete: function(){

            },
            timeout: 50000,
            error: function(){
            }
        });
    }, function cancel(){
        location.reload();
    });
}



 /** Delete Message **/
function deleteMsg(id){
    new notification('Delete this message?', 
    function ok(){
        show_loading_overlay();
        $.ajax({
            type: "POST",
            url: base_url+"api/delete-mail",
            data: 'mail-id='+id,
            success:function(result, status, xhr){ 
                if(result){
                    window.location = base_url+"messages";
                }else{
                    alert('An error occurred');
                }
            },
            complete: function(){

            },
            timeout: 50000,
            error: function(){
            }
        });
    }, function cancel(){
        location.reload();
    });
}

/** PAYMENT **/

function processPayment (token) {
//     implement your code here - we call this after a token is generated
//     example:
    var data = {
        user_id: $('#user-id').val(),
        amount: 1000,
        token: token
    };
    
    $.ajax({
        type: "POST",
        url: base_url+"api/add-payment",
        data: data,
        success:function(result, status, xhr){ 
            if(result){
                new notification('Successfull!!!<br>You will receive an email from us shortly once your account has been setup', 
                    function(){
                        location.reload();
                    }, '');
            }else{
                new notification('An error occurred. Try again', 
                    function(){
                        location.reload();
                    }, '');
            }
        },
        complete: function(){

        },
        timeout: 50000,
        error: function(){
        }
    });
    
    
    
    
    //form.submit();
    //alert(token);
}

// Configure SimplePay's Gateway
var handler = SimplePay.configure({
   token: processPayment, // callback function to be called after token is received
   key: 'test_pu_2d35ed9b1ab44926b51aebd2a2942f24', // place your api key. Demo: test_pu_*. Live: pu_*
});

/** END PAYMENT **/
