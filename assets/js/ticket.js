export let renderTicket = () => {

    let ticketContainer = document.querySelector(".list-group");
    let totals = document.querySelector(".totals");
    let deleteProducts = document.querySelectorAll(".delete-product");
    let deleteAllProducts = document.querySelector(".delete-all-products");

    document.addEventListener("renderTicket",( event =>{
        renderTicket();
    }), {once: true});

    deleteProducts.forEach(deleteProduct => {

        deleteProduct.addEventListener("click", (event) => {
                
            let sendPostRequest = async () => {
                
                let data = {};
                data["route"] = 'deleteProduct';
                data["cart_id"] = deleteProduct.dataset.product;
                data["table_id"] = deleteProduct.dataset.table;

                let response = await fetch('web.php', {
                    headers: {
                        'Accept': 'application/json',
                    },
                    method: 'DELETE',
                    body: JSON.stringify(data)
                })
                .then(response => {
                
                    if (!response.ok) throw response;
                    console.log(response);

                    return response.json();
                })
                .then(json => {

                    deleteProduct.parentElement.remove();

                    if(json.total == false){

                        ticketContainer.querySelector('.no-products').classList.remove('d-none');
                        totals.querySelector('.iva-percent').innerHTML = '';
                        totals.querySelector('.base').innerHTML = 0;
                        totals.querySelector('.iva').innerHTML = 0;
                        totals.querySelector('.total').innerHTML = 0;
                        
                    }else{
                        totals.querySelector('.iva-percent').innerHTML = json.total.iva;
                        totals.querySelector('.base').innerHTML = json.total.base_imponible;
                        totals.querySelector('.iva').innerHTML = json.total.iva_total;
                        totals.querySelector('.total').innerHTML = json.total.total;
                    }
                   
                })
                .catch ( error =>  {
                    console.log(error);
                });
            };
    
            sendPostRequest();
        }); 
    });


    if(deleteAllProducts){

        deleteAllProducts.addEventListener("click", (event) => {
                
            let sendPostRequest = async () => {
                
                let data = {};
                data["route"] = 'deleteAllProducts';
                data["table_id"] = deleteAllProducts.dataset.table;

                let response = await fetch('web.php', {
                    headers: {
                        'Accept': 'application/json',
                    },
                    method: 'DELETE',
                    body: JSON.stringify(data)
                })
                .then(response => {
                
                    if (!response.ok) throw response;

                    return response.json();
                })
                .then(json => {

                    let products = ticketContainer.querySelectorAll('li:not(.add-product-layout)');

                    ticketContainer.querySelector('.no-products').classList.remove('d-none');

                    totals.querySelector('.iva-percent').innerHTML = '';
                    totals.querySelector('.base').innerHTML = 0;
                    totals.querySelector('.iva').innerHTML = 0;
                    totals.querySelector('.total').innerHTML = 0;

                    products.forEach(product => {
                        product.remove();
                    });
                })
                .catch ( error =>  {
                    console.log(JSON.stringify(error));
                });
            };
    
            sendPostRequest();
        }); 
    }

    
};
