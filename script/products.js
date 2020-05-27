/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var vm = new Vue({
            el:'#container',
            data:{
                    product_info: [],
                    error_msg:'Sorry no products to display',
                    ajax:null,
                    url:'./inventory.php',
                    param:'range=all'
                }, 
            created:function(){
                this.ajax = new XMLHttpRequest()
                this.request()
                this.response()
            },
            methods:{
                
                request:function(){
                    this.ajax.onreadystatechange = this.response;
                    this.ajax.open('POST', this.url, true);
                    this.ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    this.ajax.send(this.param);
                },
                response: function()
                {
                    if(this.ajax.readyState == 4)
                    {
                        if(this.ajax.status == 200)
                        {
                            this.product_info = ""
                            var result = JSON.parse(this.ajax.responseText)
                            if( result[0] )
                            {
                                this.product_info = result[1];
                            }else
                            {
                                this.error_msg = result[1];
                            }
                        }
                    }
                }
            }
        })
