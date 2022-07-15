export let renderProducts = () => {

    let ticketContainer = document.querySelector(".list-group");
    let totals = document.querySelector(".totals");
    let addProductLayout = document.querySelector(".add-product-layout");
    let addProducts = document.querySelectorAll(".add-product");

    addProducts.forEach(addProduct => {

        addProduct.addEventListener("click", (event) => {
            
            let sendPostRequest = async () => {
                
                let data = {};
                data["route"] = 'addProduct';
                data["price_id"] = addProduct.dataset.price;
                data["table_id"] = addProduct.dataset.table;
    
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
    
                    let product = addProductLayout.cloneNode(true);
    
                    product.querySelector('.delete-product').dataset.product = json.newProduct.id;
                    product.querySelector('.img-ticket').src =  json.newProduct.imagen_url;
                    product.querySelector('.categoria-prod').innerHTML =  json.newProduct.categoria;
                    product.querySelector('.nombre-prod').innerHTML =  json.newProduct.nombre;
                    product.querySelector('.precio-prod').innerHTML =  json.newProduct.precio_base;
                    product.classList.remove('d-none', 'add-product-layout');
    
                    totals.querySelector('.iva-percent').innerHTML = json.total.iva;
                    totals.querySelector('.base').innerHTML = json.total.base_imponible;
                    totals.querySelector('.iva').innerHTML = json.total.iva_total;
                    totals.querySelector('.total').innerHTML = json.total.total;
    
                    if(ticketContainer.querySelector('.no-products')){
                        ticketContainer.querySelector('.no-products').classList.add('d-none');
                        ticketContainer.appendChild(product);
                    }else{
                        ticketContainer.appendChild(product);
                    }
    
                    document.dispatchEvent(new CustomEvent('renderTicket'));
                })
                .catch ( error =>  {
                    console.log(JSON.stringify(error));
                });
            };
    
            sendPostRequest();
        }); 
    });
        

};