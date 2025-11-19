
	/// start get auto select data
		
		function getAutoDropdownRolePermission(targetShowClass, route, orderEmptyArr)
            {
               // alert(orderEmptyArr);
                $.ajax({
                    type: "GET",
                    url: route,
                    dataType: "JSON",


                    beforeSend: function(){
                        $(".ajax-loader-img").css("display", "block");
                            jQuery.each( orderEmptyArr, function( j, field ) {

                                    $("."+field).empty();
                                    $("."+field).append('<option value="">Select</option>');
                            });
                       },
                       complete: function(){
                         $(".ajax-loader-img").css("display", "none");
                       },

                    success: function(data) {
                        
                        if(data)
                        {
							
                            $.each(data,function(key,value){
                                $('.'+targetShowClass).append($("<option/>", {
                                   value: key,
								   selected: false,
                                   text: value
                                }));
                            });
                        }

                    },

                    error: function() {
                        jQuery.each( orderEmptyArr, function( j, field ) {

                                $("."+field).empty();
                                $("."+field).append('<option value="" >Select</option>');
                        });
                    }

                });

                
				
				
            }

        /// end get auto select data      
		
		
		
		
	/// start get  service cover area    
		
		function getRoleWiseUserPermissionList(targetShowClass, route, orderEmptyArr)
            {
               // alert(orderEmptyArr);
                $.ajax({
                    type: "GET",
                    url: route,
                    dataType: "JSON",
					
					cache: false,
                    beforeSend: function(){
                        $("."+targetShowClass+" tr:gt(0)").remove();
					   },
                       

                    success: function(data) {
                        if(data)
                        {
							
							//alert( data.total_length);
                            /*$.each(data,function(key,value){
								
                                $("."+targetShowClass+" tr:first").after($("<tr><td>"+key+"</td></tr>", {
									
                                }));
								
                            });*/
							
							 $.each(data, function(key,value) {
									 
									var result = [];
									var test = [];
									var count = 1 ;
									$.each(value, function(k, v) {
										
										test.push("&nbsp; &nbsp;<input type='checkbox' name='set_permission[]' value='"+k+"' checked='yes'>&nbsp;"+v);
										if( count++ == 2 )
										{
											test.push("<br/>");
										}
										else if( count++ ==4 ){
											count =1; 
											test.push("<br/>");
										}
									 
									});
									
									var result = '<tr><td align="center"><strong>'+key+'</strong></td><td>'+test.join(" ")+'</td></tr>';
								 //  alert(result);
									$("."+targetShowClass+" tr:first").after(result);
							  });
				  
                        }

                    },

                    error: function() {
                        jQuery.each( orderEmptyArr, function( j, field ) {

                                $("."+field).empty();
                               // $("."+field).append('<option value="" >Select</option>');
                        });
                    },
					
					complete: function(){
                       //  $("."+targetShowClass+" >tbody").empty();
						 // alert('222')
                       },

                });

            }

        /// end get service cover area      







