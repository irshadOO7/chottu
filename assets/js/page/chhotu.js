"use stric";
var mainUrl ="http://localhost/chhotu/";
var baseUrl = mainUrl+"admin/";
var imgUrl = mainUrl+"uploads/";

function generateRow(ele) {
	var table = $(ele).data('name'); 
	$.post(baseUrl+'new_row',{
		table,
		},
		function(data, status){
			console.log(data);
		var obj = JSON.parse(data);	
		$('#dataId').val(obj.dataId);
  });
}
function saveData(ele){
var btn = $(ele).val();
var formName = $(ele).data('frm');
	if($(formName).valid()){
		 $(ele).prop('disabled', true);
		$(ele).html("<i class='fa fa-refresh fa-spin'></i> Wait..");
		var dataId = $('#dataId').val();
		var table = $(ele).data('tbl');
		var clean = $(ele).data('clean');
		var ctrl = $(ele).data('ctrl');
		var data = $(formName).serialize();
		var data = data+'&table='+table+'&dataId='+dataId;
		console.log(data);
$.ajax({
      type: 'POST',
      url: baseUrl+ctrl,
      data: data,
      dataType: "text",
      success: function(resultData) { 
      	console.log(resultData);
      	var resp = JSON.parse(resultData);
      	notify(resp.status,resp.message);
      	if(clean && clean=='no'){
      		console.log('no clean');
      	}
      	else {
      	$(formName)[0].reset();
      	}
      	$(ele).html(btn);
      	 $(ele).prop('disabled', false);
         $(".modal").modal('hide');
        // location.reload(true);
      },
      error: function(e){
      	console.log(e);
      	var resp = JSON.parse(e.responseText);
      	var message = resp.message;
      	notify('error',message);
      	$(ele).html(btn);
      	$(ele).prop('disabled', false);
      },
      complete: function(e){
      	console.log(e);
      	 $(ele).html(btn);
      	 $(ele).prop('disabled', false);

      }
});
}
}



function notify(status,massage) {
  	iziToast[status]({
    message: massage,
    position: 'topCenter'
  });
  }


function delRow(ele) {
	var table = $(ele).data('name');
	var del_id = $(ele).attr('id');
	bootbox.confirm("Are You Sure To Delete The Data?", function(result){ 
	if(result){
	$.post(baseUrl+'delete_now',{
		table,del_id,
		},	
	function(data){
	console.log(data);
	var obj = JSON.parse(data);
	notify(obj.status,obj.message);	
	var parent = $(ele).parent();
	location.reload(true);
	parent.slideUp('slow', function() {$(this).closest('tr').remove();});
});
}
});
};
function editRow(ele){
	var all = $(ele).data('row');
	var formName = $(ele).data('frm');
	var modalName =$(ele).data('modal');
	var photo = $(ele).data('img'); 
	var imgArea = $(ele).data('imgshow'); 
	$(modalName).modal('show');
	$('#dataId').val(all.id);
	//var all = JSON.parse(row[0]);
	var $inputs = $(formName + ' :input');
    $inputs.each(function() {
        var x = $(this).attr('id');
        if ($(this).prop('type') != 'file') {
            ($("#" + x).val(all[x]));
        }
    });
    //console.log(imgArea);
    if(all[photo]){
    	$(imgArea).css('display','block');
    	//alert(all[photo]);
  		$(imgArea).attr('src',imgUrl+all[photo]);
    }

	//console.log(modalName);
	
};
function logOut(ele){
	var dataId = $(ele).data('id');
	
	//bootbox.confirm("Are You Sure To logout?", function(result){ 
	//alert(user_id + result);
	//console.log(result);
	//if(result){
	$.post(baseUrl+'logout',{
		dataId,
	},	
		function(data){
				console.log(data.status);
			var obj = JSON.parse(data);
			notify(obj.status,obj.message);
			setTimeout(function(){ 
				location.replace(mainUrl);
				// window.location.href = "";
			}, 1500);
			
		});
	};
	function logIn(){
		var email = $('#email').val();
		var password = $('#password').val();
		$.post(baseUrl+'login_action',{
			email,password,
		},
		function(data){
			var obj = JSON.parse(data);
			notify(obj.status,obj.message);
			if(obj.status=='success'){
			setTimeout(function(){ 
				window.location.href = "dashboard";
			}, 1500);
			}
		});

	};
	function cleanData(ele){
		var formName = $(ele).data('frm');
		var imgArea = $(ele).data('imgshow'); 
		$(formName)[0].reset();
		$('#dataId').val();
    	$(imgArea).css('display','none');
  		$('#dataId').val('');
	};
	$("document").ready(function() {
    if (window.File && window.FileReader && window.FileList && window.Blob) {
        $("input[type=file]").on('change', function(e) {

            var eleTag = this;
            var file = this.files[0];
            var category, maxSize, realSize, fileType, fileVerify, sizeVerify, finalError, dataControl, displayTag, imagePath;
            var fileName, table, dataId;
            fileType = file.type;
            table = ($(this).attr('data-name'));
            category = ($(this).attr('data-category'));
            displayTag = ($(this).attr('display-tag'));
            dataControl = ($(this).attr('data-ctrl'));
            fileName = ($(this).attr('id'));
            if (!dataControl) {
                dataControl = 'upload_images';
            }
            if (category == 'photo') {
                maxSize = 180000; // bytes 
                realSize = '150 Kb';
            } else if (category == 'signatue') {
                maxSize = 70000; // bytes
                realSize = '50 Kb';
            } else if (category == 'documents') {
                maxSize = 33000000;
                realSize = '3 Mb';
            }
            /*---------------------size validation-----------------------*/
            if (file) { //-------------check empty
                if (category == 'photo' || category == 'signature') {
                    if (fileType == 'image/jpg' || fileType == 'image/jpeg' || fileType == 'image/png' || fileType == 'image/gif') { //-----------file type checking --------------*/
                        fileVerify = 'success';
                    } else {
                        // notify('error', 'Sorry! fle is ' + fileType + '.  Please slect a real image');
                        finalError = 'Sorry! fle is ' + fileType + '.  Please slect a real image';
                        $(this).val('');
                    }

                    /*--------------------------uploading-------------------------*/
                } else {
                    /*-------------------check file type for documents----------------------*/
                    if (fileType == 'image/jpg' || fileType == 'image/jpeg' || fileType == 'image/png' || fileType == 'application/pdf') {
                        fileVerify = 'success';
                    } else {
                        finalError = 'Sorry! Only jpg, jpeg, png, gif & pdf files are allowed.';
                        $(this).val('');
                    }
                }

                if ((file.size) > maxSize) {
                    // notify("error", "Sorry please! Selcted file is to  large");
                    finalError = "Sorry Please selct a file ";

                    $(this).val('');
                } else {

                    sizeVerify = 'success';

                }
                /*---------------------end size validation-----------------------*/

                if (fileVerify == 'success' && sizeVerify == 'success') { // ---------- checking validation success------------------------------------*/

                    var dataId = $('#dataId').val();
                    var action = dataControl;
                    var readPath = '';
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        // demoImage.src = reader.result;
                        $(displayTag).show();
                        readPath = event.target.result;
                        var fileData = (reader.result);
                        $('#preload-body').show();
                        $.post(baseUrl+action, {
                                fileName,
                                fileData,
                                table,
                                category,
                                dataId,
                            },
                            function(response) {
                                $('#preload-body').hide();
                                var all = JSON.parse(response);
                                var status = all.status;
                                notify(status, all.message);
                                if (status == 'success') {
                                    $(displayTag).show();
                                    $(displayTag).attr('src', readPath);
                                }
                            });

                    }
                    reader.readAsDataURL(file);
                } else {
                    notify('error', finalError + 'less than ' + realSize);

                }
            }

        });

    } else {
        alert("Your browser is too old to support HTML5 File API");
    }

    // function readURL(input, displayTag) {
    //     if (input.files && input.files[0]) {
    //         var reader = new FileReader();
    //         reader.onload = function(e) {
    //             $(displayTag).show();
    //             $(displayTag).attr('src', e.target.result);
    //         }

    //         reader.readAsDataURL(input.files[0]);
    //     }
    // }
});
// function showPass(e){
// 	// alert('ok');
// 	 const type = con_pass.getAttribute('type') === 'password' ? 'text' : 'password';
//     con_pass.setAttribute('type', type);
//    //	 toggle the eye slash icon
//     const togglePassword = document.querySelector('#togglePassword');
//     const password = document.querySelector('#con_pass');
//     this.classList.toggle('fa-eye');
// };
function showPass(ele){
const togglePassword = document.querySelector('#togglePassword');
const con_pass = document.querySelector('#con_pass');
togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = con_pass.getAttribute('type') === 'password' ? 'text' : 'password';
    con_pass.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');

});
};
$(document).on('change', '.product_qty,.product_rate,.product_discount', function(){ // Live Edit 
    var num = $(this).data('num');
    //console.log(num);
    // var product_gst = $('#gst'+num).val(); 
    var new_qty = $('#qty'+num).val(); ;
    var new_rate = $('#rate'+num).val(); 
    var obj = $('#rate'+num).data('row');
    var task = $('#task').val();
    console.log(obj);
    var new_discount = $('#discount'+num).val();
    var txn_id = $(this).attr('data-txn');
    var product_id = $(this).attr('data-product');
    
    if(new_qty<=0){
      notify( 'error',"Invalid Product Quantity");
    }
    else{
      if(txn_id !='')
      {
      	var data = {'dataId':obj.id,'product_id':obj.product_id,'new_qty':new_qty,'product_rate':new_rate,'product_discount':new_discount};
      	console.log(data);
      $.ajax({	
        'type':'POST',
        'url':baseUrl+'addition',
        'data':data,
        success: function(data){
          console.log(data);
          var obj = JSON.parse(data);
          location.reload(true);
        }
      });
      }
    }
  });
function result(ele){
	var number = $(ele).val();
	if(number.length==10){
		$.ajax({
			'type':'POST',
			'url':baseUrl+'result',
			'data':{'number':number},
			success: function(data){
				console.log(data);
				var obj = JSON.parse(data);
				$('#name').val(obj.name);
				$('#email').val(obj.email);
				if(obj.mobile){
				$('#mobile').val(obj.mobile);
				$('#add_customer').hide();
				}else
				{
					$('#add_customer').show();
				}
				$('#amount').val(obj.amount);
				$('#city').val(obj.city);
				$('#pincode').val(obj.pincode);
				$('#address').val(obj.address);
				$('#dataId').val(obj.imaged);
				$('#customer_id').val(obj.id);
				
			}
		});
		
	}
	// else{
	// 	 notify( 'error',"please check your number");
	// }

};

function calcAmt(){
	var inv_amt = inv_dis = payable = paid_amt = dues =0;
	inv_amt = $('#inv_amt').val();
    inv_dis = $('#inv_dis').val();
    console.log(inv_dis);
    if(inv_dis==''){
    $('#inv_dis').val(0);
    }else{
    	$('#inv_dis').val(parseFloat(inv_dis)+0);
    }
    payable = inv_amt-((inv_amt*inv_dis)/100);
    $('#pay_amt').val(payable.toFixed(2));
    paid_amt = $('#paid_amt').val();
    dues = parseFloat(payable)-parseFloat(paid_amt);
    $('#dues_amt').val(dues.toFixed(2));
};
var today = new Date().toISOString().split('T')[0];
document.getElementsByName("invoice_date")[0].setAttribute('min', today);

function cal(){
	if($('#check_amount').prop('checked')){
	var amt = $('#check_amount').val()
	var paid_amt = $('#paid_amt').val(amt);
}else{
	 $('#paid_amt').val(0);
}
 calcAmt();
};
function frmvld(){
	if($('#frmproduct').validate() && $('#customerForm').validate()){
		$('#btn').prop('disabled',true);
	}else{
		$('#btn').prop('disabled',false);
	}	
}