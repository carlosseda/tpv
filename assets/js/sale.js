export let renderSale = () => {

    let ticketContainer = document.querySelector(".list-group");
    let totals = document.querySelector(".totals");
    let paymentButtons = document.querySelectorAll(".payment-button");
    let exportSaleToExcel = document.querySelector(".export-sale-to-excel");

    paymentButtons.forEach(paymentButton => {

        paymentButton.addEventListener("click", (event) => {
            
            let sendPostRequest = async () => {
                
                let data = {};
                data["route"] = 'payTicket';
                data["payment_method_id"] = paymentButton.dataset.payment;
                data["table_id"] = paymentButton.dataset.table;
    
                let response = await fetch('web.php', {
                    headers: {
                        'Accept': 'application/json',
                    },
                    method: 'POST',
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
                    console.log(error);
                });
            };
    
            sendPostRequest();
        }); 
    });  

    if(exportSaleToExcel) {

        exportSaleToExcel.addEventListener("click", (event) => {
                
            let sendPostRequest = async () => {
                
                let data = {};
                data["route"] = 'exportSaleToExcel';
                data["sale_id"] = exportSaleToExcel.dataset.sale;

                let response = await fetch('web.php', {
                    headers: {
                        'Accept': 'application/json',
                    },
                    method: 'POST',
                    body: JSON.stringify(data)
                })
                .then(response => {
                
                    if (!response.ok) throw response;

                    return response.json();
                })
                .then(json => {

                   
                })
                .catch ( error =>  {
                    console.log(error);
                });
            };

            sendPostRequest();
        }); 
    }
};